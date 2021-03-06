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
	public function admin_index() {
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
				$this->redirect(
					array(
						'controller' => 'race_fees',
						'action' => 'index'
					)
				);
			} else {
				$this->Session->setFlash(__('The race fee could not be saved. Please, try again.'));
			}
		}
		$races = $this->RaceFee->Race->find(
			'list',
			array(
				'conditions' => array(
					'Race.date >=' => date('Y-m-d')
				)
			)
		);
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
				$this->redirect(array('controller' => 'race_fees', 'action' => 'index'));
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
		$saveData = array();
		if ($this->request->is('post')) {
			$i = 0;
			foreach ($this->request->data['RaceFee'] as $raceFee) {
				if (strlen($raceFee['start_date']) > 2) {
					$saveData[$i] = array(
						'race_id' => $this->request->data['RaceFee']['race_id'],
						'start_date' => $raceFee['start_date'],
						'end_date' => $raceFee['end_date'],
						'priority' => '1',
						'price' => $raceFee['member_price'],
						'membership_level_id' => '1'
					);

					$i++;

					$saveData[$i] = array(
						'race_id' => $this->request->data['RaceFee']['race_id'],
						'start_date' => $raceFee['start_date'],
						'end_date' => $raceFee['end_date'],
						'priority' => '1',
						'price' => $raceFee['nonmember_price'],
						'membership_level_id' => '0'
					);
					$i++;
				}
			}
			$this->RaceFee->create();
			if ($this->RaceFee->saveMany($saveData)) {
				$this->Session->setFlash(__('The race fees have been saved'));
				$this->redirect(
					array(
						'action' => 'index',
						'admin' => true
					)
				);
			} else {
				$this->Session->setFlash(__('The race fees could not be saved. Please, try again.'));
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
			$races = $this->RaceFee->Race->find(
				'list',
				array(
					'conditions' => array(
						'Race.date >=' => date('Y-m-d')
					)
				)
			);
			$this->set('races',$races);
			$race = null;
		}
		$membershipLevels = $this->RaceFee->MembershipLevel->find('list');

		$this->set(compact('race','membershipLevels','saveData'));
	}
}
