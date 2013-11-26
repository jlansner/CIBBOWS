<?php
App::uses('AppController', 'Controller');
/**
 * CodesResults Controller
 *
 * @property CodesResult $CodesResult
 */
class CodesResultsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CodesResult->recursive = 0;
		$this->set('codesResults', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CodesResult->exists($id)) {
			throw new NotFoundException(__('Invalid codes result'));
		}
		$options = array('conditions' => array('CodesResult.' . $this->CodesResult->primaryKey => $id));
		$this->set('codesResult', $this->CodesResult->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CodesResult->create();
			if ($this->CodesResult->save($this->request->data)) {
				$this->Session->setFlash(__('The codes result has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The codes result could not be saved. Please, try again.'));
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
		if (!$this->CodesResult->exists($id)) {
			throw new NotFoundException(__('Invalid codes result'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CodesResult->save($this->request->data)) {
				$this->Session->setFlash(__('The codes result has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The codes result could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CodesResult.' . $this->CodesResult->primaryKey => $id));
			$this->request->data = $this->CodesResult->find('first', $options);
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
		$this->CodesResult->id = $id;
		if (!$this->CodesResult->exists()) {
			throw new NotFoundException(__('Invalid codes result'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CodesResult->delete()) {
			$this->Session->setFlash(__('Codes result deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Codes result was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
