<?php
App::uses('AppController', 'Controller');
/**
 * Distances Controller
 *
 * @property Distance $Distance
 */
class DistancesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Distance->recursive = 0;
		$this->set('distances', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Distance->exists($id)) {
			throw new NotFoundException(__('Invalid distance'));
		}
		$options = array('conditions' => array('Distance.' . $this->Distance->primaryKey => $id));
		$this->set('distance', $this->Distance->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Distance->create();
			if ($this->Distance->save($this->request->data)) {
				$this->Session->setFlash(__('The distance has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The distance could not be saved. Please, try again.'));
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
		if (!$this->Distance->exists($id)) {
			throw new NotFoundException(__('Invalid distance'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Distance->save($this->request->data)) {
				$this->Session->setFlash(__('The distance has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The distance could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Distance.' . $this->Distance->primaryKey => $id));
			$this->request->data = $this->Distance->find('first', $options);
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
		$this->Distance->id = $id;
		if (!$this->Distance->exists()) {
			throw new NotFoundException(__('Invalid distance'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Distance->delete()) {
			$this->Session->setFlash(__('Distance deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Distance was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
