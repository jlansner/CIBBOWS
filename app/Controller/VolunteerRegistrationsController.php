<?php
App::uses('AppController', 'Controller');
/**
 * VolunteerRegistrations Controller
 *
 * @property VolunteerRegistration $VolunteerRegistration
 */
class VolunteerRegistrationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VolunteerRegistration->recursive = 0;
		$this->set('volunteerRegistrations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->VolunteerRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid volunteer registration'));
		}
		$options = array('conditions' => array('VolunteerRegistration.' . $this->VolunteerRegistration->primaryKey => $id));
		$this->set('volunteerRegistration', $this->VolunteerRegistration->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VolunteerRegistration->create();
			if ($this->VolunteerRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The volunteer registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The volunteer registration could not be saved. Please, try again.'));
			}
		}
		$users = $this->VolunteerRegistration->User->find('list');
		$races = $this->VolunteerRegistration->Race->find('list');
		$volunteerTasks = $this->VolunteerRegistration->VolunteerTask->find('list');
		$this->set(compact('users', 'races', 'volunteerTasks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->VolunteerRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid volunteer registration'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VolunteerRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The volunteer registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The volunteer registration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('VolunteerRegistration.' . $this->VolunteerRegistration->primaryKey => $id));
			$this->request->data = $this->VolunteerRegistration->find('first', $options);
		}
		$users = $this->VolunteerRegistration->User->find('list');
		$races = $this->VolunteerRegistration->Race->find('list');
		$volunteerTasks = $this->VolunteerRegistration->VolunteerTask->find('list');
		$this->set(compact('users', 'races', 'volunteerTasks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->VolunteerRegistration->id = $id;
		if (!$this->VolunteerRegistration->exists()) {
			throw new NotFoundException(__('Invalid volunteer registration'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->VolunteerRegistration->delete()) {
			$this->Session->setFlash(__('Volunteer registration deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Volunteer registration was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
