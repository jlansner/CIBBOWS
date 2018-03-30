<?php
App::uses('AppController', 'Controller');
/**
 * MembershipFees Controller
 *
 * @property MembershipFee $MembershipFee
 */
class MembershipFeesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MembershipFee->recursive = 0;
		$this->set('membershipFees', $this->paginate());
	}

	public function admin_index() {
		$this->MembershipFee->recursive = 0;
		$this->set('membershipFees', $this->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MembershipFee->exists($id)) {
			throw new NotFoundException(__('Invalid membership fee'));
		}
		$options = array('conditions' => array('MembershipFee.' . $this->MembershipFee->primaryKey => $id));
		$this->set('membershipFee', $this->MembershipFee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MembershipFee->create();
			if ($this->MembershipFee->save($this->request->data)) {
				$this->Session->setFlash(__('The membership fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership fee could not be saved. Please, try again.'));
			}
		}
		$membershipLevels = $this->MembershipFee->MembershipLevel->find('list');
		$this->set(compact('membershipLevels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MembershipFee->exists($id)) {
			throw new NotFoundException(__('Invalid membership fee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MembershipFee->save($this->request->data)) {
				$this->Session->setFlash(__('The membership fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership fee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MembershipFee.' . $this->MembershipFee->primaryKey => $id));
			$this->request->data = $this->MembershipFee->find('first', $options);
		}
		$membershipLevels = $this->MembershipFee->MembershipLevel->find('list');
		$this->set(compact('membershipLevels'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MembershipFee->id = $id;
		if (!$this->MembershipFee->exists()) {
			throw new NotFoundException(__('Invalid membership fee'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MembershipFee->delete()) {
			$this->Session->setFlash(__('Membership fee deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Membership fee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
