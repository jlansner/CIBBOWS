<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {

	public function index() {
		$event = $this->Event->find(
			'all',
			array(
				'fields' => array('Event.date','Event.title','Event.url_title'),
	    	    'recursive' => 0
			)
		);
		
		$this->set('events', $this->paginate());
        $this->set('events', $event);


	}

	public function view($year = null, $url_title = null) {
        if (!$url_title) {
            throw new NotFoundException(__('Invalid race'));
        }

		$event = $this->Event->find(
			'first',
			array(
	        	'conditions' => array(
    	    		'Event.url_title' => $url_title,
    	    		'Event.date LIKE' => $year . '%'
	    	    )
			)
		);

		if (!$event) {
//			throw new NotFoundException(__('Invalid race'));
			$this->redirect('/events/');
		}

        $this->set('event', $event);

	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		}
		$membershipLevels = $this->Event->MembershipLevel->find('list');
		$locations = $this->Event->Location->find('list');
		$this->set(compact('membershipLevels','locations'));
	}

	public function edit($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
		$membershipLevels = $this->Event->MembershipLevel->find('list');
		$locations = $this->Event->Location->find('list');
		$this->set(compact('membershipLevels','locations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('Event deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
