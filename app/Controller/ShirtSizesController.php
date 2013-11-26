<?php
App::uses('AppController', 'Controller');
/**
 * ShirtSizes Controller
 *
 * @property ShirtSize $ShirtSize
 */
class ShirtSizesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ShirtSize->recursive = 0;
		$this->set('shirtSizes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ShirtSize->exists($id)) {
			throw new NotFoundException(__('Invalid shirt size'));
		}
		$options = array('conditions' => array('ShirtSize.' . $this->ShirtSize->primaryKey => $id));
		$this->set('shirtSize', $this->ShirtSize->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ShirtSize->create();
			if ($this->ShirtSize->save($this->request->data)) {
				$this->Session->setFlash(__('The shirt size has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shirt size could not be saved. Please, try again.'));
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
		if (!$this->ShirtSize->exists($id)) {
			throw new NotFoundException(__('Invalid shirt size'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ShirtSize->save($this->request->data)) {
				$this->Session->setFlash(__('The shirt size has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shirt size could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ShirtSize.' . $this->ShirtSize->primaryKey => $id));
			$this->request->data = $this->ShirtSize->find('first', $options);
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
		$this->ShirtSize->id = $id;
		if (!$this->ShirtSize->exists()) {
			throw new NotFoundException(__('Invalid shirt size'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ShirtSize->delete()) {
			$this->Session->setFlash(__('Shirt size deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Shirt size was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
