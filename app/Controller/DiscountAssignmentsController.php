<?php
App::uses('AppController', 'Controller');
/**
 * DiscountAssignments Controller
 *
 * @property DiscountAssignment $DiscountAssignment
 */
class DiscountAssignmentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DiscountAssignment->recursive = 0;
		$this->set('discounts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DiscountAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid discount'));
		}
		$options = array('conditions' => array('DiscountAssignment.' . $this->DiscountAssignment->primaryKey => $id));
		$this->set('discount', $this->DiscountAssignment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DiscountAssignment->create();
			if ($this->DiscountAssignment->save($this->request->data)) {
				$this->Session->setFlash(__('The discount has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The discount could not be saved. Please, try again.'));
			}
		}
		$users = $this->DiscountAssignment->User->find(
			'list',
			array(
				'order' => array(
					'User.last_name'
				)
			)
		);
		$discounts = $this->DiscountAssignment->Discount->find(
			'list',
			array(
				'order' => array(
					'Discount.title'
				)
			)
		);
		$this->set(compact('discounts','users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DiscountAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid discount'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DiscountAssignment->save($this->request->data)) {
				$this->Session->setFlash(__('The discount has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The discount could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DiscountAssignment.' . $this->DiscountAssignment->primaryKey => $id));
			$this->request->data = $this->DiscountAssignment->find('first', $options);
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
		$this->DiscountAssignment->id = $id;
		if (!$this->DiscountAssignment->exists()) {
			throw new NotFoundException(__('Invalid discount'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DiscountAssignment->delete()) {
			$this->Session->setFlash(__('DiscountAssignment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('DiscountAssignment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
