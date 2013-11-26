<?php
App::uses('AppController', 'Controller');
/**
 * TestSwimFees Controller
 *
 * @property TestSwimFee $TestSwimFee
 */
class TestSwimFeesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TestSwimFee->recursive = 0;
		$this->set('testSwimFees', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TestSwimFee->exists($id)) {
			throw new NotFoundException(__('Invalid test swim fee'));
		}
		$options = array('conditions' => array('TestSwimFee.' . $this->TestSwimFee->primaryKey => $id));
		$this->set('testSwimFee', $this->TestSwimFee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TestSwimFee->create();
			if ($this->TestSwimFee->save($this->request->data)) {
				$this->Session->setFlash(__('The test swim fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test swim fee could not be saved. Please, try again.'));
			}
		}
		$testSwims = $this->TestSwimFee->TestSwim->find('list');
		$membershipLevels = $this->TestSwimFee->MembershipLevel->find('list');
		$this->set(compact('testSwims', 'membershipLevels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TestSwimFee->exists($id)) {
			throw new NotFoundException(__('Invalid test swim fee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TestSwimFee->save($this->request->data)) {
				$this->Session->setFlash(__('The test swim fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test swim fee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TestSwimFee.' . $this->TestSwimFee->primaryKey => $id));
			$this->request->data = $this->TestSwimFee->find('first', $options);
		}
		$testSwims = $this->TestSwimFee->TestSwim->find('list');
		$membershipLevels = $this->TestSwimFee->MembershipLevel->find('list');
		$this->set(compact('testSwims', 'membershipLevels'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TestSwimFee->id = $id;
		if (!$this->TestSwimFee->exists()) {
			throw new NotFoundException(__('Invalid test swim fee'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TestSwimFee->delete()) {
			$this->Session->setFlash(__('Test swim fee deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Test swim fee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
