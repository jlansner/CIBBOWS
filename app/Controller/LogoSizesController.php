<?php
App::uses('AppController', 'Controller');
/**
 * LogoSizes Controller
 *
 * @property LogoSize $LogoSize
 */
class LogoSizesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->LogoSize->recursive = 0;
		$this->set('logoSizes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LogoSize->exists($id)) {
			throw new NotFoundException(__('Invalid logo size'));
		}
		$options = array('conditions' => array('LogoSize.' . $this->LogoSize->primaryKey => $id));
		$this->set('logoSize', $this->LogoSize->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LogoSize->create();
			if ($this->LogoSize->save($this->request->data)) {
				$this->Session->setFlash(__('The logo size has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The logo size could not be saved. Please, try again.'));
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
		if (!$this->LogoSize->exists($id)) {
			throw new NotFoundException(__('Invalid logo size'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LogoSize->save($this->request->data)) {
				$this->Session->setFlash(__('The logo size has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The logo size could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LogoSize.' . $this->LogoSize->primaryKey => $id));
			$this->request->data = $this->LogoSize->find('first', $options);
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
		$this->LogoSize->id = $id;
		if (!$this->LogoSize->exists()) {
			throw new NotFoundException(__('Invalid logo size'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LogoSize->delete()) {
			$this->Session->setFlash(__('Logo size deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Logo size was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
