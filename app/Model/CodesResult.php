<?php
App::uses('AppModel', 'Model');
/**
 * CodesResult Model
 *
 * @property Code $Code
 * @property Result $Result
 */
class CodesResult extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'code_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'result_id' => array(
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
		'Code' => array(
			'className' => 'Code',
			'foreignKey' => 'code_id',
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
}
