<?php
App::uses('AppController', 'Controller');
/**
 * BoardTitles Controller
 *
 * @property BoardTitle $BoardTitle
 */
class BoardTitlesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BoardTitle->recursive = 0;
		$this->set('boardTitles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BoardTitle->exists($id)) {
			throw new NotFoundException(__('Invalid board title'));
		}
		$options = array('conditions' => array('BoardTitle.' . $this->BoardTitle->primaryKey => $id));
		$this->set('boardTitle', $this->BoardTitle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BoardTitle->create();
			if ($this->BoardTitle->save($this->request->data)) {
				$this->Session->setFlash(__('The board title has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The board title could not be saved. Please, try again.'));
			}
		}
		$boardMembers = $this->BoardTitle->BoardMember->find('list');
		$this->set(compact('boardMembers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BoardTitle->exists($id)) {
			throw new NotFoundException(__('Invalid board title'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BoardTitle->save($this->request->data)) {
				$this->Session->setFlash(__('The board title has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The board title could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BoardTitle.' . $this->BoardTitle->primaryKey => $id));
			$this->request->data = $this->BoardTitle->find('first', $options);
		}
		$users = $this->BoardTitle->User->find('list');
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
		$this->BoardTitle->id = $id;
		if (!$this->BoardTitle->exists()) {
			throw new NotFoundException(__('Invalid board title'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BoardTitle->delete()) {
			$this->Session->setFlash(__('Board title deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Board title was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
