<?php
App::uses('AppModel', 'Model');
/**
 * VolunteerTask Model
 *
 * @property VolunteerNeed $VolunteerNeed
 * @property VolunteerRegistration $VolunteerRegistration
 */
class VolunteerTask extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'VolunteerNeed' => array(
			'className' => 'VolunteerNeed',
			'foreignKey' => 'volunteer_task_id',
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
			'foreignKey' => 'volunteer_task_id',
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

}
