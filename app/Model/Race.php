<?php
App::uses('AppModel', 'Model');
/**
 * Race Model
 *
 * @property Race $ParentRace
 * @property User $User
 * @property Series $Series
 * @property MembershipLevel $MembershipLevel
 * @property Distance $Distance
 * @property Experience $Experience
 * @property RaceFee $RaceFee
 * @property RaceRegistration $RaceRegistration
 * @property Race $ChildRace
 * @property Result $Result
 * @property VolunteerNeed $VolunteerNeed
 * @property VolunteerRegistration $VolunteerRegistration
 */
class Race extends AppModel {
    public $actsAs = array('Containable','Tree');

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
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'url_title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'series_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'start_location' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end_location' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'checkin_location' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'postrace_location' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'membership_level_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'distance_number' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'distance_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'experience_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lft' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rght' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
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
		'ParentRace' => array(
			'className' => 'Race',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => array('User.name','User.id'),
			'order' => ''
		),
		'Series' => array(
			'className' => 'Series',
			'foreignKey' => 'series_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MembershipLevel' => array(
			'className' => 'MembershipLevel',
			'foreignKey' => 'membership_level_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Distance' => array(
			'className' => 'Distance',
			'foreignKey' => 'distance_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Experience' => array(
			'className' => 'Experience',
			'foreignKey' => 'experience_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StartLocation' => array(
			'className' => 'Location',
			'foreignKey' => 'start_location'
		),
		'EndLocation' => array(
			'className' => 'Location',
			'foreignKey' => 'end_location'
		),
		'CheckinLocation' => array(
			'className' => 'Location',
			'foreignKey' => 'checkin_location'
		),
		'PostraceLocation' => array(
			'className' => 'Location',
			'foreignKey' => 'postrace_location'
		),
	);
	
	public $hasOne = array(
		'CurrentMemberRaceFee' => array(
			'className' => 'RaceFee',
			'foreignKey' => 'race_id',
			'dependent' => false,
			'conditions' => array(
				'CurrentMemberRaceFee.membership_level_id' => 1,
				'CurrentMemberRaceFee.start_date <= DATE(NOW())',
				'CurrentMemberRaceFee.end_date >= DATE(NOW())'
			),
			'fields' => 'CurrentMemberRaceFee.price',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),	
		'CurrentNonMemberRaceFee' => array(
			'className' => 'RaceFee',
			'foreignKey' => 'race_id',
			'dependent' => false,
			'conditions' => array(
				'OR' => array(
					array('CurrentNonMemberRaceFee.membership_level_id' => 0),
					array('CurrentNonMemberRaceFee.membership_level_id' => null),
				),
				'CurrentNonMemberRaceFee.start_date <= DATE(NOW())',
				'CurrentNonMemberRaceFee.end_date >= DATE(NOW())'
			),
			'fields' => 'CurrentNonMemberRaceFee.price',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),	
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AgeWaiver' => array(
			'className' => 'AgeWaiver',
			'foreignKey' =>'race_id'
		),
		'Discount' => array(
			'className' => 'Discount',
			'foreignKey' => 'race_id',
		),
		'NonMemberRaceFee' => array(
			'className' => 'RaceFee',
			'foreignKey' => 'race_id',
			'dependent' => false,
			'conditions' => array(
				'OR' => array(
					array('NonMemberRaceFee.membership_level_id' => 0),
					array('NonMemberRaceFee.membership_level_id' => null),
				)
			),
			'fields' => '',
			'order' => 'start_date',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'MemberRaceFee' => array(
			'className' => 'RaceFee',
			'foreignKey' => 'race_id',
			'dependent' => false,
			'conditions' => array(
				'MemberRaceFee.membership_level_id' => 1
			),
			'fields' => '',
			'order' => 'start_date',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'RaceRegistration' => array(
			'className' => 'RaceRegistration',
			'foreignKey' => 'race_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'last_name ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ChildRaceRegistration' => array(
			'className' => 'RaceRegistration',
			'foreignKey' => 'child_race_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'last_name ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ChildRace' => array(
			'className' => 'Race',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Result' => array(
			'className' => 'Result',
			'foreignKey' => 'race_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'VolunteerNeed' => array(
			'className' => 'VolunteerNeed',
			'foreignKey' => 'race_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'VolunteerRegistration' => array(
			'className' => 'VolunteerRegistration',
			'foreignKey' => 'race_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $virtualFields = array(
//		'displayName' => "CONCAT(Race.title, ' - ', Race.date)"
	); 
	
//	public $displayField = 'displayName';
}
?>