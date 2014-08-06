<?php
App::uses('AppController', 'Controller');
/**
 * Races Controller
 *
 * @property Race $Race
 */
class RacesController extends AppController {

	public function index() {
		$series = $this->Race->Series->find(
			'all',
			array(
				'conditions' => array(
					'Series.active'
				),
				'order' => array('Series.menu_rank'),
				'recursive' => -1
			)
		);
		
		foreach ($series as $s) {
			$race = $this->Race->find(
				'first',
				array(
					'conditions' => array(
						'Race.series_id' => $s['Series']['id'],
						'Race.parent_id' => null
					),
					'order' => array('Race.date DESC'),
					'fields' => array('Race.date', 'Race.end_date', 'Race.url_title', 'Race.title')
				)
			);	
			
			if ($race) {
				$races[] = $race;
			}		
		}
		$this->set(compact('races', 'series'));
	}
	
	public function admin_index() {

		$races = $this->Race->find(
			'all',
			array(
				'fields' => array('Race.date','Race.end_date','Race.title','Race.url_title'),
				'conditions' => array(
					'Race.parent_id' => NULL
				),
				'order' => 'date DESC',
				'recursive' => 0
			)
		);

		$this->set(compact('races'));
	}

	public function view($year = null, $url_title = null) {			
        if (!$url_title) {
            throw new NotFoundException(__('Invalid race'));
        }

		$race = $this->Race->find(
			'first',
			array(
//				'fields' => array('Race.title', 'Race.series_id', 'Race.date', 'StartLocation.title', 'StartLocation.url_title', 'EndLocation.title', 'EndLocation.url_title', 'CheckInLocation.title', 'CheckInLocation.url_title', 'PostRaceLocation.title', 'PostRaceLocation.url_title'),
	        	'conditions' => array(
    	    		'Race.url_title' => $url_title,
    	    		'Race.date LIKE' => $year . '%'
	    	    ),
	    	    'recursive' => -1,
	    	    'contain' => array(
					'Series' => array(
						'fields' => array('Series.title','Series.url_title')
					),
					'Distance' => array(
						'fields' => array('Distance.name','Distance.plural','Distance.abbreviation')
					),
					'StartLocation' => array(
						'fields' => array('StartLocation.title', 'StartLocation.url_title')
					),
					'EndLocation' => array(
						'fields' => array('EndLocation.title', 'EndLocation.url_title')
					),
					'CheckinLocation' => array(
						'fields' => array('CheckinLocation.title', 'CheckinLocation.url_title')
					),
					'PostraceLocation' => array(
						'fields' => array('PostraceLocation.title', 'PostraceLocation.url_title')
					),
					'Experience',
					'MemberRaceFee',
					'NonMemberRaceFee',
					'ChildRace' => array(
						'Distance' => array(
							'fields' => array('Distance.name','Distance.plural','Distance.abbreviation'),
						),
						'MemberRaceFee',
						'NonMemberRaceFee',
						'CurrentMemberRaceFee',
						'CurrentNonMemberRaceFee',						
						'order' => 'ChildRace.id ASC'
					),
					'CurrentMemberRaceFee',
					'CurrentNonMemberRaceFee'
				)
			)
		);

		if (!$race) {
//			throw new NotFoundException(__('Invalid race'));
			$this->redirect('/races/');
		}

		$regIDs[] = $race['Race']['id'];
		if (count($race['ChildRace'])) {
			foreach ($race['ChildRace'] as $childRace) {
				$regIDs[] = $childRace['id'];
			}
		}
			
		$reg = $this->Race->RaceRegistration->find(
			'count',
			array(
				'conditions' => array(
					'RaceRegistration.race_id' => $regIDs,
					'RaceRegistration.user_id' => $this->Auth->user('id')
				),
				'recursive' => -1
			)
		);

		$volReg = $this->Race->VolunteerRegistration->find(
			'count',
			array(
				'conditions' => array(
					'VolunteerRegistration.race_id' => $regIDs,
					'VolunteerRegistration.user_id' => $this->Auth->user('id')
				),
				'recursive' => -1
			)
		);

//		$this->set('race', $this->paginate());
        $this->set(compact('race','reg','volReg'));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Race->create();
			if ($this->Race->save($this->request->data)) {
				$this->Session->setFlash(__('The race has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race could not be saved. Please, try again.'));
			}
		}

		$users = $this->Race->User->find('list');
		$series = $this->Race->Series->find('list');
		$membershipLevels = $this->Race->MembershipLevel->find('list');
		$distances = $this->Race->Distance->find('list');
		$experiences = $this->Race->Experience->find('list');
		$startLocations = $this->Race->StartLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$endLocations = $this->Race->EndLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$checkinLocations = $this->Race->CheckinLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$postraceLocations = $this->Race->PostraceLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$this->set(compact('users', 'series', 'membershipLevels', 'distances', 'experiences', 'startLocations', 'endLocations', 'checkinLocations', 'postraceLocations'));
	}

	public function add_section($parent_id) {
		if ($this->request->is('post')) {
			$this->Race->create();
			if ($this->Race->save($this->request->data)) {
				$this->Session->setFlash(__('The race has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race could not be saved. Please, try again.'));
			}
		}

		$parent = $this->Race->find(
			'first',
			array(
				'conditions' => array(
					'Race.id' => $parent_id
				) /*,
				'fields' => array(
					'Race.id',
					'Race.title',
					'Race.date',
					'Race.checkin_start_time',
					'Race.checkin_end_time',
					'Race.start_time',
					'Race.end_time'
				) */
			)
		);
		$users = $this->Race->User->find('list');
		$membershipLevels = $this->Race->MembershipLevel->find('list');
		$distances = $this->Race->Distance->find('list');
		$experiences = $this->Race->Experience->find('list');
		$startLocations = $this->Race->StartLocation->find(
			'list',
			array(
				'order' => 'title ASC'
			)
		);
		$endLocations = $this->Race->EndLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$checkinLocations = $this->Race->CheckinLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$postraceLocations = $this->Race->PostraceLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$this->set(compact('parent', 'users', 'membershipLevels', 'distances', 'experiences', 'startLocations', 'endLocations', 'checkinLocations', 'postraceLocations'));
	}



/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Race->exists($id)) {
			throw new NotFoundException(__('Invalid race'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Race->save($this->request->data)) {
				$this->Session->setFlash(__('The race has been saved'));
				$this->redirect(
					array(	
						'admin' => true,
						'action' => 'index'
					)
				);
			} else {
				$this->Session->setFlash(__('The race could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Race.' . $this->Race->primaryKey => $id));
			$this->request->data = $this->Race->find('first', $options);
		}

		$users = $this->Race->User->find('list');
		$series = $this->Race->Series->find('list');
		$membershipLevels = $this->Race->MembershipLevel->find('list');
		$distances = $this->Race->Distance->find('list');
		$experiences = $this->Race->Experience->find('list');
		$startLocations = $this->Race->StartLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$endLocations = $this->Race->EndLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$checkinLocations = $this->Race->CheckinLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$postraceLocations = $this->Race->PostraceLocation->find(
			'list',
			array(
				'order' => 'title'
			)
		);
		$this->set(compact('users', 'series', 'membershipLevels', 'distances', 'experiences', 'startLocations', 'endLocations', 'checkinLocations', 'postraceLocations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Race->id = $id;
		if (!$this->Race->exists()) {
			throw new NotFoundException(__('Invalid race'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Race->delete()) {
			$this->Session->setFlash(__('Race deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Race was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function homepage_calendar() {
		$race = $this->Race->query('(SELECT `title`, `url_title`, `date`, "events" AS `type` FROM `events` WHERE `date` >="' . date('Y-m-d') . '") UNION (SELECT `title`, `url_title`, `date`, "races" AS `type` FROM `races` WHERE `parent_id` IS NULL AND `date` >="' . date('Y-m-d') . '") UNION (SELECT `title`, `url_title`, `date`, "clinics" AS `type` FROM `clinics` WHERE `date` >="' . date('Y-m-d') . '") ORDER BY date ASC LIMIT 5');
		return $race;
	}

}
