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
	public function index() {
		$this->Membership->recursive = 0;
		$this->set('memberships', $this->paginate());
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
	
			$this->request->data['Membership']['membership_level_id'] = $membershipFee['MembershipFee']['membership_level_id']; 
			$this->request->data['Membership']['user_id'] = $this->Auth->user('id');
			$this->request->data['Membership']['start_date'] = date('Y-m-d');
			$this->request->data['Membership']['end_date'] = $membershipFee['MembershipFee']['year'] . '-12-31';

			$customerData = array(
				'stripeToken'  => $this->request->data['stripeToken'],
				'email' => $this->Auth->user('email')
			);

			$customer = $this->Stripe->customerCreate($customerData);

			$stripeData = array(
			    'amount' => $membershipFee['MembershipFee']['price'],
			    'stripeCustomer' => $customer['stripe_id'],
				'description' => 'CIBBOWS Membership'
			);

			$user['name'] = $this->Auth->user('name');
			$user['email'] = $this->Auth->user('email');

			$result = $this->Stripe->charge($stripeData);
			if (is_array($result)) {
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

		$stripeKey = $this->Stripe->dataKey;
		$this->set(compact('membershipFee','stripeKey'));
	}

	private function send_membership_email($user,$membershipFee) {
		$Email = new CakeEmail('default');
		$Email->to($user['email']);
		$Email->subject('Thank you for joining CIBBOWS');
		$Email->viewVars(array('name' => $user['name'], 'year' => $membershipFee['MembershipFee']['year'], 'price' => $membershipFee['MembershipFee']['price']));
		$Email->template('join', 'default');
		$Email->emailFormat('both');
		$Email->send();		
	}
}
