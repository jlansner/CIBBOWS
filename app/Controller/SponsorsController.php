<?php
App::uses('AppController', 'Controller');
/**
 * Sponsors Controller
 *
 * @property Sponsor $Sponsor
 */
class SponsorsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Sponsor->recursive = 0;
		$this->set('sponsors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sponsor->exists($id)) {
			throw new NotFoundException(__('Invalid sponsor'));
		}
		$options = array('conditions' => array('Sponsor.' . $this->Sponsor->primaryKey => $id));
		$this->set('sponsor', $this->Sponsor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sponsor->create();
			if ($this->Sponsor->save($this->request->data)) {
				$this->Session->setFlash(__('The sponsor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sponsor could not be saved. Please, try again.'));
			}
		}
		$logoSizes = $this->Sponsor->LogoSize->find('list');
		$this->set(compact('logoSizes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Sponsor->exists($id)) {
			throw new NotFoundException(__('Invalid sponsor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sponsor->save($this->request->data)) {
				$this->Session->setFlash(__('The sponsor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sponsor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sponsor.' . $this->Sponsor->primaryKey => $id));
			$this->request->data = $this->Sponsor->find('first', $options);
		}
		$logoSizes = $this->Sponsor->LogoSize->find('list');
		$this->set(compact('logoSizes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Sponsor->id = $id;
		if (!$this->Sponsor->exists()) {
			throw new NotFoundException(__('Invalid sponsor'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sponsor->delete()) {
			$this->Session->setFlash(__('Sponsor deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sponsor was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
