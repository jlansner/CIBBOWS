<?php
App::uses('AppModel', 'Model');
/**
 * ClinicRegistration Model
 *
 * @property User $User
 * @property Clinic $Clinic
 * @property Gender $Gender
 * @property QualifyingSwim $QualifyingSwim
 * @property QualifyingRace $QualifyingRace
 * @property Result $Result
 */
class ClinicRegistration extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'clinic_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'age' => array(
			'required' => array(
				'rule' => array('checkAge'),
				'message' => 'You are not old enough to register for this clinic',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gender_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'waiver' => array(
			'checked' => array(
				'rule' => array('comparison', '==', 1),
				'message' => 'You must agree to the waiver',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Clinic' => array(
			'className' => 'Clinic',
			'foreignKey' => 'clinic_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gender' => array(
			'className' => 'Gender',
			'foreignKey' => 'gender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'QualifyingSwim' => array(
			'className' => 'QualifyingSwim',
			'foreignKey' => 'qualifying_swim_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'QualifyingRace' => array(
			'className' => 'QualifyingRace',
			'foreignKey' => 'qualifying_race_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Result' => array(
			'className' => 'Result',
			'foreignKey' => 'result_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function checkAge() {
		if ($this->data['ClinicRegistration']['age'] >= $this->data['Clinic']['minimum_age']) {
			return true;
		} else {
			return false;
		}
	}

}
