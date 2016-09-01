<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * EventRegistrations Controller
 *
 * @property EventRegistration $EventRegistration
 */
class EventRegistrationsController extends AppController {

	public function admin_index() {
		
		$eventRegistrations = $this->EventRegistration->find('all');
		$this->set(compact('eventRegistrations'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventRegistration->create();
			if ($this->EventRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The event registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event registration could not be saved. Please, try again.'));
			}
		}
		$users = $this->EventRegistration->User->find('list');
		$events = $this->EventRegistration->Event->find('list');
		$genders = $this->EventRegistration->Gender->find('list');
		$this->set(compact('users', 'events', 'genders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid event registration'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EventRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The event registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event registration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventRegistration.' . $this->EventRegistration->primaryKey => $id));
			$this->request->data = $this->EventRegistration->find('first', $options);
		}
		$users = $this->EventRegistration->User->find('list');
		$events = $this->EventRegistration->Event->find('list');
		$genders = $this->EventRegistration->Gender->find('list');
		$this->set(compact('users', 'events', 'genders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EventRegistration->id = $id;
		if (!$this->EventRegistration->exists()) {
			throw new NotFoundException(__('Invalid event registration'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EventRegistration->delete()) {
			$this->Session->setFlash(__('Event registration deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event registration was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function register($event_id) {
		$event = $this->EventRegistration->Event->find(
			'first',
			array(
				'conditions' => array(
					'Event.id' => $event_id
				),
				'contain' => array(
					'CurrentMemberEventFee',
					'CurrentNonMemberEventFee'
				),
				'fields' => array('Event.id', 'Event.title', 'Event.date', 'Event.url_title', 'Event.max_attendees', 'Event.minimum_age') 
			)
		);
		
		if (strtotime('now') > strtotime($event['Event']['date'])) {
			$this->redirect(
				array(
					'controller' => 'events',
					'action' => 'view',
					'year' => substr($event['Event']['date'],0,4),
					'url_title' => $event['Event']['url_title']
				)
			);		
		}

		$reg = $this->EventRegistration->find(
			'count',
			array(
				'conditions' => array(
					'EventRegistration.event_id' => $event_id,
					'EventRegistration.user_id' => $this->Auth->user('id')
				),
				'recursive' => -1
			)
		);
		
		if ($reg) {
			$this->Session->setFlash('You are already registered for this event.');
			$this->redirect(
			array(
				'controller' => 'event_registrations',
				'action' => 'view',
				'year' => substr($event['Event']['date'],0,4),
				'url_title' => $event['Event']['url_title'])
			);
		}
		       
        $totalReg = $this->EventRegistration->find(
            'count',
            array(
                'conditions' => array(
                    'EventRegistration.event_id' => $event['Event']['id']
                )
            )
        );
        
        if ($totalReg >= $event['Event']['max_attendees']) {
    		$this->Session->setFlash('Registration for this event is full.');
			$this->redirect(
			array(
				'controller' => 'event_registrations',
				'action' => 'view',
				'year' => substr($event['Event']['date'],0,4),
				'url_title' => $event['Event']['url_title'])
			);     
        }
        		
		if ($this->request->is('post')) {
			
			$this->EventRegistration->set($this->request->data);

			$this->request->data['User']['dob'] = $this->request->data['User']['dob']['year'] . '-' . $this->request->data['User']['dob']['month'] . '-' . $this->request->data['User']['dob']['day'];
			$birthDate = new DateTime($this->request->data['User']['dob']);
			$eventDate = new DateTime($event['Event']['date']);
			$interval = $birthDate->diff($eventDate);
			$this->request->data['EventRegistration']['age'] = $interval->y;

			$this->request->data['User']['id'] = $this->Auth->user('id');
  			$this->EventRegistration->User->save($this->request->data);
			
			$this->Session->write('Auth.User.gender_id',$this->request->data['User']['gender_id']);
			//$this->Session->write('Auth.User.shirt_size_id',$this->request->data['User']['shirt_size_id']);
			//$this->Session->write('Auth.User.medical',$this->request->data['User']['medical']);
			$this->Session->write('Auth.User.dob',$this->request->data['User']['dob']);

			$this->request->data['Address']['user_id'] = $this->Auth->user('id');
 			
			if ($this->request->data['Address']['id']) {
			 	$this->EventRegistration->User->Address->save($this->request->data);
			} else {
			 	$this->EventRegistration->User->Address->create();
				$this->EventRegistration->User->Address->save($this->request->data);			
			}

			if ($this->userMembershipLevel == 0) {
				$validationArray = array(
					'fieldList' => array(
						'age',
						'join'
					)
				);
			} else {
				$validationArray = array(
					'fieldList' => array(
						'age'
					)
				);				
			}

			if ($this->EventRegistration->validates($validationArray)) {
				
				if ($this->Session->read('Membership.membership_level') || $this->request->data['EventRegistration']['join'] == 1) {
					$this->request->data['EventRegistration']['payment'] = $event['CurrentMemberEventFee']['price'];
				} else {
					$this->request->data['EventRegistration']['payment'] = $event['CurrentNonMemberEventFee']['price'];
				}

				if ($this->request->data['Donation']['amount']) {
					$this->request->data['Donation']['amount'] = number_format($this->request->data['Donation']['amount'], 2);
				} 

				$this->request->data['EventRegistration']['total_payment'] = number_format($this->request->data['EventRegistration']['payment'] + $this->request->data['Donation']['amount'], 2);
				
				if ($this->request->data['EventRegistration']['join'] == 1) {
					$this->request->data['EventRegistration']['total_payment'] += $this->request->data['MembershipFee']['price'];
				}

				$genders = $this->EventRegistration->Gender->find('list');
				$this->set(compact('event','genders'));


				if ($this->request->data['EventRegistration']['total_payment'] > 0) {
					$this->render('checkout');
				} else {
					// register
					$emailvars['User']['name'] = $this->Auth->user('name');
					$emailvars['User']['email'] = $this->Auth->user('email');
					$emailvars['Event']['title'] = $event['Event']['title'];
					$emailvars['Event']['date'] = $event['Event']['date'];

					$this->EventRegistration->create();
					if ($this->EventRegistration->save($this->request->data)) {
						$this->Session->setFlash('Thank you for registering.');
						$this->send_registration_approved_email($emailvars);

						$this->redirect(
							array(
								'controller' => 'event_registrations',
								'action' => 'view',
								substr($event['Event']['date'],0,4),
								$event['Event']['url_title']
							)
						);
					} else {
						$this->Session->setFlash('Your registration was not saved. Please try again.');								}
				}
			}	
		}

		if (AuthComponent::user('dob') == "0000-00-00") {
			$this->request->data['EventRegistration']['age'] = "";
		} else {
			$birthDate = new DateTime(AuthComponent::user('dob'));
			$eventDate = new DateTime($event['Event']['date']);
			$interval = $birthDate->diff($eventDate);
			$this->request->data['EventRegistration']['age'] = $interval->y;
		}

		$address = $this->EventRegistration->User->Address->find(
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
						
		if (count($address)) {
			$this->request->data['Address'] = $address['Address'];
		}

/*		if (count($emergencyContact) > 0) {
			$this->request->data['EmergencyContact'] = $emergencyContact['EmergencyContact'];
		} */
		$this->request->data['User']['dob'] = $this->Auth->user('dob');
		$this->request->data['User']['gender_id'] = $this->Auth->user('gender_id');
		
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
		
		$genders = $this->EventRegistration->Gender->find('list');
		$this->set(compact('event', 'genders', 'membershipFee'));
	}

	public function checkout() {
		$event = $this->EventRegistration->Event->find(
			'first',
			array(
				'conditions' => array(
					'Event.id' => $this->request->data['EventRegistration']['event_id']
				),
				'fields' => array('Event.id','Event.url_title','Event.title','Event.date')
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

		if ($this->request->is('post')) {
			
			$stripe_description = $event['Event']['title'] . ' - ' . substr($event['Event']['date'],0,4)  . ' Registration - ' . $this->Auth->user('first_name') . ' ' . $this->Auth->user('last_name');
			
			if ($this->request->data['EventRegistration']['join'] == 1) {
				$stripe_description .= " | Membership Fee";
			}
			
			if (($this->request->data['Donation']['amount']) > 0) {
				$stripe_description .= " | Donation: $" . $this->request->data['Donation']['amount'];
			}

			$this->request->data['EventRegistration']['first_name'] = $this->Auth->user('first_name');
			$this->request->data['EventRegistration']['last_name'] = $this->Auth->user('last_name');
			$this->request->data['EventRegistration']['gender_id'] = $this->Auth->user('gender_id');
			$this->request->data['EventRegistration']['date'] = $event['Event']['date'];
			
			$customerData = array(
				'stripeToken'  => $this->request->data['stripeToken'],
				'email' => $this->Auth->user('email')
			);

			$customer = $this->Stripe->customerCreate($customerData);

			$stripeData = array(
			    'amount' => $this->request->data['EventRegistration']['total_payment'],
			    'stripeCustomer' => $customer['stripe_id'],
				'description' => $stripe_description
			);

			$emailvars['User']['name'] = $this->Auth->user('name');
			$emailvars['User']['email'] = $this->Auth->user('email');
			$emailvars['Event']['title'] = $event['Event']['title'];
			$emailvars['Event']['date'] = $event['Event']['date'];
			$emailvars['Registration']['payment'] = $this->request->data['EventRegistration']['payment'];

			$result = $this->Stripe->charge($stripeData);

			if (is_array($result)) {
				$this->EventRegistration->create();
				if ($this->EventRegistration->save($this->request->data)) {
					$this->Session->setFlash('Your registration has been approved.');
					$this->send_registration_approved_email($emailvars);
				}

				if ($this->request->data['EventRegistration']['join'] > 0) {
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
						'controller' => 'event_registrations',
						'action' => 'view',
						substr($event['Event']['date'],0,4),
						$event['Event']['url_title']
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

	private function send_registration_approved_email($emailvars) {
		$Email = new CakeEmail('default');
		$Email->to($emailvars['User']['email']);
		$Email->subject('Thank you for registering for ' . $emailvars['Event']['title']);
		$Email->viewVars(
			array(
				'email' => $emailvars
			)
		);
		$Email->template('event_registration_approved', 'default');
		$Email->emailFormat('both');
		$Email->send();		
	}

	public function view($year = null, $url_title = null) {
        if (!$url_title) {
            throw new NotFoundException(__('Invalid Event'));
        }

		$event = $this->EventRegistration->Event->find(
			'first',
			array(
	        	'conditions' => array(
    	    		'Event.url_title' => $url_title,
    	    		'Event.date LIKE' => $year . '%'
	    	    ),
	    	    'contain' => array(
	    	    	'EventRegistration' => array(
	    	    		'fields' => array(
		    	    		'EventRegistration.user_id',
		    	    		'EventRegistration.first_name',
		    	    		'EventRegistration.last_name',
		    	    		'EventRegistration.age'
						),
			    	    'Gender' => array(
			    	    	'fields' => array('Gender.title')
						),
						'order' => array('EventRegistration.last_name', 'EventRegistration.first_name')
					)
				)
			)
		);

		if (!$event) {
			$this->redirect(
				array(
					'controller' => 'events',
					'action' => 'view'
				)
			);
		}

        $this->set(compact('event'));
	}

	private function updateEventTotal($event_id) {
		$event = $this->EventRegistration->Event->find(
			'first',
			array(
				'conditions' => array(
					'Event.id' => $event_id
				),
				'fields' => array('Event.id','Event.registered_attendees'),
				'recursive' => -1
			)
		);
		
		$event['Event']['registered_attendees']++;
		$this->EventRegistration->Event->save($event);
	}

	public function registered_attendees_list($event_id) {

		$data = $this->EventRegistration->Event->find(
			'first',
			array(
	        	'conditions' => array(
    	    		'Event.id' => $event_id
	    	    ),
	    	    'contain' => array(
	    	    	'EventRegistration' => array(
	    	    		'fields' => array(
	    	    			'EventRegistration.user_id',
	    	    			'EventRegistration.first_name',
	    	    			'EventRegistration.last_name',
	    	    			'EventRegistration.age'
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
						'order' => array('EventRegistration.last_name', 'EventRegistration.first_name')
					),
				)
			)
		);

 		$this->response->download($data['Event']['url_title'] . '_' . substr($data['Event']['date'],0,4) . '.csv');
		$this->set(compact('data'));
 		$this->layout = 'ajax';
 		return;
 	}
}
