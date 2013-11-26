<?php
App::uses('AppController', 'Controller');
/**
 * ExternalRaces Controller
 *
 * @property ExternalRace $ExternalRace
 */
class ExternalRacesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ExternalRace->recursive = 0;
		$this->set('externalRaces', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ExternalRace->exists($id)) {
			throw new NotFoundException(__('Invalid external race'));
		}
		$options = array('conditions' => array('ExternalRace.' . $this->ExternalRace->primaryKey => $id));
		$this->set('externalRace', $this->ExternalRace->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExternalRace->create();
			if ($this->ExternalRace->save($this->request->data)) {
				$this->Session->setFlash(__('The external race has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The external race could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ExternalRace->exists($id)) {
			throw new NotFoundException(__('Invalid external race'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ExternalRace->save($this->request->data)) {
				$this->Session->setFlash(__('The external race has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The external race could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ExternalRace.' . $this->ExternalRace->primaryKey => $id));
			$this->request->data = $this->ExternalRace->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ExternalRace->id = $id;
		if (!$this->ExternalRace->exists()) {
			throw new NotFoundException(__('Invalid external race'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ExternalRace->delete()) {
			$this->Session->setFlash(__('External race deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('External race was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
