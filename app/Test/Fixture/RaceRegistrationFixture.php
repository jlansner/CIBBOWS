<?php
/**
 * RaceRegistrationFixture
 *
 */
class RaceRegistrationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'race_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'age' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'gender_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'age_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'qualifying_swim_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'qualifying_race_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'result_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'payment' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'approved' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'shirt_size_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'race_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'age' => 1,
			'gender_id' => 1,
			'age_group_id' => 1,
			'qualifying_swim_id' => 1,
			'qualifying_race_id' => 1,
			'result_id' => 1,
			'payment' => 1,
			'approved' => 1,
			'shirt_size_id' => 1,
			'created' => '2013-06-26 18:56:04',
			'modified' => '2013-06-26 18:56:04'
		),
	);

}
