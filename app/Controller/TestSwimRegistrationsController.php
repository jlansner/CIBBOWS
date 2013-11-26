<?php
App::uses('AppController', 'Controller');
/**
 * TestSwimRegistrations Controller
 *
 * @property TestSwimRegistration $TestSwimRegistration
 */
class TestSwimRegistrationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TestSwimRegistration->recursive = 0;
		$this->set('testSwimRegistrations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TestSwimRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid test swim registration'));
		}
		$options = array('conditions' => array('TestSwimRegistration.' . $this->TestSwimRegistration->primaryKey => $id));
		$this->set('testSwimRegistration', $this->TestSwimRegistration->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TestSwimRegistration->create();
			if ($this->TestSwimRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The test swim registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test swim registration could not be saved. Please, try again.'));
			}
		}
		$users = $this->TestSwimRegistration->User->find('list');
		$testSwims = $this->TestSwimRegistration->TestSwim->find('list');
		$genders = $this->TestSwimRegistration->Gender->find('list');
		$qualifyingSwims = $this->TestSwimRegistration->QualifyingSwim->find('list');
		$qualifyingRaces = $this->TestSwimRegistration->QualifyingRace->find('list');
		$results = $this->TestSwimRegistration->Result->find('list');
		$this->set(compact('users', 'testSwims', 'genders', 'qualifyingSwims', 'qualifyingRaces', 'results'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TestSwimRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid test swim registration'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TestSwimRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The test swim registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test swim registration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TestSwimRegistration.' . $this->TestSwimRegistration->primaryKey => $id));
			$this->request->data = $this->TestSwimRegistration->find('first', $options);
		}
		$users = $this->TestSwimRegistration->User->find('list');
		$testSwims = $this->TestSwimRegistration->TestSwim->find('list');
		$genders = $this->TestSwimRegistration->Gender->find('list');
		$qualifyingSwims = $this->TestSwimRegistration->QualifyingSwim->find('list');
		$qualifyingRaces = $this->TestSwimRegistration->QualifyingRace->find('list');
		$results = $this->TestSwimRegistration->Result->find('list');
		$this->set(compact('users', 'testSwims', 'genders', 'qualifyingSwims', 'qualifyingRaces', 'results'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TestSwimRegistration->id = $id;
		if (!$this->TestSwimRegistration->exists()) {
			throw new NotFoundException(__('Invalid test swim registration'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TestSwimRegistration->delete()) {
			$this->Session->setFlash(__('Test swim registration deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Test swim registration was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
