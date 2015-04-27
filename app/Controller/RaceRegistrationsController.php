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
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
//		$this->RaceRegistration->recursive = 0;
//		$this->set('raceRegistrations', $this->paginate());
		
		$raceRegistrations = $this->RaceRegistration->find('all');
		$this->set(compact('raceRegistrations'));
	}



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
		$childRaces = $this->RaceRegistration->ChildRace->find('list');
		$genders = $this->RaceRegistration->Gender->find('list');
		$ageGroups = $this->RaceRegistration->AgeGroup->find('list');
		$qualifyingSwims = $this->RaceRegistration->QualifyingSwim->find('list');
		$qualifyingRaces = $this->RaceRegistration->QualifyingRace->find('list');
		$results = $this->RaceRegistration->Result->find('list');
		$shirtSizes = $this->RaceRegistration->ShirtSize->find('list');
		$this->set(compact('users', 'races', 'genders', 'ageGroups', 'qualifyingSwims', 'qualifyingRaces', 'results', 'shirtSizes','childRaces'));
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
				'contain' => array(
					'CurrentMemberRaceFee',
					'CurrentNonMemberRaceFee',
					'Distance',						
					'ChildRace' => array(
						'fields' => array(
							'ChildRace.id','ChildRace.title','ChildRace.experience_id','ChildRace.date'),
						'Distance' => array(
							'fields' => array('Distance.name','Distance.plural','Distance.abbreviation'),
						),
						'CurrentMemberRaceFee' => array(
							'fields' => array('CurrentMemberRaceFee.price')
						),
						'CurrentNonMemberRaceFee' => array(
							'fields' => array('CurrentNonMemberRaceFee.price')
						),						
						'order' => 'ChildRace.id ASC'
					)
				),
				'fields' => array('Race.id', 'Race.title',' Race.experience_id', 'Race.date', 'Race.exclusive', 'Race.url_title', 'Race.max_swimmers', 'Race.minimum_age') 
			)
		);
		
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
				'year' => substr($race['Race']['date'],0,4),
				'url_title' => $race['Race']['url_title'])
			);
		}
		
       
        $totalReg = $this->RaceRegistration->find(
            'count',
            array(
                'conditions' => array(
                    'RaceRegistration.race_id' => $race['Race']['id']
                )
            )
        );
        
        if ($totalReg >= $race['Race']['max_swimmers']) {
    		$this->Session->setFlash('Registration for this race is full.');
			$this->redirect(
			array(
				'controller' => 'race_registrations',
				'action' => 'view',
				'year' => substr($race['Race']['date'],0,4),
				'url_title' => $race['Race']['url_title'])
			);           
            
        }
        

		foreach ($race['ChildRace'] as $child) {
			$childRaces[$child['id']] = $child['title'];
			if ($this->Session->read('Membership.membership_level')) {
				if (count($child['CurrentMemberRaceFee']) > 0) {
					$childRaces[$child['id']] .= ' ($' . $child['CurrentMemberRaceFee']['price'] . ')';
				}
			} else {
				if (count($child['CurrentNonMemberRaceFee']) > 0) {
					$childRaces[$child['id']] .= ' ($' . $child['CurrentNonMemberRaceFee']['price'] . ')';
				}
			}
		}
		
		if ($this->request->is('post')) {
			
			$this->RaceRegistration->set($this->request->data);

			$this->request->data['User']['dob'] = $this->request->data['User']['dob']['year'] . '-' . $this->request->data['User']['dob']['month'] . '-' . $this->request->data['User']['dob']['day'];
			$birthDate = new DateTime($this->request->data['User']['dob']);
			$raceDate = new DateTime($race['Race']['date']);
			$interval = $birthDate->diff($raceDate);
			$this->request->data['RaceRegistration']['age'] = $interval->y;

			$this->request->data['User']['id'] = $this->Auth->user('id');
  			$this->RaceRegistration->User->save($this->request->data);
			
			$this->Session->write('Auth.User.gender_id',$this->request->data['User']['gender_id']);
			$this->Session->write('Auth.User.shirt_size_id',$this->request->data['User']['shirt_size_id']);
			$this->Session->write('Auth.User.medical',$this->request->data['User']['medical']);
			$this->Session->write('Auth.User.dob',$this->request->data['User']['dob']);

			$this->request->data['Address']['user_id'] = $this->Auth->user('id');
 			
			if ($this->request->data['Address']['id']) {
			 	$this->RaceRegistration->User->Address->save($this->request->data);
			} else {
			 	$this->RaceRegistration->User->Address->create();
				$this->RaceRegistration->User->Address->save($this->request->data);			
			}

			$this->request->data['EmergencyContact']['user_id'] = $this->Auth->user('id');

			if ($this->request->data['EmergencyContact']['id']) {
				$this->RaceRegistration->User->EmergencyContact->save($this->request->data);				
			} else {
				$this->RaceRegistration->User->EmergencyContact->create();
				$this->RaceRegistration->User->EmergencyContact->save($this->request->data);				
			}

			if ($this->userMembershipLevel == 0) {
				$validationArray = array(
					'fieldList' => array(
						'waiver',
						'age',
						'join'
					)
				);
			} else {
				$validationArray = array(
					'fieldList' => array(
						'waiver',
						'age'
					)
				);				
			}

			if ($this->RaceRegistration->validates($validationArray)) {
/*				$race = $this->RaceRegistration->Race->find(
					'first',
					array(
						'conditions' => array(
							'Race.id' => $race_id
						),
						'fields' => array('Race.id','Race.title','Race.experience_id','Race.date') 
					)
				); */
				
				if (isset($this->request->data['RaceRegistration']['child_race_id'])) {
					$childRace = $this->RaceRegistration->Race->find(
						'first',
						array(
							'conditions' => array(
								'Race.id' => $this->request->data['RaceRegistration']['child_race_id']
							),
							'fields' => array('Race.id','Race.title','Race.experience_id','Race.date'),
							'contain' => array(
								'CurrentMemberRaceFee',
								'CurrentNonMemberRaceFee'				
							) 
						)
					);
					$this->set('childRace',$childRace);
				}

				if ($this->Session->read('Membership.membership_level') || $this->request->data['RaceRegistration']['join'] == 1) {
					if ((isset($this->request->data['RaceRegistration']['child_race_id'])) && ($childRace['CurrentMemberRaceFee']['price'])) {
						$this->request->data['RaceRegistration']['payment'] = $childRace['CurrentMemberRaceFee']['price'];
					} else {
						$this->request->data['RaceRegistration']['payment'] = $race['CurrentMemberRaceFee']['price'];
					}
				} else {
					if ((isset($this->request->data['RaceRegistration']['child_race_id'])) && ($childRace['CurrentNonMemberRaceFee']['price'])) {
						$this->request->data['RaceRegistration']['payment'] = $childRace['CurrentNonMemberRaceFee']['price'];
					} else {
						$this->request->data['RaceRegistration']['payment'] = $race['CurrentNonMemberRaceFee']['price'];
					}					
				}

				if ($this->request->data['Donation']['amount']) {
					$this->request->data['Donation']['amount'] = number_format($this->request->data['Donation']['amount'], 2);
				} 

				$this->request->data['RaceRegistration']['total_payment'] = number_format($this->request->data['RaceRegistration']['payment'] + $this->request->data['Donation']['amount'], 2);
				
				if ($this->request->data['RaceRegistration']['join'] == 1) {
					$this->request->data['RaceRegistration']['total_payment'] += $this->request->data['MembershipFee']['price'];
				}

				$genders = $this->RaceRegistration->Gender->find('list');
				$ageGroups = $this->RaceRegistration->AgeGroup->find('list');
				$this->set(compact('race','genders','ageGroups'));

				$this->render('checkout');
			}	
		}

		if (AuthComponent::user('dob') == "0000-00-00") {
			$this->request->data['RaceRegistration']['age'] = "";
		} else {
			$birthDate = new DateTime(AuthComponent::user('dob'));
			$raceDate = new DateTime($race['Race']['date']);
			$interval = $birthDate->diff($raceDate);
			$this->request->data['RaceRegistration']['age'] = $interval->y;
		}

		$address = $this->RaceRegistration->User->Address->find(
			'first',
			array(
				'conditions' => array(
					'Address.user_id' => $this->Auth->user('id')
				),
				'recursive' => -1
			)
		);

		if (preg_match('/[0-9]{10}/',$address['Address']['phone'])) {
			$address['Address']['phone'] = preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2-$3',$address['Address']['phone']);
		}
		
				
		$emergencyContact = $this->RaceRegistration->User->EmergencyContact->find(
			'first',
			array(
				'conditions' => array(
					'EmergencyContact.user_id' => $this->Auth->user('id')
				),
				'order' => array('id'),
				'recursive' => -1
			)
		);


		if (preg_match('/[0-9]{10}/',$emergencyContact['EmergencyContact']['phone'])) {
			$emergencyContact['EmergencyContact']['phone'] = preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2-$3',$emergencyContact['EmergencyContact']['phone']);
		}
				
		if (count($address)) {
			$this->request->data['Address'] = $address['Address'];
		}

		if (count($emergencyContact) > 0) {
			$this->request->data['EmergencyContact'] = $emergencyContact['EmergencyContact'];
		}
		$this->request->data['User']['dob'] = $this->Auth->user('dob');
		$this->request->data['User']['gender_id'] = $this->Auth->user('gender_id');
		$this->request->data['User']['medical'] = $this->Auth->user('medical');
		if ($this->request->data['User']['medical'] == "missing") {
			$this->request->data['User']['medical'] == "";
		}
		$this->request->data['User']['shirt_size_id'] = $this->Auth->user('shirt_size_id');
		
	
		$this->loadModel('MembershipFee');
		$membershipFee = $this->MembershipFee->find(
			'first',
			array(
				'conditions' =>array(
					'MembershipFee.start_date <= CURDATE()',
					'MembershipFee.end_date >= CURDATE()'
				),
				'order' => array('MembershipFee.priority'),
				'recursive' => -1
			)
		);
		
		$this->request->data['MembershipFee']['price'] = $membershipFee['MembershipFee']['price'];
		
		$genders = $this->RaceRegistration->Gender->find('list');
		$shirtSizes = $this->RaceRegistration->ShirtSize->find('list');
		$this->set(compact('race', 'genders', 'childRaces', 'shirtSizes', 'membershipFee'));
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

		$this->loadModel('MembershipFee');
		$membershipFee = $this->MembershipFee->find(
			'first',
			array(
				'conditions' =>array(
					'MembershipFee.start_date <= CURDATE()',
					'MembershipFee.end_date >= CURDATE()'
				),
				'contain' => array(
					'MembershipLevel'
				),
				'order' => array('MembershipFee.priority'),
				'recursive' => -1
			)
		);
		
		$ageGroups = $this->RaceRegistration->AgeGroup->find(
			'first',
			array(
				'conditions' => array(
					'AgeGroup.gender_id' => $this->Auth->user('gender_id'),
					'AgeGroup.minimum_age <=' => $this->request->data['RaceRegistration']['age'],
					'AgeGroup.maximum_age >=' => $this->request->data['RaceRegistration']['age']
				)
			)
		);

		if ($this->request->is('post')) {
			
			$stripe_description = $race['Race']['title'] . ' - ' . substr($race['Race']['date'],0,4)  . ' Registration - ' . $this->Auth->user('first_name') . ' ' . $this->Auth->user('last_name');
			
			if ($this->request->data['RaceRegistration']['join'] == 1) {
				$stripe_description .= " | Membership Fee";
			}
			
			if (($this->request->data['Donation']['amount']) > 0) {
				$stripe_description .= " | Donation: $" . $this->request->data['Donation']['amount'];
			}

			$this->request->data['RaceRegistration']['first_name'] = $this->Auth->user('first_name');
			$this->request->data['RaceRegistration']['last_name'] = $this->Auth->user('last_name');
			$this->request->data['RaceRegistration']['gender_id'] = $this->Auth->user('gender_id');
			$this->request->data['RaceRegistration']['age_group_id'] = $ageGroups['AgeGroup']['id'];
			$this->request->data['RaceRegistration']['date'] = $race['Race']['date'];
			
			if (!$this->request->data['RaceRegistration']['child_race_id']) {
				$this->request->data['RaceRegistration']['child_race_id'] = $this->request->data['RaceRegistration']['race_id'];
			}

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

/*			$hasEmergencyContact = $this->RaceRegistration->User->EmergencyContact->find(
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
*/			
			if ($qualified) {
				$this->request->data['RaceRegistration']['approved'] = 1;
			}

			$customerData = array(
				'stripeToken'  => $this->request->data['stripeToken'],
				'email' => $this->Auth->user('email')
			);

			$customer = $this->Stripe->customerCreate($customerData);

			$stripeData = array(
			    'amount' => $this->request->data['RaceRegistration']['total_payment'],
			    'stripeCustomer' => $customer['stripe_id'],
				'description' => $stripe_description
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
					// $this->updateRaceTotal($this->request->data['RaceRegistration']['race_id']);
					
//					if (isset($this->request->data['RaceRegistration']['parent_race_id'])) {
//						$this->updateRaceTotal($this->request->data['RaceRegistration']['parent_race_id']);
//					}

					if ($qualified) {
						$this->Session->setFlash('Your registration has been approved.');
						$this->send_registration_approved_email($emailvars);
					} else {
						$this->Session->setFlash(__('Your registration has been submitted, but is not yet complete.'));
						$this->send_registration_received_email($emailvars,$qualified);
					}

					if ($this->request->data['RaceRegistration']['join'] > 0) {
						$this->loadModel('Membership');
						$this->Membership->create();
						
						$this->request->data['Membership']['membership_level_id'] = $membershipFee['MembershipFee']['membership_level_id']; 
						$this->request->data['Membership']['user_id'] = $this->Auth->user('id');
						$this->request->data['Membership']['start_date'] = date('Y-m-d');
						$this->request->data['Membership']['end_date'] = $membershipFee['MembershipFee']['year'] . '-12-31';
						$this->request->data['Membership']['waiver'] = 1;

						if ($this->Membership->save($this->request->data)) {
							$this->Session->setFlash('Your registration and membership have been approved.');
							$this->Session->write('Membership.membership_level',$membershipFee['MembershipLevel']['id']);
							$user['name'] = $this->Auth->user('name');
							$user['email'] = $this->Auth->user('email');

							$this->send_membership_email($user,$membershipFee);
						}
						
					}
					
					if ($this->request->data['Donation']['amount'] > 0) {
						$this->loadModel('Donation');
						$this->Donation->create();
						
						$this->request->data['Donation']['first_name'] = $this->Auth->user('first_name');
						$this->request->data['Donation']['last_name'] = $this->Auth->user('last_name');
						$this->request->data['Donation']['user_id'] = $this->Auth->user('id');
						$this->request->data['Donation']['email'] = $this->Auth->user('email');
						$this->request->data['Donation']['date'] = date('Y-m-d');;
			
						$emailvars['User']['name'] = $this->request->data['Donation']['first_name'] . ' ' . $this->request->data['Donation']['last_name'];
						$emailvars['User']['email'] = $this->request->data['Donation']['email'];
						$emailvars['Donation']['amount'] = $this->request->data['Donation']['amount'];

						if ($this->Donation->save($this->request->data)) {
							$this->send_donation_email($emailvars);
						}						
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
					$this->Session->setFlash(__('Your registration was not saved. Please, try again.'));
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
	
	private function send_registration_received_email($emailvars,$qualified) {
		$Email = new CakeEmail('default');
		$Email->to($emailvars['User']['email']);
		$Email->subject('Thank you for registering for ' . $emailvars['Race']['title']);
		$Email->viewVars(
			array(
				'email' => $emailvars,
				'qualified' => $qualified
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
	        	'conditions' => array(
    	    		'Race.url_title' => $url_title,
    	    		'Race.date LIKE' => $year . '%'
	    	    ),
	    	    'contain' => array(
	    	    	'RaceRegistration' => array(
	    	    		'fields' => array(
		    	    		'RaceRegistration.user_id',
		    	    		'RaceRegistration.first_name',
		    	    		'RaceRegistration.last_name',
		    	    		'RaceRegistration.age',
		    	    		'RaceRegistration.child_race_id',
		    	    		'RaceRegistration.approved',
		    	    		'RaceRegistration.race_number'
						),
			    	    'Gender' => array(
			    	    	'fields' => array('Gender.title')
						),
						'AgeGroup' => array(
							'fields' => array('AgeGroup.title')
						),
						'order' => array('RaceRegistration.last_name', 'RaceRegistration.first_name')	
						
					),
	    	    	'ChildRace' => array(
		    	    	'RaceRegistration' => array(
							'User',
							'order' => array('RaceRegistration.last_name', 'RaceRegistration.first_name')	
						)
		    	    ),
		    	    'Series'
				)
			)
		);

		if (!$race) {
			$this->redirect(
				array(
					'controller' => 'races',
					'action' => 'view'
				)
			);
		}

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

	public function swimmer_list($race_id) {

		$data = $this->RaceRegistration->Race->find(
			'first',
			array(
	        	'conditions' => array(
    	    		'Race.id' => $race_id
	    	    ),
	    	    'contain' => array(
	    	    	'RaceRegistration' => array(
	    	    		'fields' => array(
	    	    			'RaceRegistration.user_id',
	    	    			'RaceRegistration.first_name',
	    	    			'RaceRegistration.last_name',
	    	    			'RaceRegistration.age',
	    	    			'RaceRegistration.child_race_id',
	    	    			'RaceRegistration.approved',
	    	    			'RaceRegistration.race_number',
	    	    			'RaceRegistration.wetsuit'
	    	    		),
			    	    'Gender' => array(
			    	    	'fields' => array('Gender.title')
						),
						'AgeGroup' => array(
							'fields' => array('AgeGroup.title')
						),
						'User' => array(
							'Address',
							'EmergencyContact',
						),
						'ChildRace' => array(
							'fields' => array('ChildRace.title')
						),
						'order' => array('RaceRegistration.last_name', 'RaceRegistration.first_name')
					),
				)
			)
		);

 		$this->response->download($data['Race']['url_title'] . '_' . substr($data['Race']['date'],0,4) . '.csv');
		$this->set(compact('data'));
 		$this->layout = 'ajax';
 		return;
 	}

	public function assign_cap_numbers($race_id) {
		
		$race = $this->RaceRegistration->Race->find(
			'first',
			array(
	        	'conditions' => array(
    	    		'Race.id' => $race_id
	    	    ),
	    	    'fields' => array(
	    	    	'Race.id',
	    	    	'Race.date',
	    	    	'Race.url_title'
				),
	    	    'contain' => array(
	    	    	'ChildRace' => array(
	    	    		'fields' => array(
							'ChildRace.id',
							'ChildRace.title'
						),
						'order' => array(
							'ChildRace.menu_rank'
						),
		    	    	'ChildRaceRegistration' => array(
		    	    		'fields' => array(
		    	    			'ChildRaceRegistration.id',
		    	    			'ChildRaceRegistration.waiver'		    	    			
							),
							'order' => array(
								'ChildRaceRegistration.child_race_id',
								'ChildRaceRegistration.last_name',
								'ChildRaceRegistration.first_name',
							)
						)
					),
	    	    	'RaceRegistration' => array(
	    	    		'fields' => array(
	    	    			'RaceRegistration.id',
		    	    		'RaceRegistration.waiver'
						),
						'order' => array(
							'RaceRegistration.child_race_id',
							'RaceRegistration.last_name',
							'RaceRegistration.first_name'
						)
					)
				)
			)
		);

		$j = 1;		
		if (count($race['ChildRace']) > 0) {

			foreach ($race['ChildRace'] as $childRace) {
				foreach ($childRace['ChildRaceRegistration'] as $childRaceRegistration) {
					$childRaceRegistration['race_number'] = $j;
					$this->RaceRegistration->save($childRaceRegistration);
					$j++;
				}
				$j = (ceil($j / 100) * 100) + 1;
			}

		} else {
			foreach ($race['RaceRegistration'] as $raceRegistration) {
				$raceRegistration['race_number'] = $j;
				$this->RaceRegistration->save($raceRegistration);
				$j++;
			}

  		}

		$this->set(compact('race'));

		$this->Session->setFlash('Cap numbers have been added');
		$this->redirect(
			array(
				'action' => 'view',
				'year' => substr($race['Race']['date'],0,4),
				'url_title' => $race['Race']['url_title']
			)
		);
	}
}
