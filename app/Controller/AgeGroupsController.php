<?php
App::uses('AppController', 'Controller');
/**
 * AgeGroups Controller
 *
 * @property AgeGroup $AgeGroup
 */
class AgeGroupsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AgeGroup->recursive = 0;
		$this->set('ageGroups', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$id) {
			$id = $this->request->params['id'];
		}

		if (!$this->AgeGroup->exists($id)) {
			throw new NotFoundException(__('Invalid age group'));
		}
		$options = array('conditions' => array('AgeGroup.' . $this->AgeGroup->primaryKey => $id));
		$this->set('ageGroup', $this->AgeGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AgeGroup->create();
			if ($this->AgeGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The age group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age group could not be saved. Please, try again.'));
			}
		}
		$genders = $this->AgeGroup->Gender->find('list');
		$this->set(compact('genders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AgeGroup->exists($id)) {
			throw new NotFoundException(__('Invalid age group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AgeGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The age group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AgeGroup.' . $this->AgeGroup->primaryKey => $id));
			$this->request->data = $this->AgeGroup->find('first', $options);
		}
		$genders = $this->AgeGroup->Gender->find('list');
		$this->set(compact('genders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AgeGroup->id = $id;
		if (!$this->AgeGroup->exists()) {
			throw new NotFoundException(__('Invalid age group'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AgeGroup->delete()) {
			$this->Session->setFlash(__('Age group deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Age group was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
