<?php
/**
 * TestSwimFeeFixture
 *
 */
class TestSwimFeeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'test_swim_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'start_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'end_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '7,2'),
		'priority' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'membership_level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'test_swim_id' => 1,
			'start_date' => '2013-06-26',
			'end_date' => '2013-06-26',
			'price' => 1,
			'priority' => 1,
			'membership_level_id' => 1,
			'created' => '2013-06-26 18:56:08',
			'modified' => '2013-06-26 18:56:08'
		),
	);

}
