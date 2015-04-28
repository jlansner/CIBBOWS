<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property MembershipLevel $MembershipLevel
 */
class Event extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'permanent' => array(
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
		'teaser' => array(),
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
		'location' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		'creator' => array(
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
		'MembershipLevel' => array(
			'className' => 'MembershipLevel',
			'foreignKey' => 'membership_level_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasOne = array(
		'CurrentMemberEventFee' => array(
			'className' => 'EventFee',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => array(
				'CurrentMemberEventFee.membership_level_id' => 1,
				'CurrentMemberEventFee.start_date <= DATE(NOW())',
				'CurrentMemberEventFee.end_date >= DATE(NOW())'
			),
			'fields' => 'CurrentMemberEventFee.price',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),	
		'CurrentNonMemberEventFee' => array(
			'className' => 'EventFee',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => array(
				'OR' => array(
					array('CurrentNonMemberEventFee.membership_level_id' => 0),
					array('CurrentNonMemberEventFee.membership_level_id' => null),
				),
				'CurrentNonMemberEventFee.start_date <= DATE(NOW())',
				'CurrentNonMemberEventFee.end_date >= DATE(NOW())'
			),
			'fields' => 'CurrentNonMemberEventFee.price',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),	
	);

	public $hasMany = array(
		'NonMemberEventFee' => array(
			'className' => 'EventFee',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => array(
				'OR' => array(
					array('NonMemberEventFee.membership_level_id' => 0),
					array('NonMemberEventFee.membership_level_id' => null),
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
		'MemberEventFee' => array(
			'className' => 'EventFee',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => array(
				'MemberEventFee.membership_level_id' => 1
			),
			'fields' => '',
			'order' => 'start_date',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EventRegistration' => array(
			'className' => 'EventRegistration',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'last_name ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
