<?php
App::uses('AppController', 'Controller');
/**
 * EmergencyContacts Controller
 *
 * @property EmergencyContact $EmergencyContact
 */
class EmergencyContactsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmergencyContact->recursive = 0;
		$this->set('emergencyContacts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EmergencyContact->exists($id)) {
			throw new NotFoundException(__('Invalid emergency contact'));
		}
		$options = array('conditions' => array('EmergencyContact.' . $this->EmergencyContact->primaryKey => $id));
		$this->set('emergencyContact', $this->EmergencyContact->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmergencyContact->create();
			if ($this->EmergencyContact->save($this->request->data)) {
				$this->Session->setFlash(__('The emergency contact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emergency contact could not be saved. Please, try again.'));
			}
		}
//		$users = $this->EmergencyContact->User->find('list');
//		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EmergencyContact->exists($id)) {
			throw new NotFoundException(__('Invalid emergency contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmergencyContact->save($this->request->data)) {
				$this->Session->setFlash(__('The emergency contact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emergency contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmergencyContact.' . $this->EmergencyContact->primaryKey => $id));
			$this->request->data = $this->EmergencyContact->find('first', $options);
		}
		$users = $this->EmergencyContact->User->find('list');
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
		$this->EmergencyContact->id = $id;
		if (!$this->EmergencyContact->exists()) {
			throw new NotFoundException(__('Invalid emergency contact'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EmergencyContact->delete()) {
			$this->Session->setFlash(__('Emergency contact deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Emergency contact was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function add_contact() {
		if ($this->request->is('post')) {
			$this->EmergencyContact->create();
			if ($this->EmergencyContact->save($this->request->data)) {
				$this->update_registrations('has_emergency_contact');
				$this->Session->setFlash(__('Your emergency contact has been added'));
				$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
			} else {
				$this->Session->setFlash(__('The emergency contact could not be saved. Please, try again.'));
			}
		}		
	}

	public function edit_contact($id = null) {
		if (!$this->EmergencyContact->exists($id)) {
			throw new NotFoundException(__('Invalid emergency contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmergencyContact->save($this->request->data)) {
				$this->Session->setFlash(__('Your contact has been updated'));
				$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
			} else {
				$this->Session->setFlash(__('The emergency contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmergencyContact.' . $this->EmergencyContact->primaryKey => $id));
			$this->request->data = $this->EmergencyContact->find('first', $options);
		}
	}

	public function delete_contact($id = null) {
		$this->EmergencyContact->id = $id;

		if (!$this->EmergencyContact->exists()) {
			throw new NotFoundException(__('Invalid emergency contact'));
		}

		$emergencyContact = $this->EmergencyContact->find(
			'first',
			array(
				'conditions' => array(
					'EmergencyContact.id' => $id
				),
				'fields' => array('user_id'),
				'recursive' => -1
			)
		);

		$this->request->onlyAllow('post', 'delete');
		if ($emergencyContact['EmergencyContact']['user_id'] == $this->Auth->user('id')) {
			if ($this->EmergencyContact->delete()) {
				$this->Session->setFlash(__('Emergency contact deleted'));
				$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
			}
		}
		$this->Session->setFlash(__('Emergency contact was not deleted'));
		$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
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
			        		array('RaceRegistration.has_emergency_contact' => 0),
			        		array('RaceRegistration.has_emergency_contact' => null),
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
