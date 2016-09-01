<?php
App::uses('AppController', 'Controller');
/**
 * QualifyingRaces Controller
 *
 * @property QualifyingRace $QualifyingRace
 */
class QualifyingRacesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QualifyingRace->recursive = 0;
		$this->set('qualifyingRaces', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QualifyingRace->exists($id)) {
			throw new NotFoundException(__('Invalid qualifying race'));
		}
		$options = array('conditions' => array('QualifyingRace.' . $this->QualifyingRace->primaryKey => $id));
		$this->set('qualifyingRace', $this->QualifyingRace->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QualifyingRace->create();
			if ($this->QualifyingRace->save($this->request->data)) {
				$this->Session->setFlash(__('The qualifying race has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qualifying race could not be saved. Please, try again.'));
			}
		}
		$users = $this->QualifyingRace->User->find('list');
		$distances = $this->QualifyingRace->Distance->find('list');
		$this->set(compact('users', 'distances'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QualifyingRace->exists($id)) {
			throw new NotFoundException(__('Invalid qualifying race'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QualifyingRace->save($this->request->data)) {
				$this->Session->setFlash(__('The qualifying race has been saved'));
				$this->redirect(array('action' => 'view_pending'));
			} else {
				$this->Session->setFlash(__('The qualifying race could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QualifyingRace.' . $this->QualifyingRace->primaryKey => $id));
			$this->request->data = $this->QualifyingRace->find('first', $options);
		}
		$users = $this->QualifyingRace->User->find('list');
		$distances = $this->QualifyingRace->Distance->find('list');
		$this->set(compact('users', 'distances'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QualifyingRace->id = $id;
		if (!$this->QualifyingRace->exists()) {
			throw new NotFoundException(__('Invalid qualifying race'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QualifyingRace->delete()) {
			$this->Session->setFlash(__('Qualifying race deleted'));
			$this->redirect(array('action' => 'view_pending'));
		}
		$this->Session->setFlash(__('Qualifying race was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function add_race() {
		if ($this->request->is('post')) {
			$this->QualifyingRace->create();
			if ($this->QualifyingRace->save($this->request->data)) {
				$this->Session->setFlash(__('Your qualifying race has been added'));
				$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
			} else {
				$this->Session->setFlash(__('Your qualifying race could not be saved. Please, try again.'));
			}
		}
		$distances = $this->QualifyingRace->Distance->find('list');
		$this->set(compact('distances'));
	}


	public function edit_race($id = null) {
		if (!$this->QualifyingRace->exists($id)) {
			throw new NotFoundException(__('Invalid emergency contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QualifyingRace->save($this->request->data)) {
				$this->Session->setFlash(__('Your qualifying race info has been updated'));
				$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
			} else {
				$this->Session->setFlash(__('The qualifying race could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QualifyingRace.' . $this->QualifyingRace->primaryKey => $id));
			$this->request->data = $this->QualifyingRace->find('first', $options);
		}
		$distances = $this->QualifyingRace->Distance->find('list');
		$this->set(compact('distances'));
	}

	public function delete_race($id = null) {
		$this->QualifyingRace->id = $id;

		if (!$this->QualifyingRace->exists()) {
			throw new NotFoundException(__('Invalid qualifying race'));
		}

		$qualifyingRace = $this->QualifyingRace->find(
			'first',
			array(
				'conditions' => array(
					'QualifyingRace.id' => $id
				),
				'fields' => array('user_id'),
				'recursive' => -1
			)
		);

		$this->request->onlyAllow('post', 'delete');
		if ($qualifyingRace['QualifyingRace']['user_id'] == $this->Auth->user('id')) {
			if ($this->QualifyingRace->delete()) {
				$this->Session->setFlash(__('Qualifying Race deleted'));
				$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
			}
		}
		$this->Session->setFlash(__('Qualifying Race was not deleted'));
		$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
	}

	public function view_pending() {
			$this->Paginator->settings = array(
			'conditions' => array(
				'approved !=' => 1
			),
		);
		$qualifyingRaces = $this->Paginator->paginate('QualifyingRace');
		$this->set(compact('qualifyingRaces'));
	}

	public function approve($id = null) {
		$this->QualifyingRace->id = $id;

		if (!$this->QualifyingRace->exists()) {
			throw new NotFoundException(__('Invalid qualifying race'));
		}

		if ($this->QualifyingRace->saveField('approved',1)) {
			// add link to approve races here
			$this->update_registrations($id);
			$this->Session->setFlash(__('Qualifying race approved'));
			$this->redirect(array('action' => 'view_pending'));
		}

		$this->Session->setFlash(__('Qualifying race was not approved'));
		$this->redirect(array('action' => 'view_pending'));
	}
	
	public function update_registrations($id) {
		$qualifyingRace = $this->QualifyingRace->find(
			'first',
			array(
				'conditions' => array(
					'QualifyingRace.id' => $id 
				),
				'recursive' => -1
			) 
		);
		
		$this->loadModel('RaceRegistration');
		$registrations = $this->RaceRegistration->find(
			'all',
			array(
				'conditions' => array(
					'RaceRegistration.user_id' => $qualifyingRace['QualifyingRace']['user_id'],
					'RaceRegistration.result_id' => null,
					'RaceRegistration.qualifying_race_id' => null,
					'RaceRegistration.qualifying_swim_id' => null,
					'RaceRegistration.no_qualifier' => 0
				),
				'fields' => array('id','user_id','race_id','qualifying_swim_id','qualifying_race_id','result_id'),
/*				'contain' => array(
					'Race' => array(
						'Experience' => array(
							'fields' => array('Experience.meters','Experience.time')
						)
					)
				) */
				'recursive' => 3
			)
		);
		
		foreach ($registrations as $registration) {
			if (
				($qualifyingRace['QualifyingRace']['meters'] >= $registration['Race']['Experience']['meters']) &&
				(
					($registration['Race']['Experience']['time'] == null) ||
					($registration['Race']['Experience']['time'] == 0) ||
					($qualifyingRace['QualifyingRace']['time'] <= $registration['Race']['Experience']['time'])
				)
			) {
				$registration['RaceRegistration']['qualifying_race_id'] = $id;			
			}

			if (
				($registration['RaceRegistration']['qualifying_race_id'])
			) {
				$registration['RaceRegistration']['approved'] = 1;
				$this->sendApprovedEmail($registration['RaceRegistration']['id']);				
			}

			$this->RaceRegistration->save($registration);				

		}
	}


}
