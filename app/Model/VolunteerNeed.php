<?php
App::uses('AppModel', 'Model');
/**
 * VolunteerNeed Model
 *
 * @property VolunteerTask $VolunteerTask
 * @property Race $Race
 */
class VolunteerNeed extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'VolunteerTask' => array(
			'className' => 'VolunteerTask',
			'foreignKey' => 'volunteer_task_id',
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
}
