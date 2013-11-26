<?php
App::uses('AppController', 'Controller');
/**
 * TestSwims Controller
 *
 * @property TestSwim $TestSwim
 */
class TestSwimsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TestSwim->recursive = 0;
		$this->set('testSwims', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TestSwim->exists($id)) {
			throw new NotFoundException(__('Invalid test swim'));
		}
		$options = array('conditions' => array('TestSwim.' . $this->TestSwim->primaryKey => $id));
		$this->set('testSwim', $this->TestSwim->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TestSwim->create();
			if ($this->TestSwim->save($this->request->data)) {
				$this->Session->setFlash(__('The test swim has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test swim could not be saved. Please, try again.'));
			}
		}
		$users = $this->TestSwim->User->find('list');
		$membershipLevels = $this->TestSwim->MembershipLevel->find('list');
		$distances = $this->TestSwim->Distance->find('list');
		$experiences = $this->TestSwim->Experience->find('list');
		$this->set(compact('users', 'membershipLevels', 'distances', 'experiences'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TestSwim->exists($id)) {
			throw new NotFoundException(__('Invalid test swim'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TestSwim->save($this->request->data)) {
				$this->Session->setFlash(__('The test swim has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test swim could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TestSwim.' . $this->TestSwim->primaryKey => $id));
			$this->request->data = $this->TestSwim->find('first', $options);
		}
		$users = $this->TestSwim->User->find('list');
		$membershipLevels = $this->TestSwim->MembershipLevel->find('list');
		$distances = $this->TestSwim->Distance->find('list');
		$experiences = $this->TestSwim->Experience->find('list');
		$this->set(compact('users', 'membershipLevels', 'distances', 'experiences'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TestSwim->id = $id;
		if (!$this->TestSwim->exists()) {
			throw new NotFoundException(__('Invalid test swim'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TestSwim->delete()) {
			$this->Session->setFlash(__('Test swim deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Test swim was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
