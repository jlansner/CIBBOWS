<?php
App::uses('AppController', 'Controller');
/**
 * BoardLevels Controller
 *
 * @property BoardLevel $BoardLevel
 */
class BoardLevelsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BoardLevel->recursive = 0;
		$this->set('boardLevels', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BoardLevel->exists($id)) {
			throw new NotFoundException(__('Invalid board member'));
		}
		$options = array('conditions' => array('BoardLevel.' . $this->BoardLevel->primaryKey => $id));
		$this->set('boardLevel', $this->BoardLevel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BoardLevel->create();
			if ($this->BoardLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The board member has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The board member could not be saved. Please, try again.'));
			}
		}
//		$users = $this->BoardLevel->User->find('list');
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
		if (!$this->BoardLevel->exists($id)) {
			throw new NotFoundException(__('Invalid board member'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BoardLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The board member has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The board member could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BoardLevel.' . $this->BoardLevel->primaryKey => $id));
			$this->request->data = $this->BoardLevel->find('first', $options);
		}
		$users = $this->BoardLevel->User->find('list');
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
		$this->BoardLevel->id = $id;
		if (!$this->BoardLevel->exists()) {
			throw new NotFoundException(__('Invalid board member'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BoardLevel->delete()) {
			$this->Session->setFlash(__('Board level deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Board level was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
