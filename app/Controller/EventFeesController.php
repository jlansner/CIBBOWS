<?php
App::uses('AppController', 'Controller');
/**
 * EventFees Controller
 *
 * @property EventFee $EventFee
 */
class EventFeesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->EventFee->recursive = 0;
		$this->set('eventFees', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventFee->exists($id)) {
			throw new NotFoundException(__('Invalid event fee'));
		}
		$options = array('conditions' => array('EventFee.' . $this->EventFee->primaryKey => $id));
		$this->set('eventFee', $this->EventFee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventFee->create();
			if ($this->EventFee->save($this->request->data)) {
				$this->Session->setFlash(__('The event fee has been saved'));
				$this->redirect(
					array(
						'controller' => 'event_fees',
						'action' => 'index'
					)
				);
			} else {
				$this->Session->setFlash(__('The event fee could not be saved. Please, try again.'));
			}
		}
		$events = $this->EventFee->Event->find(
			'list',
			array(
				'conditions' => array(
					'Event.date >=' => date('Y-m-d')
				)
			)
		);
		$membershipLevels = $this->EventFee->MembershipLevel->find('list');
		$this->set(compact('events', 'membershipLevels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventFee->exists($id)) {
			throw new NotFoundException(__('Invalid event fee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EventFee->save($this->request->data)) {
				$this->Session->setFlash(__('The event fee has been saved'));
				$this->redirect(array('controller' => 'event_fees', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event fee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventFee.' . $this->EventFee->primaryKey => $id));
			$this->request->data = $this->EventFee->find('first', $options);
		}
		$events = $this->EventFee->Event->find('list');
		$membershipLevels = $this->EventFee->MembershipLevel->find('list');
		$this->set(compact('events', 'membershipLevels'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EventFee->id = $id;
		if (!$this->EventFee->exists()) {
			throw new NotFoundException(__('Invalid event fee'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EventFee->delete()) {
			$this->Session->setFlash(__('Event fee deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event fee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function add_fee($event_id = null) {
		if ($this->request->is('post')) {
			$this->EventFee->create();
			if ($this->EventFee->save($this->request->data)) {
				$this->Session->setFlash(__('The event fee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event fee could not be saved. Please, try again.'));
			}
		}
		
		if ($event_id) {
			$event = $this->EventFee->Event->find(
				'first',
				array(
					'conditions' => array(
						'Event.id' => $event_id
					)
				)
			);
		} else {
			$events = $this->EventFee->Event->find(
				'list',
				array(
					'conditions' => array(
						'Event.date >=' => date('Y-m-d')
					)
				)
			);
			$this->set('events',$events);
			$event = null;
		}
		$membershipLevels = $this->EventFee->MembershipLevel->find('list');
		$this->set('event',$event);

		$this->set(compact('membershipLevels'));
	}
}
