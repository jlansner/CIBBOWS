<?php
App::uses('AppController', 'Controller');
/**
 * RaceFees Controller
 *
 * @property RaceFee $RaceFee
 */
class RaceFeesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RaceFee->recursive = 0;
		$this->set('raceFees', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RaceFee->exists($id)) {
			throw new NotFoundException(__('Invalid race fee'));
		}
		$options = array('conditions' => array('RaceFee.' . $this->RaceFee->primaryKey => $id));
		$this->set('raceFee', $this->RaceFee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RaceFee->create();
			if ($this->RaceFee->save($this->request->data)) {
				$this->Session->setFlash(__('The race fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race fee could not be saved. Please, try again.'));
			}
		}
		$races = $this->RaceFee->Race->find('list');
		$membershipLevels = $this->RaceFee->MembershipLevel->find('list');
		$this->set(compact('races', 'membershipLevels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RaceFee->exists($id)) {
			throw new NotFoundException(__('Invalid race fee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RaceFee->save($this->request->data)) {
				$this->Session->setFlash(__('The race fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race fee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RaceFee.' . $this->RaceFee->primaryKey => $id));
			$this->request->data = $this->RaceFee->find('first', $options);
		}
		$races = $this->RaceFee->Race->find('list');
		$membershipLevels = $this->RaceFee->MembershipLevel->find('list');
		$this->set(compact('races', 'membershipLevels'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RaceFee->id = $id;
		if (!$this->RaceFee->exists()) {
			throw new NotFoundException(__('Invalid race fee'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RaceFee->delete()) {
			$this->Session->setFlash(__('Race fee deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Race fee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function add_fee($race_id = null) {
		if ($this->request->is('post')) {
			$this->RaceFee->create();
			if ($this->RaceFee->save($this->request->data)) {
				$this->Session->setFlash(__('The race fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race fee could not be saved. Please, try again.'));
			}
		}
		
		if ($race_id) {
			$race = $this->RaceFee->Race->find(
				'first',
				array(
					'conditions' => array(
						'Race.id' => $race_id
					)
				)
			);
		} else {
			$races = $this->RaceFee->Race->find('list');
			$this->set('races',$races);
			$race = null;
		}
		$membershipLevels = $this->RaceFee->MembershipLevel->find('list');
		$this->set('race',$race);

		$this->set(compact('membershipLevels'));
	}
}
