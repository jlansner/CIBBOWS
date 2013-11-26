<?php
App::uses('AppController', 'Controller');
/**
 * ClinicFees Controller
 *
 * @property ClinicFee $ClinicFee
 */
class ClinicFeesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClinicFee->recursive = 0;
		$this->set('clinicFees', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClinicFee->exists($id)) {
			throw new NotFoundException(__('Invalid clinic fee'));
		}
		$options = array('conditions' => array('ClinicFee.' . $this->ClinicFee->primaryKey => $id));
		$this->set('clinicFee', $this->ClinicFee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClinicFee->create();
			if ($this->ClinicFee->save($this->request->data)) {
				$this->Session->setFlash(__('The clinic fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clinic fee could not be saved. Please, try again.'));
			}
		}
		$clinics = $this->ClinicFee->Clinic->find('list');
		$membershipLevels = $this->ClinicFee->MembershipLevel->find('list');
		$this->set(compact('clinics', 'membershipLevels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ClinicFee->exists($id)) {
			throw new NotFoundException(__('Invalid clinic fee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClinicFee->save($this->request->data)) {
				$this->Session->setFlash(__('The clinic fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clinic fee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClinicFee.' . $this->ClinicFee->primaryKey => $id));
			$this->request->data = $this->ClinicFee->find('first', $options);
		}
		$clinics = $this->ClinicFee->Clinic->find('list');
		$membershipLevels = $this->ClinicFee->MembershipLevel->find('list');
		$this->set(compact('clinics', 'membershipLevels'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClinicFee->id = $id;
		if (!$this->ClinicFee->exists()) {
			throw new NotFoundException(__('Invalid clinic fee'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClinicFee->delete()) {
			$this->Session->setFlash(__('Clinic fee deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Clinic fee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
