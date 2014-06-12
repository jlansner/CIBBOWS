<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

 /*
 * Donations Controller
 *
 * @property Donation $Donation
 * @property PaginatorComponent $Paginator
 */
class DonationsController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
		$this->Auth->allow('*');
		$this->forceSecure();
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Donation->recursive = 0;
		$this->set('donations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Donation->exists($id)) {
			throw new NotFoundException(__('Invalid donation'));
		}
		$options = array('conditions' => array('Donation.' . $this->Donation->primaryKey => $id));
		$this->set('donation', $this->Donation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Donation->create();
			if ($this->Donation->save($this->request->data)) {
				$this->Session->setFlash(__('The donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation could not be saved. Please, try again.'));
			}
		}
		$users = $this->Donation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Donation->exists($id)) {
			throw new NotFoundException(__('Invalid donation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Donation->save($this->request->data)) {
				$this->Session->setFlash(__('The donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Donation.' . $this->Donation->primaryKey => $id));
			$this->request->data = $this->Donation->find('first', $options);
		}
		$users = $this->Donation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Donation->id = $id;
		if (!$this->Donation->exists()) {
			throw new NotFoundException(__('Invalid donation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Donation->delete()) {
			$this->Session->setFlash(__('The donation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The donation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function donate() {
		if ($this->request->is('post')) {
			$this->request->data['Donation']['amount'] = round($this->request->data['Donation']['amount'],2);
			$this->render('confirm');
		}
	}

	public function confirm() {		
		if ($this->request->is('post')) {

			$customerData = array(
				'stripeToken'  => $this->request->data['stripeToken'],
				'email' => $this->request->data['Donation']['email']
			);

			$customer = $this->Stripe->customerCreate($customerData);

			$stripeData = array(
			    'amount' => $this->request->data['Donation']['amount'],
			    'stripeCustomer' => $customer['stripe_id'],
				'description' => 'Donation from ' . $this->request->data['Donation']['first_name'] . ' ' . $this->request->data['Donation']['last_name'] . '(' . $this->request->data['Donation']['email'] . ')'
			);

			$emailvars['User']['name'] = $this->request->data['Donation']['first_name'] . ' ' . $this->request->data['Donation']['last_name'];
			$emailvars['User']['email'] = $this->request->data['Donation']['email'];
			$emailvars['Donation']['amount'] = $this->request->data['Donation']['amount'];

			$result = $this->Stripe->charge($stripeData);
			if (is_array($result)) {
				$this->Donation->create();
				//stripe data here
				if ($this->Donation->save($this->request->data)) {
					$this->Session->setFlash(__('Your donation has been received.'));
					$this->send_donation_email($emailvars);
					$this->render('thankyou');
				} else {
					$this->Session->setFlash(__('Your donation has not been received. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('Your donation could not be processed. Please, try again.'));
				$this->set('result',$result); //error message from Stripe
			}
		}
	}
	
	public function thankyou() {
		
	}

	private function send_donation_email($emailvars) {
		$Email = new CakeEmail('default');
		$Email->to($emailvars['User']['email']);
		$Email->subject('Thank you for your donation');
		$Email->viewVars(
			array(
				'email' => $emailvars,
			)
		);
		$Email->template('send_donation_email', 'default');
		$Email->emailFormat('both');
		$Email->send();				
	}
}
