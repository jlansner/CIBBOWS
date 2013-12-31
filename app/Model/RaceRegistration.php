<?php
App::uses('AppModel', 'Model');
/**
 * RaceRegistration Model
 *
 * @property User $User
 * @property Race $Race
 * @property Gender $Gender
 * @property AgeGroup $AgeGroup
 * @property QualifyingSwim $QualifyingSwim
 * @property QualifyingRace $QualifyingRace
 * @property Result $Result
 * @property ShirtSize $ShirtSize
 */
class RaceRegistration extends AppModel {

    public $actsAs = array('Containable');

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
		'race_id' => array(
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
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
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
		'age_group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'approved' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'shirt_size_id' => array(
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
		'Race' => array(
			'className' => 'Race',
			'foreignKey' => 'race_id',
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
		'AgeGroup' => array(
			'className' => 'AgeGroup',
			'foreignKey' => 'age_group_id',
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
		),
		'ShirtSize' => array(
			'className' => 'ShirtSize',
			'foreignKey' => 'shirt_size_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function beforeSave() {
		parent::beforeSave();
		
		if ((isset($this->data[$this->alias]['age'])) && (isset($this->data[$this->alias]['gender_id']))) {
			$this->data[$this->alias]['age_group_id'] = $this->getAgeGroup($this->data[$this->alias]['age'],$this->data[$this->alias]['gender_id']);
		}
		
	}
}
