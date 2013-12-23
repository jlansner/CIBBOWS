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
		parent::beforeSave();

		if ((isset($this->data['Experience']['time'])) && (substr_count($this->data['Experience']['time'],":") == 1)) {
			$this->data['Experience']['time'] = "00:" . $this->data['Experience']['time'];
		}		
	
		$number = ($this->data['Experience']['distance_number'] + 0);

		$distance_unit = $this->Distance->find(
			'first',
			array(
				'conditions' => array(
					'Distance.id' => $this->data['Experience']['distance_id']
				)
			)
		);
		
		$time = "";
		
		if ($this->data['Experience']['time'] != null) {
			$time = " under " . ltrim($this->data['Experience']['time'],"0:");
		}
		
		$this->data['Experience']['name'] = $number . $distance_unit['Distance']['abbreviation'] . $time;

		return true;
	}

}
