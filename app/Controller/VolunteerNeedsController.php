<?php
App::uses('AppController', 'Controller');
/**
 * VolunteerNeeds Controller
 *
 * @property VolunteerNeed $VolunteerNeed
 */
class VolunteerNeedsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VolunteerNeed->recursive = 0;
		$this->set('volunteerNeeds', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->VolunteerNeed->exists($id)) {
			throw new NotFoundException(__('Invalid volunteer need'));
		}
		$options = array('conditions' => array('VolunteerNeed.' . $this->VolunteerNeed->primaryKey => $id));
		$this->set('volunteerNeed', $this->VolunteerNeed->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VolunteerNeed->create();
			if ($this->VolunteerNeed->save($this->request->data)) {
				$this->Session->setFlash(__('The volunteer need has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The volunteer need could not be saved. Please, try again.'));
			}
		}
		$volunteerTasks = $this->VolunteerNeed->VolunteerTask->find('list');
		$races = $this->VolunteerNeed->Race->find('list');
		$this->set(compact('volunteerTasks', 'races'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->VolunteerNeed->exists($id)) {
			throw new NotFoundException(__('Invalid volunteer need'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VolunteerNeed->save($this->request->data)) {
				$this->Session->setFlash(__('The volunteer need has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The volunteer need could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('VolunteerNeed.' . $this->VolunteerNeed->primaryKey => $id));
			$this->request->data = $this->VolunteerNeed->find('first', $options);
		}
		$volunteerTasks = $this->VolunteerNeed->VolunteerTask->find('list');
		$races = $this->VolunteerNeed->Race->find('list');
		$this->set(compact('volunteerTasks', 'races'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->VolunteerNeed->id = $id;
		if (!$this->VolunteerNeed->exists()) {
			throw new NotFoundException(__('Invalid volunteer need'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->VolunteerNeed->delete()) {
			$this->Session->setFlash(__('Volunteer need deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Volunteer need was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
