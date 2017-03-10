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
	public function view($year = null, $url_title = null) {
        if (!$url_title) {
            throw new NotFoundException(__('Invalid race'));
        }

		$race = $this->VolunteerRegistration->Race->find(
			'first',
			array(
	        	'conditions' => array(
    	    		'Race.url_title' => $url_title,
    	    		'Race.date LIKE' => $year . '%'
	    	    ),
	    	    'contain' => array(
	    	    	'VolunteerRegistration' => array(
	    	    		'fields' => array('VolunteerRegistration.user_id','VolunteerRegistration.first_name','VolunteerRegistration.last_name','VolunteerRegistration.approved','VolunteerRegistration.body','VolunteerRegistration.child_race_id'),
						'order' => array('VolunteerRegistration.last_name', 'VolunteerRegistration.first_name'),
						'User' => array(
							'fields' => array('User.email','User.first_name','User.last_name')
						),
						'ChildRace'
					),
					'Series',
					'ChildRace' => array(
						'fields' => array('ChildRace.id')
					)
				)
			)
		);

		if (!$race) {
			$this->redirect('/races/');
		}

        $this->set(compact('race'));
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
	
	public function register($race_id) {
		$race = $this->VolunteerRegistration->Race->find(
			'first',
			array(
				'conditions' => array(
					'Race.id' => $race_id
				),
				'contain' => array(
					'ChildRace' => array(
						'fields' => array(
							'ChildRace.id','ChildRace.title','ChildRace.date','ChildRace.max_volunteers'
						),
					)
				),
				'fields' => array(
					'Race.id','Race.date','Race.title','Race.url_title'
				)				
			)
		);

		foreach ($race['ChildRace'] as $child) {
			$childRaces[$child['id']] = $child['title'];
		}

		if ($this->request->is('post')) {
			$this->request->data['VolunteerRegistration']['user_id'] = $this->Auth->user('id');
			$this->request->data['VolunteerRegistration']['race_id'] = $race_id;
			$this->request->data['VolunteerRegistration']['first_name'] = $this->Auth->user('first_name');
			$this->request->data['VolunteerRegistration']['last_name'] = $this->Auth->user('last_name');
			
			$this->VolunteerRegistration->User->Address->save($this->request->data);
			$this->VolunteerRegistration->create();
			if ($this->VolunteerRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('Thank you for registering as a volunteer'));
				$this->redirect(
					array(
						'controller' => 'races',
						'action' => 'view',
						'year' => substr($race['Race']['date'],0,4),
						'url_title' => $race['Race']['url_title']
					)
				);
			} else {
				$this->Session->setFlash(__('The volunteer registration could not be saved. Please, try again.'));
			}
		}

		if (strtotime('now') > strtotime($race['Race']['date'])) {
			$this->redirect(
				array(
					'controller' => 'races',
					'action' => 'view',
					'year' => substr($race['Race']['date'],0,4),
					'url_title' => $race['Race']['url_title']
				)
			);	
		}

		$address = $this->VolunteerRegistration->User->Address->find(
			'first',
			array(
				'conditions' => array(
					'Address.user_id' => $this->Auth->user('id')
				),
				'recursive' => -1,
				'fields' => array(
					'Address.id, Address.phone'
				)
			)
		);

		if (preg_match('/[0-9]{10}/',$address['Address']['phone'])) {
			$address['Address']['phone'] = preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2-$3',$address['Address']['phone']);
		}

		$this->request->data['Address'] = $address['Address'];

		$this->set(compact('race','childRaces'));
	}
}
