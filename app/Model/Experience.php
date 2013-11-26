<?php
App::uses('AppModel', 'Model');
/**
 * Experience Model
 *
 * @property Distance $Distance
 * @property Race $Race
 * @property TestSwim $TestSwim
 */
class Experience extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'experience';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Distance' => array(
			'className' => 'Distance',
			'foreignKey' => 'distance_id',
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
	public $hasMany = array(
		'Race' => array(
			'className' => 'Race',
			'foreignKey' => 'experience_id',
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
		'TestSwim' => array(
			'className' => 'TestSwim',
			'foreignKey' => 'experience_id',
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

	public function beforeSave($options = array()) {
	
		$number = trim($this->data['Experience']['distance_number'],".0");

		$distance_unit = $this->Distance->find(
			'first',
			array(
				'conditions' => array(
					'Distance.id' => $this->data['Experience']['distance_id']
				)
			)
		);

		$unit = ucfirst($distance_unit['Distance']['name']);
		if ($number !== "1") {
			$unit .= "s";
		}
		
		
		$this->data['Experience']['name'] = $number . ' ' . $unit;
	}
}
