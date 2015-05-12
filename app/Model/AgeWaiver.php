<?php
App::uses('AppModel', 'Model');
/**
 * AgeGroup Model
 *
 * @property RaceRegistration $RaceRegistration
 * @property Result $Result
 */
class AgeWaiver extends AppModel {

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
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		)
	);
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array();

}
