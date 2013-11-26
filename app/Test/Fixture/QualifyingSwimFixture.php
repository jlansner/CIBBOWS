<?php
/**
 * QualifyingSwimFixture
 *
 */
class QualifyingSwimFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'date' => array('type' => 'date', 'null' => true, 'default' => null),
		'url' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'distance' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '6,3'),
		'distance_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'meters' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'certification' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'approved' => array('type' => 'boolean', 'null' => false, 'default' => null),
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
			'date' => '2013-06-26',
			'url' => 'Lorem ipsum dolor sit amet',
			'distance' => 1,
			'distance_id' => 1,
			'meters' => 1,
			'certification' => 'Lorem ipsum dolor sit amet',
			'approved' => 1,
			'created' => '2013-06-26 18:56:02',
			'modified' => '2013-06-26 18:56:02'
		),
	);

}
