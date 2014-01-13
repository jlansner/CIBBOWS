<?php
App::uses('AppModel', 'Model');
/**
 * Donation Model
 *
 * @property User $User
 */
class Donation extends AppModel {

    public $actsAs = array('Containable');


	public $validate = array(
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			)
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			)
		),
		'email' => array(
			'email' => array(
				'rule' => 'email',
				'message' => 'Please enter a valid email address'
			),
		),
		'amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
			'notempty' => array(
				'rule' => array('notempty'),
			)
		)		
	);
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
		)
	);
}
