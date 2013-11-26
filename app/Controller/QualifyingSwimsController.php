<?php
App::uses('AppController', 'Controller');
/**
 * QualifyingSwims Controller
 *
 * @property QualifyingSwim $QualifyingSwim
 */
class QualifyingSwimsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QualifyingSwim->recursive = 0;
		$this->set('qualifyingSwims', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QualifyingSwim->exists($id)) {
			throw new NotFoundException(__('Invalid qualifying swim'));
		}
		$options = array('conditions' => array('QualifyingSwim.' . $this->QualifyingSwim->primaryKey => $id));
		$this->set('qualifyingSwim', $this->QualifyingSwim->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QualifyingSwim->create();
			if ($this->QualifyingSwim->save($this->request->data)) {
				$this->Session->setFlash(__('The qualifying swim has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qualifying swim could not be saved. Please, try again.'));
			}
		}
		$users = $this->QualifyingSwim->User->find('list');
		$distances = $this->QualifyingSwim->Distance->find('list');
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
		if (!$this->QualifyingSwim->exists($id)) {
			throw new NotFoundException(__('Invalid qualifying swim'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QualifyingSwim->save($this->request->data)) {
				$this->Session->setFlash(__('The qualifying swim has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qualifying swim could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QualifyingSwim.' . $this->QualifyingSwim->primaryKey => $id));
			$this->request->data = $this->QualifyingSwim->find('first', $options);
		}
		$users = $this->QualifyingSwim->User->find('list');
		$distances = $this->QualifyingSwim->Distance->find('list');
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
		$this->QualifyingSwim->id = $id;
		if (!$this->QualifyingSwim->exists()) {
			throw new NotFoundException(__('Invalid qualifying swim'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QualifyingSwim->delete()) {
			$this->Session->setFlash(__('Qualifying swim deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Qualifying swim was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
