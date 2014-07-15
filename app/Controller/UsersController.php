<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
		$this->forceSecure();
	}

	public function admin_index() {
//		$this->User->recursive = 0;
//		$this->set('users', $this->paginate());

		$users = $this->User->find(
			'all',
			array(
			)
		);
		$this->set(compact('users'));
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->User->find(
			'first',
			array(
				'conditions' => array(
					'User.id' => $id
				),
				'recursive' => 2
			)
		);
		
		if ($user['User']['medical'] == "missing") {
			$user['User']['medical'] == "";
		}

		$this->set(compact('user'));		
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$genders = $this->User->Gender->find('list');
		$shirtSizes = $this->User->ShirtSize->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('genders', 'shirtSizes', 'groups'));
	}

	public function create_account() {
		if ($this->Auth->user('id')) {
			$this->redirect('/');
		}

		if ($this->request->is('post')) {
			$this->request->data['User']['group_id'] = 1;
			$this->request->data['User']['activation_code'] = $this->rand_string(30);
			
			$unsynced_user = $this->User->find(
				'first',
				array(
					'conditions' => array(
						'User.email' => '_____' . $this->request->data['User']['email']
					),
				'fields' => array('id')
				)
			);

			if ($unsynced_user) {
				$this->request->data['User']['id'] = $unsynced_user['User']['id'];
				$this->request->data['User']['synced'] = 1;
			} else {			
				$this->User->create();
			}
			
			if ($this->User->save($this->request->data)) {
				$user['group_id'] = 1;
				$user['email'] = $this->request->data['User']['email'];
				$user['activation_code'] = $this->request->data['User']['activation_code'];
				$user['id'] = $this->User->id;
				$user['first_name'] = $this->request->data['User']['first_name'];
				$user['last_name'] = $this->request->data['User']['last_name'];
				$this->send_confirmation($user);
				$this->Session->setFlash(__('Thank you for registering'));
				$this->Auth->login($user);
				$this->setMembershipLevel();
				$this->redirect(array('action' => 'my_profile'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}

/*		$genders = $this->User->Gender->find('list'); */
		$this->set(compact('user'));
	}

	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->find(
				'first',
				array(
					'conditions' => array(
					'User.id' => $id
					)
				)
			);

			if ($this->request->data['User']['medical'] == "missing") {
				$this->request->data['User']['medical'] == "";
			}

		}
		$genders = $this->User->Gender->find('list');
		$shirtSizes = $this->User->ShirtSize->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('genders', 'shirtSizes', 'groups'));
	}

	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->setMembershipLevel();
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid email or password, try again'));
			}
		}
	}

	public function logout() {
		$this->Session->delete('Membership');
		$this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}
	
	private function send_confirmation($user) {
		$encrypted = $user['activation_code'] . $user['id'];
//		$encrypted = urlencode(base64_encode(Security::cipher($encrypted, Configure::read('Security.cipherSeed'))));
		$Email = new CakeEmail('default');
		$Email->to($user['email']);
//		$Email->cc('jlansner@gmail.com');
		$Email->subject('Confirmation Email');
		$Email->viewVars(array('encrypted' => $encrypted));
		$Email->template('confirmation', 'default');
		$Email->emailFormat('both');
		$Email->send();
	}
	
	public function resend_confirmation($user_id) {
		$user = $this->User->find(
			'first',
			array(
				'conditions' => array(
					'User.id' => $user_id,
				)
			)
		);
		$this->send_confirmation($user['User']);
		$this->redirect('/');
	}
	
	public function confirm($string) {
//		$string = Security::cipher(base64_decode($encrypted), Configure::read('Security.cipherSeed'));
		$activation_code = substr($string,0,30);
		$id = substr($string,30);
		
		$user = $this->User->find(
			'first',
			array(
				'conditions' => array(
					'User.id' => $id,
					'User.activation_code' => $activation_code,
					'User.activated' => 0
				),
				'fields' => array('id','activation_code','activated')
			)
		);

		if (!$user) {
			$this->Session->setFlash(__('That activation code is not valid.'));
			$this->redirect('/');
		} else {
			$user['User']['activated'] = 1;
			$user['User']['activation_code'] = "0";
			$this->User->save($user);			
		}
	}
	
	public function forgot_password() {
		if ($this->Auth->user('id')) {
			$this->redirect('/');			
		} else {
			if ($this->request->is('post')) {
				
				$user = $this->User->find(
					'first',
					array(
						'conditions' => array(
							'User.email' => $this->request->data['User']['email']
						),
						'fields' => array('id','email')
					)
				);
	
				$user['User']['activation_code'] = $this->rand_string(30);
				$this->User->save($user);			
				$this->send_password_reset($user);
				$this->Session->setFlash(__('Email Sent.'));
			}
		}	
	}

	private function send_password_reset($user) {
		
		$encrypted = $user['User']['activation_code'] . $user['User']['id'];
//		$encrypted = urlencode(base64_encode(Security::cipher($encrypted, Configure::read('Security.cipherSeed'))));
		$Email = new CakeEmail('default');
		$Email->to($user['User']['email']);
		$Email->subject('Password Reset');
		$Email->viewVars(array('encrypted' => $encrypted));
		$Email->template('password_reset', 'default');
		$Email->emailFormat('both');
		$Email->send();
	}
	
	public function reset_password($string) {
		if (($this->request->is('post')) || ($this->request->is('put'))) {

			$this->request->data['User']['activation_code'] = "0";
			if ($this->User->save($this->request->data)) {
				$this->Auth->login();
				$this->setMembershipLevel();
				$this->Session->setFlash(__('Your password has been reset'));
				$this->redirect('/');
			}
		} else {
//			$string = Security::cipher(base64_decode($encrypted), Configure::read('Security.cipherSeed'));
			$activation_code = substr($string,0,30);
			$id = substr($string,30);
			
			$user = $this->User->find(
				'first',
				array(
					'conditions' => array(
						'User.id' => $id,
						'User.activation_code' => $activation_code
					),
					'fields' => array('id','email')
				)
			);
	
			if (!$user) {
				$this->Session->setFlash(__('That code is not valid.'));
				$this->redirect('/');
			} else {
				$this->request->data = $user;
			}
		}		
	}
	
	public function my_profile() {
		$user = $this->User->find(
			'first',
			array(
				'conditions' => array(
					'User.id' => $this->Auth->user('id')
				),
				'contain' => array(
					'QualifyingRace' => array(
						'Distance',
					),
					'Result' => array(
						'Race' => array(
							'Series' => array(
								'fields' => array(
									'Series.title',
									'Series.url_title'
								)
							),
							'ParentRace' => array(
								'Series' => array(
									'fields' => array(
										'Series.title',
										'Series.url_title'
									)
								)
							),
						),
						'AgeGroup'
					),
					'RaceRegistration' => array(
						'conditions' => array(
							'RaceRegistration.date >=' => date('Y-m-d') 
						),
						'order' => 'RaceRegistration.date ASC',
						'Race' => array(
							'fields' => array(
								'Race.title',
								'Race.date',
								'Race.distance_number',
								'Race.experience_id',
								'Race.url_title'
							),
							'Distance' => array(
								'fields' => array(
									'Distance.abbreviation'
								),
							)
						),
						'AgeGroup',
					),
					'Address',
					'Donation' => array(
						'order' => 'Donation.date ASC'
					),
					'Gender',
					'ShirtSize',
					'Membership',
					'EmergencyContact',
//					'EventRegistration',
					'ClinicRegistration' => array(
						'conditions' => array(
							'ClinicRegistration.date >=' => date('Y-m-d') 
						),
						'order' => 'ClinicRegistration.date ASC',
						'Clinic'
					),
					'TestSwimRegistration' => array(
						'conditions' => array(
							'TestSwimRegistration.date >=' => date('Y-m-d') 
						),
						'order' => 'TestSwimRegistration.date ASC',
						'TestSwim'
					
					),
					'VolunteerRegistration' => array(
						'conditions' => array(
							'VolunteerRegistration.date >=' => date('Y-m-d') 
						),
						'order' => 'VolunteerRegistration.date ASC',
						'Race'
					)
				)
			)
		);

		if ($user['User']['medical'] == "missing") {
			$user['User']['medical'] == "";
		}
		
		$this->set('user', $user);
	}

	public function edit_profile() {

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->redirect(array('action' => 'my_profile'));
			} else {
				$this->Session->setFlash(__('Your changes could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->find(
				'first',
				array(
					'conditions' => array(
						'User.id' => $this->Auth->user('id')
					)
				)
			);

			if ($this->request->data['User']['medical'] == "missing") {
				$this->request->data['User']['medical'] == "";
			}

		}
		$genders = $this->User->Gender->find('list');
		$shirtSizes = $this->User->ShirtSize->find('list');
		$this->set(compact('genders', 'shirtSizes'));
	}

	
	public function change_password() {
		if (($this->request->is('post')) || ($this->request->is('put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Your password has been changed'));
				$this->redirect(array('action' => 'my_profile'));
			}
		}
		
		$user = $this->User->find(
			'first',
			array(
				'conditions' => array(
					'User.id' => $this->Auth->user('id')
				),
				'fields' => array('User.id'),
				'recursive' => -1
			)
		);

		$this->request->data = $user;
	}
	
	public function add_members() {
		
		if ($this->request->is('post')) {
			$lines = explode("\n", $this->request->data['User']['members']);
			$head = str_getcsv(array_shift($lines));

			$array = array();
			foreach ($lines as $line) {
			    $array[] = array_combine($head, str_getcsv($line));
			}
			
			$i = 0;
			foreach ($array as $line) {
				$members[$i]['User']['first_name'] = $line['first_name'];
				$members[$i]['User']['last_name'] = $line['last_name'];
				$members[$i]['User']['email'] = strtolower($line['from_email']);
				$members[$i]['User']['medical'] = $line['list-medical-conditions-medications'];
				if ($members[$i]['User']['medical'] == "") {
					$members[$i]['User']['medical'] = "missing";
				}
				$members[$i]['User']['group_id'] = 1;
				
				if ($line['t-shirt-size'] == "XL") {
					$members[$i]['User']['shirt_size_id'] = 4;
				} else if ($line['t-shirt-size'] == "L") {
					$members[$i]['User']['shirt_size_id'] = 3;
				} else if ($line['t-shirt-size'] == "M") {
					$members[$i]['User']['shirt_size_id'] = 2;
				} else if ($line['t-shirt-size'] == "Sm") {
					$members[$i]['User']['shirt_size_id'] = 1;
				}
				$line['city-state-zip'] = trim($line['city-state-zip']);
				if (preg_match('/\d{5}/',substr($line['city-state-zip'],-5))) {
					$members[$i]['Address']['postcode'] = substr($line['city-state-zip'],-5);
					$line['city-state-zip'] = substr($line['city-state-zip'],0,-5);
				}
				
				$address = split(',',$line['city-state-zip']);
				
				$members[$i]['Address']['city'] = trim($address[0]);
				if (count($address) > 1) {
					$members[$i]['Address']['county_province'] = trim($address[1]);
				}
				
				$members[$i]['Address']['line1'] = $line['street-address'];
				$members[$i]['Address']['phone'] = preg_replace("/\D/","",$line['cell-phone']);
				
				$contact = split(',',$line['emergency-contact-name-and-relationship']);

				$members[$i]['EmergencyContact']['name'] = trim($contact[0]);
				if (count($contact) > 1) {
					$members[$i]['EmergencyContact']['relationship'] = trim($contact[1]);
				}

				$members[$i]['EmergencyContact']['phone'] = preg_replace("/\D/","",$line['emergency-contact-number']);
				
				$members[$i]['Membership']['start_date'] = date('Y-m-d',strtotime($line['date_time']));
				$members[$i]['Membership']['end_date'] = "2014-12-31";
				$members[$i]['Membership']['membership_level_id'] = 1;
				$i++;
			}

			foreach ($members as $member) {
				$check_id = $this->User->find(
					'first',
					array(
						'fields' => array('User.id'),
						'conditions' => array(
							'OR' => array(
								'User.email' => $member['User']['email'],
								'User.email' => "_____" . $member['User']['email']
							)
						),
						'recursive' => -1
					)
				);
				
				if (isset($check_id['User']['id'])) {
					$id = $check_id['User']['id'];
 				} else {
					$member['User']['email'] = "_____" . $member['User']['email'];
					$this->User->create();
					$this->User->save($member);
					$id = $this->User->id;
				}

				$member['Address']['user_id'] = $id;
				$member['EmergencyContact']['user_id'] = $id;
				$member['Membership']['user_id'] = $id;

				$this->User->Address->create();
				$this->User->Address->save($member);

				$this->User->EmergencyContact->create();
				$this->User->EmergencyContact->save($member);

				$this->User->Membership->create();
				$this->User->Membership->save($member);
				
			}

		}
		
		
	}

	public function add_users() {
		$flagged = array();
		if ($this->request->is('post')) {
			$lines = explode("\n", $this->request->data['User']['members']);
			$head = str_getcsv(array_shift($lines));

			$array = array();
			foreach ($lines as $line) {
			    $array[] = array_combine($head, str_getcsv($line));
			}
			
			$i = 0;
			foreach ($array as $line) {
				$members[$i]['User']['first_name'] = $line['first_name'];
				$members[$i]['User']['last_name'] = $line['last_name'];
				$members[$i]['User']['email'] = strtolower($line['from_email']);
				$members[$i]['User']['medical'] = $line['indicate-important-medical-information-a'];
				if ($members[$i]['User']['medical'] == "") {
					$members[$i]['User']['medical'] = "missing";
				}
				$members[$i]['User']['group_id'] = 1;
				
				if ($line['sex'] == "Male") {
					$members[$i]['User']['gender_id'] = 1;
				} else {
					$members[$i]['User']['gender_id'] = 2;
				}
				if ($line['t-shirt-size'] == "XL") {
					$members[$i]['User']['shirt_size_id'] = 4;
				} else if ($line['t-shirt-size'] == "L") {
					$members[$i]['User']['shirt_size_id'] = 3;
				} else if ($line['t-shirt-size'] == "M") {
					$members[$i]['User']['shirt_size_id'] = 2;
				} else if ($line['t-shirt-size'] == "Sm") {
					$members[$i]['User']['shirt_size_id'] = 1;
				}
				
				$members[$i]['User']['dob'] = date('Y-m-d',strtotime($line['date-of-birth-mmddyyyy']));
				
				/*
				$line['city-state-zip'] = trim($line['city-state-zip']);
				if (preg_match('/\d{5}/',substr($line['city-state-zip'],-5))) {
					$members[$i]['Address']['postcode'] = substr($line['city-state-zip'],-5);
					$line['city-state-zip'] = substr($line['city-state-zip'],0,-5);
				}
				
				$address = split(',',$line['city-state-zip']);
				
				$members[$i]['Address']['city'] = trim($address[0]);
				if (count($address) > 1) {
					$members[$i]['Address']['county_province'] = trim($address[1]);
				}
				
				$members[$i]['Address']['line1'] = $line['street-address'];
				$members[$i]['Address']['phone'] = preg_replace("/\D/","",$line['cell-phone']);
				
				$contact = split(',',$line['emergency-contact-name-and-relationship']);

				$members[$i]['EmergencyContact']['name'] = trim($contact[0]);
				if (count($contact) > 1) {
					$members[$i]['EmergencyContact']['relationship'] = trim($contact[1]);
				}

				$members[$i]['EmergencyContact']['phone'] = preg_replace("/\D/","",$line['emergency-contact-number']);
				*/
				$i++;
			}

			foreach ($members as $member) {
				$check_id = $this->User->find(
					'first',
					array(
						'fields' => array('User.id'),
						'conditions' => array(
							array(
								'OR' => array(
									array('User.email' => $member['User']['email']),
									array('User.email' => "_____" . $member['User']['email'])
								)
							)
						),
						'recursive' => -1
					)
				);
				
				if ($check_id) {
					$id = $check_id['User']['id'];
 				} else {
					$member['User']['email'] = "_____" . $member['User']['email'];
/*					
					$new_check = $this->User->find(
						'first',
						array(
							'fields' => array('User.id','User.name'),
							'conditions' => array(
								array(
									'AND' => array(
										array('User.first_name' => $member['User']['first_name']),
										array('User.last_name' => $member['User']['last_name'])
									)
								)
							),
							'recursive' => -1
						)
					);
					
					if ($new_check) {
						$flagged[] = $new_check['User']['id'] . ' - ' . $new_check['User']['name'];
					} */
					$this->User->create();
					$this->User->save($member);
//					$id = $this->User->id;
				}
				$this->set(compact('flagged'));

			}

		}
		
		
	}

	private function setMembershipLevel() {
		$membershipLevel = $this->User->Membership->find(
			'first',
			array(
				'conditions' => array(
					'Membership.user_id' => $this->Auth->user('id'),
					'Membership.end_date >=' => date('Y-m-d') 
				),
				'fields' => array('membership_level_id'),
				'recursive' => -1
			)
		);
		
		if ($membershipLevel) {
			$this->Session->write('Membership.membership_level', $membershipLevel['Membership']['membership_level_id']);
		} else {
			$this->Session->write('Membership.membership_level',0);
		}

	}
}
