<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array(
			'conditions' => array('User.' . $this->User->primaryKey => $id),
			'recursive' => 2
		);
		$this->set('user', $this->User->find('first', $options));		
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

	public function register() {
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
				$this->send_confirmation($user);
				$this->Session->setFlash(__('Thank you for registering'));
				$this->Auth->login($user);
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
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$Email->template('confirmation', 'confirmation');
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
		$encrypted = urlencode(base64_encode(Security::cipher($encrypted, Configure::read('Security.cipherSeed'))));
		$Email = new CakeEmail('default');
		$Email->to($user['User']['email']);
		$Email->subject('Password Reset');
		$Email->viewVars(array('encrypted' => $encrypted));
		$Email->template('password_reset', 'password_reset');
		$Email->emailFormat('both');
		$Email->send();
	}
	
	public function reset_password($encrypted) {
		if (($this->request->is('post')) || ($this->request->is('put'))) {

			$this->request->data['User']['activation_code'] = "0";
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Your password has been reset'));
				$this->redirect('/');
			}
		} else {
			$string = Security::cipher(base64_decode($encrypted), Configure::read('Security.cipherSeed'));
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
						'Race',
						'AgeGroup'
					),
					'RaceRegistration' => array(
						'Race' => array(
							'fields' => array(
								'Race.title',
								'Race.date',
								'Race.distance_number',
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
					'Gender',
					'ShirtSize',
					'Membership',
					'EmergencyContact',
//					'EventRegistration',
					'ClinicRegistration' => array(
						'Clinic'
					),
					'TestSwimRegistration',
				)
			)
		);
		
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
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $this->Auth->user('id')), 'recursive' => -1);
			$this->request->data = $this->User->find('first', $options);
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
}
