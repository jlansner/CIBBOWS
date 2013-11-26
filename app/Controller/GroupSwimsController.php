<?php
App::uses('AppController', 'Controller');
/**
 * GroupSwims Controller
 *
 * @property GroupSwim $GroupSwim
 */
class GroupSwimsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GroupSwim->recursive = 0;
		$this->set('groupSwims', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GroupSwim->exists($id)) {
			throw new NotFoundException(__('Invalid group swim'));
		}
		$options = array('conditions' => array('GroupSwim.' . $this->GroupSwim->primaryKey => $id));
		$this->set('groupSwim', $this->GroupSwim->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GroupSwim->create();
			if ($this->GroupSwim->save($this->request->data)) {
				$this->Session->setFlash(__('The group swim has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group swim could not be saved. Please, try again.'));
			}
		}
		$locations = $this->GroupSwim->Location->find('list');
		$this->set(compact('locations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GroupSwim->exists($id)) {
			throw new NotFoundException(__('Invalid group swim'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GroupSwim->save($this->request->data)) {
				$this->Session->setFlash(__('The group swim has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group swim could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GroupSwim.' . $this->GroupSwim->primaryKey => $id));
			$this->request->data = $this->GroupSwim->find('first', $options);
		}
		$locations = $this->GroupSwim->Location->find('list');
		$this->set(compact('locations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GroupSwim->id = $id;
		if (!$this->GroupSwim->exists()) {
			throw new NotFoundException(__('Invalid group swim'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GroupSwim->delete()) {
			$this->Session->setFlash(__('Group swim deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Group swim was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
