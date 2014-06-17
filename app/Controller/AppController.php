<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
//		'Security',
		'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            ),
		   'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email')
				)
			)
        ),
		'DebugKit.Toolbar',
		'Paginator',
		'Session',
		'Stripe.Stripe'
	);

	public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->loginAction = array(
        	'admin' => false,
			'controller' => 'users',
        	'action' => 'login'
		);

        $this->Auth->logoutRedirect = array(
        	'admin' => false,
	        'controller' => 'users',
	        'action' => 'login'
		);
//        $this->Auth->loginRedirect = array('controller' => 'posts', 'action' => 'add');

		$this->Auth->allow('display', 'view', 'index', 'homepage_news', 'homepage_calendar','create_account','confirm','forgot_password','reset_password','menu','donate','confirm','thankyou','homepage_slideshow');
		
		if ($this->Session->read('Membership.membership_level')) {
			$this->userMembershipLevel = $this->Session->read('Membership.membership_level');
		} else {
			$this->userMembershipLevel = 0;
		}

		$this->set('userMembershipLevel',$this->userMembershipLevel);

		$admin = $this->Auth->loggedIn() && ($this->Auth->user('group_id') > 1);
		$this->set('admin',$admin);

    }
	
	public function rand_string($length = "20") {
		$pass = "";
		for ($i = 0; $i < $length; $i++) {
	    	$char = rand(48,122);
			while ((($char > 90) && ($char < 97)) || (($char > 57) && ($char < 65))) {
				$char = rand(48,122);
			}
			$pass .= chr($char);
		}
		return $pass;
	}
	
	public function sendApprovedEmail($registration_id) {
		$emailvars = $this->RaceRegistration->find(
			'first',
			array(
				'conditions' => array(
					'RaceRegistration.id' => $registration_id
				),
				'contain' => array(
					'Race' => array(
						'fields' => array('Race.title','Race.date',),
						'ParentRace' => array(
							'fields' => array('ParentRace.id','ParentRace.title')
						)
					),
					'User' => array(
						'fields' => array('User.email','User.name')
					),
				)
			)
		);
		$Email = new CakeEmail('default');
		$Email->to($emailvars['User']['email']);
		if ($emailvars['Race']['parent_id']) {
			$Email->subject('Your registration for ' . $emailvars['Race']['ParentRace']['title'] . ' - ' . $emailvars['Race']['title'] . ' has been approved');
			
		} else {
			$Email->subject('Your registration for ' . $emailvars['Race']['title'] . ' has been approved');
		}
		$Email->viewVars(
			array(
				'email' => $emailvars
			)
		);
		$Email->template('race_registration_updated_approved', 'default');
		$Email->emailFormat('both');
		$Email->send();		
		
	}

    public function forceSecure() {
    	if (!$this->request->is('ssl')) {
	        $this->redirect( 'https://'.env('SERVER_NAME').env('REQUEST_URI') );
		}
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
