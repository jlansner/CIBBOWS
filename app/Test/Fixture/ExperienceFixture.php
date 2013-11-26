<?php
/**
 * ExperienceFixture
 *
 */
class ExperienceFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'experience';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'distance' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '6,3'),
		'distance_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'meters' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
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
			'distance' => 1,
			'distance_id' => 1,
			'meters' => 1,
			'created' => '2013-06-26 18:55:53',
			'modified' => '2013-06-26 18:55:53'
		),
	);

}
