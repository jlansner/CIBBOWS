<?php
App::uses('AppController', 'Controller');
/**
 * VolunteerTasks Controller
 *
 * @property VolunteerTask $VolunteerTask
 */
class VolunteerTasksController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VolunteerTask->recursive = 0;
		$this->set('volunteerTasks', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->VolunteerTask->exists($id)) {
			throw new NotFoundException(__('Invalid volunteer task'));
		}
		$options = array('conditions' => array('VolunteerTask.' . $this->VolunteerTask->primaryKey => $id));
		$this->set('volunteerTask', $this->VolunteerTask->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VolunteerTask->create();
			if ($this->VolunteerTask->save($this->request->data)) {
				$this->Session->setFlash(__('The volunteer task has been saved'));
				$this->redirect(
					array(
						'controller' => 'volunteer_tasks',
						'action' => 'index'
					)
				);
			} else {
				$this->Session->setFlash(__('The volunteer task could not be saved. Please, try again.'));
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
		if (!$this->VolunteerTask->exists($id)) {
			throw new NotFoundException(__('Invalid volunteer task'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VolunteerTask->save($this->request->data)) {
				$this->Session->setFlash(__('The volunteer task has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The volunteer task could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('VolunteerTask.' . $this->VolunteerTask->primaryKey => $id));
			$this->request->data = $this->VolunteerTask->find('first', $options);
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
		$this->VolunteerTask->id = $id;
		if (!$this->VolunteerTask->exists()) {
			throw new NotFoundException(__('Invalid volunteer task'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->VolunteerTask->delete()) {
			$this->Session->setFlash(__('Volunteer task deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Volunteer task was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
