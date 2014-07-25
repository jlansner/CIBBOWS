<?php
App::uses('AppController', 'Controller');
/**
 * Addresses Controller
 *
 * @property Address $Address
 */
class AddressesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Address->recursive = 0;
		$this->set('addresses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
		$this->set('address', $this->Address->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Address->create();
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
			}
		}
		$users = $this->Address->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
			$this->request->data = $this->Address->find('first', $options);
		}
		$users = $this->Address->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Address->delete()) {
			$this->Session->setFlash(__('Address deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Address was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function edit_address() {

		if ($this->request->is('post') || $this->request->is('put')) {
			if (!$this->request->data['Address']['user_id']) {
				$this->Address->create();
			}

			if ($this->Address->save($this->request->data)) {
//				$this->update_registrations('has_address');
				$this->Session->setFlash(__('Your address has been saved'));
				$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Address.user_id' => $this->Auth->user('id')));
			$this->request->data = $this->Address->find('first', $options);
		}

	}

	public function update_registrations($updated_field) {
		$this->loadModel('RaceRegistration');
		$registrations = $this->RaceRegistration->find(
			'all',
			array(
				'conditions' => array(
					'RaceRegistration.user_id' => $this->Auth->user('id'),
	        		array(
		        		'OR' => array(
			        		array('RaceRegistration.has_address' => 0),
			        		array('RaceRegistration.has_address' => null),
						),
					),
				),
				'fields' => array('id','qualifying_swim_id','qualifying_race_id','result_id','has_address','has_emergency_contact'),
				'recursive' => -1
			)
		);
		
		foreach ($registrations as $registration) {
			$registration['RaceRegistration'][$updated_field] = 1;
			if ( 
				(
					($registration['RaceRegistration']['qualifying_swim_id']) ||
					($registration['RaceRegistration']['qualifying_race_id']) ||
					($registration['RaceRegistration']['result_id']) ||
					($registration['RaceRegistration']['no_qualifier'])
				) &&
				($registration['RaceRegistration']['has_address']) &&
				($registration['RaceRegistration']['has_emergency_contact'])
			) {
				$registration['RaceRegistration']['approved'] = 1;
				$this->sendApprovedEmail($registration['RaceRegistration']['id']);				
			}

			$this->RaceRegistration->save($registration);		

		}
	}

}
