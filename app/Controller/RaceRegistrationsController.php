<?php
App::uses('AppController', 'Controller');
/**
 * RaceRegistrations Controller
 *
 * @property RaceRegistration $RaceRegistration
 */
class RaceRegistrationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RaceRegistration->recursive = 0;
		$this->set('raceRegistrations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RaceRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid race registration'));
		}
		$options = array('conditions' => array('RaceRegistration.' . $this->RaceRegistration->primaryKey => $id));
		$this->set('raceRegistration', $this->RaceRegistration->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RaceRegistration->create();
			if ($this->RaceRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The race registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race registration could not be saved. Please, try again.'));
			}
		}
		$users = $this->RaceRegistration->User->find('list');
		$races = $this->RaceRegistration->Race->find('list');
		$genders = $this->RaceRegistration->Gender->find('list');
		$ageGroups = $this->RaceRegistration->AgeGroup->find('list');
		$qualifyingSwims = $this->RaceRegistration->QualifyingSwim->find('list');
		$qualifyingRaces = $this->RaceRegistration->QualifyingRace->find('list');
		$results = $this->RaceRegistration->Result->find('list');
		$shirtSizes = $this->RaceRegistration->ShirtSize->find('list');
		$this->set(compact('users', 'races', 'genders', 'ageGroups', 'qualifyingSwims', 'qualifyingRaces', 'results', 'shirtSizes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RaceRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid race registration'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RaceRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The race registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race registration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RaceRegistration.' . $this->RaceRegistration->primaryKey => $id));
			$this->request->data = $this->RaceRegistration->find('first', $options);
		}
		$users = $this->RaceRegistration->User->find('list');
		$races = $this->RaceRegistration->Race->find('list');
		$genders = $this->RaceRegistration->Gender->find('list');
		$ageGroups = $this->RaceRegistration->AgeGroup->find('list');
		$qualifyingSwims = $this->RaceRegistration->QualifyingSwim->find('list');
		$qualifyingRaces = $this->RaceRegistration->QualifyingRace->find('list');
		$results = $this->RaceRegistration->Result->find('list');
		$shirtSizes = $this->RaceRegistration->ShirtSize->find('list');
		$this->set(compact('users', 'races', 'genders', 'ageGroups', 'qualifyingSwims', 'qualifyingRaces', 'results', 'shirtSizes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RaceRegistration->id = $id;
		if (!$this->RaceRegistration->exists()) {
			throw new NotFoundException(__('Invalid race registration'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RaceRegistration->delete()) {
			$this->Session->setFlash(__('Race registration deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Race registration was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
