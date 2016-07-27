<?php
App::uses('AppController', 'Controller');
/**
 * Discounts Controller
 *
 * @property Discount $Discount
 */
class DiscountsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Discount->recursive = 0;
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
		if (!$this->Discount->exists($id)) {
			throw new NotFoundException(__('Invalid discount'));
		}
		$options = array('conditions' => array('Discount.' . $this->Discount->primaryKey => $id));
		$this->set('discount', $this->Discount->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Discount->create();
			if ($this->Discount->save($this->request->data)) {
				$this->Session->setFlash(__('The discount has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The discount could not be saved. Please, try again.'));
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
		if (!$this->Discount->exists($id)) {
			throw new NotFoundException(__('Invalid discount'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Discount->save($this->request->data)) {
				$this->Session->setFlash(__('The discount has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The discount could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Discount.' . $this->Discount->primaryKey => $id));
			$this->request->data = $this->Discount->find('first', $options);
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
		$this->Discount->id = $id;
		if (!$this->Discount->exists()) {
			throw new NotFoundException(__('Invalid discount'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Discount->delete()) {
			$this->Session->setFlash(__('Discount deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Discount was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
