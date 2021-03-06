<?php
App::uses('AppModel', 'Model');
/**
 * BoardMember Model
 *
 * @property User $User
 */
class BoardMember extends AppModel {

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
		'board_level_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			)
		)
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
		'BoardLevel' => array(
			'className' => 'BoardLevel',
			'foreignKey' => 'board_level_id'
		),
		'BoardTitle' => array(
			'className' => 'BoardTitle',
			'foreignKey' => 'board_title_id'
		)
	);
}
