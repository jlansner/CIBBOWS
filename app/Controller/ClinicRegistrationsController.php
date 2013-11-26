<?php
App::uses('AppController', 'Controller');
/**
 * ClinicRegistrations Controller
 *
 * @property ClinicRegistration $ClinicRegistration
 */
class ClinicRegistrationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClinicRegistration->recursive = 0;
		$this->set('clinicRegistrations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClinicRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid clinic registration'));
		}
		$options = array('conditions' => array('ClinicRegistration.' . $this->ClinicRegistration->primaryKey => $id));
		$this->set('clinicRegistration', $this->ClinicRegistration->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClinicRegistration->create();
			if ($this->ClinicRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The clinic registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clinic registration could not be saved. Please, try again.'));
			}
		}

		$users = $this->ClinicRegistration->User->find('list');
		$clinics = $this->ClinicRegistration->Clinic->find('list');
		$genders = $this->ClinicRegistration->Gender->find('list');
		$qualifyingSwims = $this->ClinicRegistration->QualifyingSwim->find('list');
		$qualifyingRaces = $this->ClinicRegistration->QualifyingRace->find('list');
		$results = $this->ClinicRegistration->Result->find('list');
		$this->set(compact('users', 'clinics', 'genders', 'qualifyingSwims', 'qualifyingRaces', 'results'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ClinicRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid clinic registration'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClinicRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The clinic registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clinic registration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClinicRegistration.' . $this->ClinicRegistration->primaryKey => $id));
			$this->request->data = $this->ClinicRegistration->find('first', $options);
		}
		$users = $this->ClinicRegistration->User->find('list');
		$clinics = $this->ClinicRegistration->Clinic->find('list');
		$genders = $this->ClinicRegistration->Gender->find('list');
		$qualifyingSwims = $this->ClinicRegistration->QualifyingSwim->find('list');
		$qualifyingRaces = $this->ClinicRegistration->QualifyingRace->find('list');
		$results = $this->ClinicRegistration->Result->find('list');
		$this->set(compact('users', 'clinics', 'genders', 'qualifyingSwims', 'qualifyingRaces', 'results'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClinicRegistration->id = $id;
		if (!$this->ClinicRegistration->exists()) {
			throw new NotFoundException(__('Invalid clinic registration'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClinicRegistration->delete()) {
			$this->Session->setFlash(__('Clinic registration deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Clinic registration was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
