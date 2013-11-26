<?php
/**
 * ResultFixture
 *
 */
class ResultFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'time' => array('type' => 'time', 'null' => false, 'default' => null),
		'race_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'age_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'age' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'gender' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'place' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'age_place' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'time' => '18:56:05',
			'race_id' => 1,
			'age_group_id' => 1,
			'age' => 1,
			'gender' => 'Lorem ipsum dolor sit ame',
			'place' => 1,
			'age_place' => 1,
			'created' => '2013-06-26 18:56:05',
			'modified' => '2013-06-26 18:56:05'
		),
	);

}
