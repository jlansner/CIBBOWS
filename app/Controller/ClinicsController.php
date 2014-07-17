<?php
App::uses('AppController', 'Controller');
/**
 * Clinics Controller
 *
 * @property Clinic $Clinic
 */
class ClinicsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Clinic->recursive = 0;
		$this->set('clinics', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($year = null, $month = null, $day = null, $url_title = null) {
 
        if (!$url_title) {
            throw new NotFoundException(__('Invalid race'));
        }
		$clinic = $this->Clinic->find(
			'first',
			array(

	        	'conditions' => array(
    	    		'Clinic.url_title' => $url_title,
    	    		'Clinic.date' => $year . '-' . $month . '-' . $day
	    	    ),
	    	    'recursive' => 2
			)
		); 
		$this->set('clinic', $clinic);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Clinic->create();
			if ($this->Clinic->save($this->request->data)) {
				$this->Session->setFlash(__('The clinic has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clinic could not be saved. Please, try again.'));
			}
		}
		$users = $this->Clinic->User->find('list');
		$locations = $this->Clinic->Location->find('list');
		$membershipLevels = $this->Clinic->MembershipLevel->find('list');
		$this->set(compact('users', 'locations', 'membershipLevels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Clinic->exists($id)) {
			throw new NotFoundException(__('Invalid clinic'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Clinic->save($this->request->data)) {
				$this->Session->setFlash(__('The clinic has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clinic could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Clinic.' . $this->Clinic->primaryKey => $id));
			$this->request->data = $this->Clinic->find('first', $options);
		}
		$users = $this->Clinic->User->find('list');
		$locations = $this->Clinic->Location->find('list');
		$membershipLevels = $this->Clinic->MembershipLevel->find('list');
		$this->set(compact('users', 'locations', 'membershipLevels'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Clinic->id = $id;
		if (!$this->Clinic->exists()) {
			throw new NotFoundException(__('Invalid clinic'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Clinic->delete()) {
			$this->Session->setFlash(__('Clinic deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Clinic was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
