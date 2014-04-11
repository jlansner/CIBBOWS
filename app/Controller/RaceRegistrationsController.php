<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * RaceRegistrations Controller
 *
 * @property RaceRegistration $RaceRegistration
 */
class RaceRegistrationsController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
		$this->forceSecure();
//		$this->Security->validatePost = false;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RaceRegistration->recursive = 0;
		$this->set('raceRegistrations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*
 * Replace by funciton at end of file 
  	public function view($id = null) {
		if (!$this->RaceRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid race registration'));
		}
		$options = array('conditions' => array('RaceRegistration.' . $this->RaceRegistration->primaryKey => $id));
		$this->set('raceRegistration', $this->RaceRegistration->find('first', $options));
	}
*/
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RaceRegistration->create();
			if ($this->RaceRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The race registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race registration could not be saved. Please, try again.'));
			}
		}
		$users = $this->RaceRegistration->User->find('list');
		$races = $this->RaceRegistration->Race->find('list');
		$genders = $this->RaceRegistration->Gender->find('list');
		$ageGroups = $this->RaceRegistration->AgeGroup->find('list');
		$qualifyingSwims = $this->RaceRegistration->QualifyingSwim->find('list');
		$qualifyingRaces = $this->RaceRegistration->QualifyingRace->find('list');
		$results = $this->RaceRegistration->Result->find('list');
		$shirtSizes = $this->RaceRegistration->ShirtSize->find('list');
		$this->set(compact('users', 'races', 'genders', 'ageGroups', 'qualifyingSwims', 'qualifyingRaces', 'results', 'shirtSizes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RaceRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid race registration'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RaceRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The race registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race registration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RaceRegistration.' . $this->RaceRegistration->primaryKey => $id));
			$this->request->data = $this->RaceRegistration->find('first', $options);
		}
		$users = $this->RaceRegistration->User->find('list');
		$races = $this->RaceRegistration->Race->find('list');
		$genders = $this->RaceRegistration->Gender->find('list');
		$ageGroups = $this->RaceRegistration->AgeGroup->find('list');
		$qualifyingSwims = $this->RaceRegistration->QualifyingSwim->find('list');
		$qualifyingRaces = $this->RaceRegistration->QualifyingRace->find('list');
		$results = $this->RaceRegistration->Result->find('list');
		$shirtSizes = $this->RaceRegistration->ShirtSize->find('list');
		$this->set(compact('users', 'races', 'genders', 'ageGroups', 'qualifyingSwims', 'qualifyingRaces', 'results', 'shirtSizes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RaceRegistration->id = $id;
		if (!$this->RaceRegistration->exists()) {
			throw new NotFoundException(__('Invalid race registration'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RaceRegistration->delete()) {
			$this->Session->setFlash(__('Race registration deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Race registration was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function register($race_id) {
		$race = $this->RaceRegistration->Race->find(
			'first',
			array(
				'conditions' => array(
					'Race.id' => $race_id
				),
				'fields' => array('Race.id','Race.title','Race.experience_id','Race.date','Race.exclusive') 
			)
		);

		$reg = $this->RaceRegistration->find(
			'count',
			array(
				'conditions' => array(
					'RaceRegistration.race_id' => $race_id,
					'RaceRegistration.user_id' => $this->Auth->user('id')
				),
				'recursive' => -1
			)
		);
		
		if ($reg) {

			$this->Session->setFlash('You are already registered for this race.');
			$this->redirect(
			array(
				'controller' => 'race_registrations',
				'action' => 'view',
				substr($race['Race']['date'],0,4),
				$race['Race']['url_title'])
			);
		}

		if ($this->request->is('post')) {

			if (!isset($this->request->data['RaceRegistration']['age'])) {
				$dob = $this->request->data['User']['dob']['year'] . '-' . $this->request->data['User']['dob']['month'] . '-' . $this->request->data['User']['dob']['day'];
				$birthDate = new DateTime($dob);
				$raceDate = new DateTime($race['Race']['date']);
				$interval = $birthDate->diff($raceDate);
				$this->request->data['RaceRegistration']['age'] = $interval->y;	
				$this->Session->write('Auth.User.dob', $dob);
			}

			if (!isset($this->request->data['RaceRegistration']['gender_id'])) {
				$this->request->data['RaceRegistration']['gender_id'] = $this->request->data['User']['gender_id'];
				$this->Session->write('Auth.User.dob', $this->request->data['User']['gender_id']);
			}

			if (isset($this->request->data['User'])) {
				$this->request->data['User']['id'] = $this->Auth->user('id');
				$this->RaceRegistration->User->save($this->request->data);
			}

			$this->RaceRegistration->set($this->request->data);
			if ($this->RaceRegistration->validates(array('fieldList' => array('waiver')))) {

				$race = $this->RaceRegistration->Race->find(
					'first',
					array(
						'conditions' => array(
							'Race.id' => $race_id
						),
						'fields' => array('Race.id','Race.title','Race.experience_id','Race.date') 
					)
				);
				
				if (isset($this->request->data['RaceRegistration']['child_race_id'])) {
					$childRace = $this->RaceRegistration->Race->find(
						'first',
						array(
							'conditions' => array(
								'Race.id' => $this->request->data['RaceRegistration']['child_race_id']
							),
							'fields' => array('Race.id','Race.title','Race.experience_id','Race.date') 
						)
					);
					$this->set('childRace',$childRace);
				}
		
				$genders = $this->RaceRegistration->Gender->find('list');
				$ageGroups = $this->RaceRegistration->AgeGroup->find('list');
				$this->set(compact('race','genders','ageGroups'));

				$this->render('checkout');
			}	
		}
		
		$currentFee = false;
		if (count($race['NonMemberRaceFee']) > 0) {
			foreach ($race['NonMemberRaceFee'] as $racefee) {
				if (($racefee['start_date'] <= date('Y-m-d')) && ($racefee['end_date'] >= date('Y-m-d'))) {
					$currentFee = $racefee;
					break;
				}
			}
		}	
			
		$currentMemFee = false;
		if (count($race['MemberRaceFee']) > 0) {
			foreach ($race['MemberRaceFee'] as $racefee) {
				if (($racefee['start_date'] <= date('Y-m-d')) && ($racefee['end_date'] >= date('Y-m-d'))) {
					$currentMemFee = $racefee;
					break;
				}
			}
	 	}

		$childRaces = $this->RaceRegistration->Race->find(
			'list',
			array(
				'conditions' => array(
					'parent_id' => $race_id
				)
			)
		);
		
		$genders = $this->RaceRegistration->Gender->find('list');
//		$ageGroups = $this->RaceRegistration->AgeGroup->find('list');
//		$qualifyingSwims = $this->RaceRegistration->QualifyingSwim->find('list');
//		$qualifyingRaces = $this->RaceRegistration->QualifyingRace->find('list');
//		$results = $this->RaceRegistration->Result->find('list');
		$shirtSizes = $this->RaceRegistration->ShirtSize->find('list');
		$this->set(compact('race','genders','currentFee','currentMemFee','childRaces'));
	}

	public function checkout() {
		$race = $this->RaceRegistration->Race->find(
			'first',
			array(
				'conditions' => array(
					'Race.id' => $this->request->data['RaceRegistration']['race_id']
				),
				'fields' => array('Race.id','Race.url_title','Race.title','Race.experience_id','Race.date'),
				'contain' => array(
					'Experience' => array(
						'fields' => array('Experience.meters','Experience.time')
					)
				)
			)
		);

		if ($this->request->is('post')) {
			$this->request->data['RaceRegistration']['date'] = $race['Race']['date'];
			
			if ($race['Race']['experience_id']) {
				$qualified = false;
	
				$conditions = array(
					'user_id' => $this->request->data['RaceRegistration']['user_id'],
					'meters >=' => $race['Experience']['meters']
				);
	
				if (($race['Experience']['time']) && ($race['Experience']['time'] > 0)) {
					$conditions['time <='] = $race['Experience']['time'];
				} 
	
				$result = $this->RaceRegistration->Result->find(
					'first',
					array(
						'conditions' => $conditions, 
						'fields' => array('Result.id'),
						'recursive' => -1
					)
				);
				
				if ($result) {
					$this->request->data['RaceRegistration']['result_id'] = $result['Result']['id'];
					$qualified = true;
				} else {
					$qrace = $this->RaceRegistration->QualifyingRace->find(
						'first',
						array(
							'conditions' => $conditions,
							'fields' => array('QualifyingRace.id'),
							'recursive' => -1
						)
					);
					
					if ($qrace) {
						$this->request->data['RaceRegistration']['qualifying_race_id'] = $qrace['QualifyingRace']['id'];
						$qualified = true;
					} 
	/* Restore this section when Qualifing Swim section added
	  				else {
						$qswim = $this->RaceRegistration->QualifyingSwim->find(
							'first',
							array(
								'conditions' => array(
									'QualifyingSwim.user_id' => $this->request->data['RaceRegistration']['user_id'],
									'meters >=' => $race['Experience']['meters']
								)
							)
						);
						$this->request->data['RaceRegistration']['qualifying_swim_id'] = $qrace['QualifyingRace']['id'];
						$qualified = true;
					} */
				}
			} else {
				$qualified = true;
				$this->request->data['RaceRegistration']['no_qualifier'] = 1;
			}

			$hasEmergencyContact = $this->RaceRegistration->User->EmergencyContact->find(
				'count',
				array(
					'conditions' => array(
						'EmergencyContact.user_id' => $this->Auth->user('id')
					)
				)
			);
			
			if ($hasEmergencyContact) {
				$this->request->data['RaceRegistration']['has_emergency_contact'] = 1;
			}
			
			$hasAddress = $this->RaceRegistration->User->Address->find(
				'count',
				array(
					'conditions' => array(
						'Address.user_id' => $this->Auth->user('id')
					)
				)
			);

			if ($hasAddress) {
				$this->request->data['RaceRegistration']['has_address'] = 1;
			}
			
			if (($qualified) && ($hasEmergencyContact) && ($hasAddress)) {
				$this->request->data['RaceRegistration']['approved'] = 1;
			}

			$customerData = array(
				'stripeToken'  => $this->request->data['stripeToken'],
				'email' => $this->Auth->user('email')
			);

			$customer = $this->Stripe->customerCreate($customerData);

			$stripeData = array(
			    'amount' => $this->request->data['RaceRegistration']['payment'],
			    'stripeCustomer' => $customer['stripe_id'],
				'description' => $race['Race']['title'] . ' - ' . substr($race['Race']['date'],0,4)  . ' Registration - ' . $this->Auth->user('name')
			);

			$emailvars['User']['name'] = $this->Auth->user('name');
			$emailvars['User']['email'] = $this->Auth->user('email');
			$emailvars['Race']['title'] = $race['Race']['title'];
			$emailvars['Race']['date'] = $race['Race']['date'];
			$emailvars['Registration']['payment'] = $this->request->data['RaceRegistration']['payment'];

			$result = $this->Stripe->charge($stripeData);
			if (is_array($result)) {
				$this->RaceRegistration->create();
				if ($this->RaceRegistration->save($this->request->data)) {
					$this->updateRaceTotal($this->request->data['RaceRegistration']['race_id']);
					
					if (isset($this->request->data['RaceRegistration']['parent_race_id'])) {
						$this->updateRaceTotal($this->request->data['RaceRegistration']['parent_race_id']);
					}
					
					if (($qualified) && ($hasEmergencyContact)) {
						$this->Session->setFlash('Your registration has been approved.');
						$this->send_registration_approved_email($emailvars);
					} else {
						$this->Session->setFlash(__('Your registration has been submitted, but is not yet complete.'));
						$this->send_registration_received_email($emailvars,$qualified,$hasEmergencyContact,$hasAddress);
					}
					$this->redirect(
						array(
							'controller' => 'race_registrations',
							'action' => 'view',
							substr($race['Race']['date'],0,4),
							$race['Race']['url_title']
						)
					);
				} else {
					$this->Session->setFlash(__('Your registration could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('Your registration could not be saved. Please, try again.'));
				$this->set('result',$result); //error message from Stripe
			}
		}

	}

	private function send_registration_approved_email($emailvars) {
		$Email = new CakeEmail('default');
		$Email->to($emailvars['User']['email']);
		$Email->subject('Thank you for registering for ' . $emailvars['Race']['title']);
		$Email->viewVars(
			array(
				'email' => $emailvars
			)
		);
		$Email->template('race_registration_approved', 'default');
		$Email->emailFormat('both');
		$Email->send();		
	}
	
	private function send_registration_received_email($emailvars,$qualified,$hasEmergencyContact,$hasAddress) {
		$Email = new CakeEmail('default');
		$Email->to($emailvars['User']['email']);
		$Email->subject('Thank you for registering for ' . $emailvars['Race']['title']);
		$Email->viewVars(
			array(
				'email' => $emailvars,
				'qualified' => $qualified,
				'hasEmergencyContact' => $hasEmergencyContact,
				'hasAddress' => $hasAddress
			)
		);
		$Email->template('race_registration_received', 'default');
		$Email->emailFormat('both');
		$Email->send();				
	}


	public function view($year = null, $url_title = null) {
        if (!$url_title) {
            throw new NotFoundException(__('Invalid race'));
        }

		$race = $this->RaceRegistration->Race->find(
			'first',
			array(
//				'fields' => array('Race.id','Race.title','Race.date'),
	        	'conditions' => array(
    	    		'Race.url_title' => $url_title,
    	    		'Race.date LIKE' => $year . '%'
	    	    ),
	    	    'contain' => array(
	    	    	'RaceRegistration' => array(
			    	    'Gender',
						'AgeGroup'
					),
	    	    	'ChildRace' => array(
		    	    	'RaceRegistration' => array(
							'User'
						)
		    	    ),
		    	    'User',
		    	    'Series'
				)
			)
		);

		if (!$race) {
//			throw new NotFoundException(__('Invalid race'));
			$this->redirect('/races/');
		}

/*		$raceRegistrations = $this->RaceRegistration->find(
			'all',
			array(
				'conditions' => array(
					'RaceRegistration.race_id' => $race['Race']['id']
				),
	    	    'order' => array(
					'User.last_name ASC'
				)
			)
		);
*/
        $this->set(compact('race'));
	}

	private function updateRaceTotal($race_id) {
		$race = $this->RaceRegistration->Race->find(
			'first',
			array(
				'conditions' => array(
					'Race.id' => $race_id
				),
				'fields' => array('Race.id','Race.registered_swimmers'),
				'recursive' => -1
			)
		);
		
		$race['Race']['registered_swimmers']++;
		$this->RaceRegistration->Race->save($race);
	}
}
