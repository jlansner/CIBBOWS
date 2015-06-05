<?php
App::uses('AppController', 'Controller');
/**
 * ClinicRegistrations Controller
 *
 * @property ClinicRegistration $ClinicRegistration
 */
class ClinicRegistrationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClinicRegistration->recursive = 0;
		$this->set('clinicRegistrations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void

	public function view($id = null) {
		if (!$this->ClinicRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid clinic registration'));
		}
		$options = array('conditions' => array('ClinicRegistration.' . $this->ClinicRegistration->primaryKey => $id));
		$this->set('clinicRegistration', $this->ClinicRegistration->find('first', $options));
	}
*/

	public function view($year = null, $month = null, $day = null, $url_title = null) {
        if (!$url_title) {
            throw new NotFoundException(__('Invalid clinic'));
        }

		$clinic = $this->ClinicRegistration->Clinic->find(
			'first',
			array(
	        	'conditions' => array(
    	    		'Clinic.url_title' => $url_title,
    	    		'Clinic.date' => $year . '-' . $month . '-' . $day
	    	    ),
	    	    'contain' => array(
	    	    	'ClinicRegistration' => array(
	    	    		'fields' => array('ClinicRegistration.user_id','ClinicRegistration.first_name','ClinicRegistration.last_name','ClinicRegistration.age','ClinicRegistration.approved','ClinicRegistration.waitlist'),
			    	    'Gender' => array(
			    	    	'fields' => array('Gender.title')
						),
						'order' => array('ClinicRegistration.last_name', 'ClinicRegistration.first_name')	
						
					)
				)
			)
		);

		if (!$clinic) {
			$this->redirect('/clinics/');
		}

        $this->set(compact('clinic'));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClinicRegistration->create();
			if ($this->ClinicRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The clinic registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clinic registration could not be saved. Please, try again.'));
			}
		}

		$users = $this->ClinicRegistration->User->find('list');
		$clinics = $this->ClinicRegistration->Clinic->find('list');
		$genders = $this->ClinicRegistration->Gender->find('list');
		$qualifyingSwims = $this->ClinicRegistration->QualifyingSwim->find('list');
		$qualifyingClinics = $this->ClinicRegistration->QualifyingClinic->find('list');
		$results = $this->ClinicRegistration->Result->find('list');
		$this->set(compact('users', 'clinics', 'genders', 'qualifyingSwims', 'qualifyingClinics', 'results'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ClinicRegistration->exists($id)) {
			throw new NotFoundException(__('Invalid clinic registration'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClinicRegistration->save($this->request->data)) {
				$this->Session->setFlash(__('The clinic registration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clinic registration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClinicRegistration.' . $this->ClinicRegistration->primaryKey => $id));
			$this->request->data = $this->ClinicRegistration->find('first', $options);
		}
		$users = $this->ClinicRegistration->User->find('list');
		$clinics = $this->ClinicRegistration->Clinic->find('list');
		$genders = $this->ClinicRegistration->Gender->find('list');
		$qualifyingSwims = $this->ClinicRegistration->QualifyingSwim->find('list');
		$qualifyingClinics = $this->ClinicRegistration->QualifyingClinic->find('list');
		$results = $this->ClinicRegistration->Result->find('list');
		$this->set(compact('users', 'clinics', 'genders', 'qualifyingSwims', 'qualifyingClinics', 'results'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClinicRegistration->id = $id;
		if (!$this->ClinicRegistration->exists()) {
			throw new NotFoundException(__('Invalid clinic registration'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClinicRegistration->delete()) {
			$this->Session->setFlash(__('Clinic registration deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Clinic registration was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function delete_registration($id = null) {
		$this->ClinicRegistration->id = $id;
		if (!$this->ClinicRegistration->exists()) {
			throw new NotFoundException(__('Invalid clinic registration'));
		}
		$clinic = $this->ClinicRegistration->find(
			'first',
			array(
				'conditions' => array(
					'ClinicRegistration.id' => $id
				),
				'contain' => array(
					'Clinic'
				)
			)
		); 
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClinicRegistration->delete()) {
			$this->Session->setFlash(__('Clinic registration deleted'));
			$this->redirect(
				array(
					'controller' => 'clinics',
					'action' => 'view',
					'year' => substr($clinic['Clinic']['date'],0,4),
					'month' => substr($clinic['Clinic']['date'],5,2),
					'day' => substr($clinic['Clinic']['date'],8,2),
					'url_title' => $clinic['Clinic']['url_title']					
				)
			);
		}
		$this->Session->setFlash(__('Clinic registration was not deleted'));
		$this->redirect(
			array(
				'controller' => 'clinics',
				'action' => 'view',
				'year' => substr($clinic['Clinic']['date'],0,4),
				'month' => substr($clinic['Clinic']['date'],5,2),
				'day' => substr($clinic['Clinic']['date'],8,2),
				'url_title' => $clinic['Clinic']['url_title']					
			)
		);
	}
	
	public function register($clinic_id) {
		$clinic = $this->ClinicRegistration->Clinic->find(
			'first',
			array(
				'conditions' => array(
					'Clinic.id' => $clinic_id
				),
			
			)
		);
		
		$totalRegistered = $this->ClinicRegistration->find(
			'count',
			array(
				'conditions' => array(
					'ClinicRegistration.clinic_id' => $clinic_id
				),
			
			)
		);
		
		if (strtotime('now') > strtotime($clinic['Clinic']['date'])) {
			$this->redirect(
				array(
					'controller' => 'clinics',
					'action' => 'view',
					'year' => substr($clinic['Clinic']['date'],0,4),
					'month' => substr($clinic['Clinic']['date'],5,2),
					'day' => substr($clinic['Clinic']['date'],8,2),
					'url_title' => $clinic['Clinic']['url_title']
				)
			);	
		}

		$reg = $this->ClinicRegistration->find(
			'count',
			array(
				'conditions' => array(
					'ClinicRegistration.clinic_id' => $clinic_id,
					'ClinicRegistration.user_id' => $this->Auth->user('id')
				),
				'recursive' => -1
			)
		);
		

		if ($reg) {

			$this->Session->setFlash('You are already registered for this clinic.');
			$this->redirect(
				array(
					'controller' => 'clinics',
					'action' => 'view',
					'year' => substr($clinic['Clinic']['date'],0,4),
					'month' => substr($clinic['Clinic']['date'],5,2),
					'day' => substr($clinic['Clinic']['date'],8,2),
					'url_title' => $clinic['Clinic']['url_title']
				)
			);
		}

		$waitlist = false;
		if ($totalRegistered >= $clinic['Clinic']['max_swimmers'] + $clinic['Clinic']['max_waitlist']) {
			$this->Session->setFlash('Registration for this clinic is full');
			$this->redirect(
				array(
					'controller' => 'clinics',
					'action' => 'view',
					'year' => substr($clinic['Clinic']['date'],0,4),
					'month' => substr($clinic['Clinic']['date'],5,2),
					'day' => substr($clinic['Clinic']['date'],8,2),
					'url_title' => $clinic['Clinic']['url_title']
				)
			);	
		} else if ($totalRegistered >= $clinic['Clinic']['max_swimmers']) {
			$this->Session->setFlash('Registration for this clinic is full, but you may sign up for the waitlist');
			$waitlist = true;
		}

		if ($this->request->is('post')) {
			
			$this->ClinicRegistration->set($this->request->data);

			$this->request->data['User']['dob'] = $this->request->data['User']['dob']['year'] . '-' . $this->request->data['User']['dob']['month'] . '-' . $this->request->data['User']['dob']['day'];
			$birthDate = new DateTime($this->request->data['User']['dob']);
			$clinicDate = new DateTime($clinic['Clinic']['date']);
			$interval = $birthDate->diff($clinicDate);
			$this->request->data['ClinicRegistration']['age'] = $interval->y;

			$this->request->data['User']['id'] = $this->Auth->user('id');
  			$this->ClinicRegistration->User->save($this->request->data);
			
			$this->Session->write('Auth.User.gender_id',$this->request->data['User']['gender_id']);
			$this->Session->write('Auth.User.medical',$this->request->data['User']['medical']);
			$this->Session->write('Auth.User.dob',$this->request->data['User']['dob']);

/* 			
			$this->request->data['Address']['user_id'] = $this->Auth->user('id');

			if ($this->request->data['Address']['id']) {
			 	$this->ClinicRegistration->User->Address->save($this->request->data);
			} else {
			 	$this->ClinicRegistration->User->Address->create();
				$this->ClinicRegistration->User->Address->save($this->request->data);			
			}
*/

			$this->request->data['EmergencyContact']['user_id'] = $this->Auth->user('id');

			if ($this->request->data['EmergencyContact']['id']) {
				$this->ClinicRegistration->User->EmergencyContact->save($this->request->data);				
			} else {
				$this->ClinicRegistration->User->EmergencyContact->create();
				$this->ClinicRegistration->User->EmergencyContact->save($this->request->data);				
			}

			$validationArray = array(
				'fieldList' => array(
					'waiver','age'
				)
			);				

			if ($this->ClinicRegistration->validates($validationArray)) {

				$this->request->data['ClinicRegistration']['first_name'] = $this->Auth->user('first_name');
				$this->request->data['ClinicRegistration']['last_name'] = $this->Auth->user('last_name');
				$this->request->data['ClinicRegistration']['gender_id'] = $this->Auth->user('gender_id');
				$this->request->data['ClinicRegistration']['date'] = $clinic['Clinic']['date'];
				
				if ($waitlist) {
					$this->request->data['ClinicRegistration']['waitlist'] = 1;
					$this->request->data['ClinicRegistration']['approved'] = 0;
				} else {
					$this->request->data['ClinicRegistration']['waitlist'] = 0;
					$this->request->data['ClinicRegistration']['approved'] = 1;
				}
				
				$this->ClinicRegistration->create();

				$emailvars = $this->request->data;
				$emailvars['User']['name'] = $this->Auth->user('name');
				$emailvars['User']['email'] = $this->Auth->user('email');
				$emailvars['Clinic'] = $clinic['Clinic'];

				if ($this->ClinicRegistration->save($this->request->data)) {
					$this->Session->setFlash(__('Your clinic registration has been saved'));
					$this->send_registration_approved_email($emailvars);
					$this->redirect(
						array(
							'controller' => 'clinic_registrations',
							'action' => 'view',
							'year' => substr($clinic['Clinic']['date'],0,4),
							'month' => substr($clinic['Clinic']['date'],5,2),
							'day' => substr($clinic['Clinic']['date'],8,2),
							'url_title' => $clinic['Clinic']['url_title']							
						)
					);
				} else {
					$this->Session->setFlash(__('Your clinic registration could not be saved. Please, try again.'));
				}
					

/*				if ($this->request->data['Donation']['amount']) {
					$this->request->data['Donation']['amount'] = number_format($this->request->data['Donation']['amount'], 2);
				} 

				$this->request->data['ClinicRegistration']['total_payment'] = number_format($this->request->data['ClinicRegistration']['payment'] + $this->request->data['Donation']['amount'], 2);
				
				if ($this->request->data['ClinicRegistration']['join'] == 1) {
					$this->request->data['ClinicRegistration']['total_payment'] += $this->request->data['MembershipFee']['price'];
				}

				$genders = $this->ClinicRegistration->Gender->find('list');
				$ageGroups = $this->ClinicRegistration->AgeGroup->find('list');
				$this->set(compact('clinic','genders'));

				$this->render('checkout'); */
			}	
		}

		if (AuthComponent::user('dob') == "0000-00-00") {
			$this->request->data['ClinicRegistration']['age'] = "";
		} else {
			$birthDate = new DateTime(AuthComponent::user('dob'));
			$clinicDate = new DateTime($clinic['Clinic']['date']);
			$interval = $birthDate->diff($clinicDate);
			$this->request->data['ClinicRegistration']['age'] = $interval->y;
		}

		$this->request->data['User']['dob'] = $this->Auth->user('dob');
		$this->request->data['User']['gender_id'] = $this->Auth->user('gender_id');
		$this->request->data['User']['medical'] = $this->Auth->user('medical');

		if ($this->request->data['User']['medical'] == "missing") {
			$this->request->data['User']['medical'] == "";
		}

		$emergencyContact = $this->ClinicRegistration->User->EmergencyContact->find(
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
			$emergencyContact['EmergencyContact']['phone'] = '(' . substr($emergencyContact['EmergencyContact']['phone'],0,3) . ') ' . substr($emergencyContact['EmergencyContact']['phone'],3,3) . '-' . substr($emergencyContact['EmergencyContact']['phone'],6);
		}

		if (count($emergencyContact) > 0) {
			$this->request->data['EmergencyContact'] = $emergencyContact['EmergencyContact'];
		}
		$genders = $this->ClinicRegistration->Gender->find('list');
		
		$this->set(compact('clinic','genders','waitlist','reg'));
	}

	private function send_registration_approved_email($emailvars) {
		$Email = new CakeEmail('default');
		$Email->to($emailvars['User']['email']);
		$Email->subject('Thank you for registering for ' . $emailvars['Clinic']['title']);
		$Email->viewVars(
			array(
				'email' => $emailvars
			)
		);
		$Email->template('clinic_registration_approved', 'default');
		$Email->emailFormat('both');
		$Email->send();		
	}

}
