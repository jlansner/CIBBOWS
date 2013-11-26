<?php
App::uses('AppController', 'Controller');
/**
 * MembershipLevels Controller
 *
 * @property MembershipLevel $MembershipLevel
 */
class MembershipLevelsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MembershipLevel->recursive = 0;
		$this->set('membershipLevels', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MembershipLevel->exists($id)) {
			throw new NotFoundException(__('Invalid membership level'));
		}
		$options = array('conditions' => array('MembershipLevel.' . $this->MembershipLevel->primaryKey => $id));
		$this->set('membershipLevel', $this->MembershipLevel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MembershipLevel->create();
			if ($this->MembershipLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The membership level has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership level could not be saved. Please, try again.'));
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
		if (!$this->MembershipLevel->exists($id)) {
			throw new NotFoundException(__('Invalid membership level'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MembershipLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The membership level has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership level could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MembershipLevel.' . $this->MembershipLevel->primaryKey => $id));
			$this->request->data = $this->MembershipLevel->find('first', $options);
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
		$this->MembershipLevel->id = $id;
		if (!$this->MembershipLevel->exists()) {
			throw new NotFoundException(__('Invalid membership level'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MembershipLevel->delete()) {
			$this->Session->setFlash(__('Membership level deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Membership level was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
