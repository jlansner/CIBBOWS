<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Memberships Controller
 *
 * @property Membership $Membership
 */
class MembershipsController extends AppController {

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
	public function admin_index() {
//		$this->Membership->recursive = 0;
//		$this->set('memberships', $this->paginate());
		$memberships = $this->Membership->find(
			'all',
			array(
				'conditions' => array(
					'Membership.start_date <= DATE(NOW())',
					'Membership.end_date >= DATE(NOW())'
				),
				'contain' => array(
					'User' => array(
						'fields' => array('User.id','User.name','User.email')
					)
				),
				'order' => array('User.last_name')
			)
		);
		$this->set(compact('memberships'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Membership->exists($id)) {
			throw new NotFoundException(__('Invalid membership'));
		}
		$options = array('conditions' => array('Membership.' . $this->Membership->primaryKey => $id));
		$this->set('membership', $this->Membership->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->request->data['Membership']['waiver'] = 1;
		if ($this->request->is('post')) {
			$this->Membership->create();
			if ($this->Membership->save($this->request->data)) {
				$this->Session->setFlash(__('The membership has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership could not be saved. Please, try again.'));
			}
		}
		$users = $this->Membership->User->find('list');
		$membershipLevels = $this->Membership->MembershipLevel->find('list');
		$this->set(compact('membershipLevels','users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Membership->exists($id)) {
			throw new NotFoundException(__('Invalid membership'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Membership->save($this->request->data)) {
				$this->Session->setFlash(__('The membership has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Membership.' . $this->Membership->primaryKey => $id));
			$this->request->data = $this->Membership->find('first', $options);
		}
		$users = $this->Membership->User->find('list');
		$membershipLevels = $this->Membership->MembershipLevel->find('list');
		$this->set(compact('membershipLevels','users'));

	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Membership->id = $id;
		if (!$this->Membership->exists()) {
			throw new NotFoundException(__('Invalid membership'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Membership->delete()) {
			$this->Session->setFlash(__('Membership deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Membership was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function join() {
		
		$membershipFee = $this->Membership->MembershipLevel->MembershipFee->find(
			'first',
			array(
				'fields' => array('MembershipFee.id','MembershipFee.price','MembershipFee.membership_level_id','MembershipFee.year'),
				'conditions' =>array(
					'MembershipFee.start_date <= CURDATE()',
					'MembershipFee.end_date >= CURDATE()'
				),
				'order' => array('MembershipFee.priority'),
				'recursive' => 2
			)
		);

		if ($this->request->is('post')) {
			$validationArray = array(
				'fieldList' => array(
					'waiver'
				)
			);				

			if ($this->Membership->validates($validationArray)) {
	
				$this->request->data['Membership']['membership_level_id'] = $membershipFee['MembershipFee']['membership_level_id']; 
				$this->request->data['Membership']['user_id'] = $this->Auth->user('id');
				$this->request->data['Membership']['start_date'] = date('Y-m-d');
				$this->request->data['Membership']['end_date'] = $membershipFee['MembershipFee']['year'] . '-12-31';
	
				$customerData = array(
					'stripeToken'  => $this->request->data['stripeToken'],
					'email' => $this->Auth->user('email')
				);
	
				$customer = $this->Stripe->customerCreate($customerData);
				
				$total_price = $membershipFee['MembershipFee']['price'] + $this->request->data['Donation']['amount'];
				
				$description = "CIBBOWS Membership - " . $this->Auth->user('first_name') . ' ' . $this->Auth->user('last_name');
				
				if ($this->request->data['Donation']['amount'] > 0) {
					$description .= " | Donation: " . $this->request->data['Donation']['amount'];
					
					if ($this->request->data['Donation']['body'] != '') {
						$description .=	" - " . $this->request->data['Donation']['body'];
					}
				}
	
				$stripeData = array(
				    'amount' => $total_price,
				    'stripeCustomer' => $customer['stripe_id'],
					'description' => $description
				);
	
				$user['name'] = $this->Auth->user('name');
				$user['email'] = $this->Auth->user('email');
	
				$result = $this->Stripe->charge($stripeData);
				if (is_array($result)) {
					if ($this->request->data['Donation']['amount'] > 0) {
						$this->loadModel('Donation');					
						$this->Donation->create();
						if ($this->Donation->save($this->request->data)) {
							$this->send_donation_email($emailvars);
						}						
					}
	
					$this->Membership->create();
					if ($this->Membership->save($this->request->data)) {
						$this->Session->write('Membership.membership_level',$membershipFee['MembershipLevel']['id']);
						$this->Session->setFlash(__('Thank you for joining CIBBOWS'));
						$this->send_membership_email($user,$membershipFee);
						$this->redirect(array('controller' => 'users', 'action' => 'my_profile'));
					} else {
						$this->Session->setFlash(__('The membership could not be saved. Please, try again.'));
					}		
				} else {
					$this->Session->setFlash(__('The membership could not be saved. Please, try again.'));
					$this->set('result',$result); //error message from Stripe
				}
			}
		}

		$stripeKey = $this->Stripe->dataKey;
		$this->set(compact('membershipFee','stripeKey'));
	}

}
