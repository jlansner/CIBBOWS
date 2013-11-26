<?php
/**
 * TestSwimFixture
 *
 */
class TestSwimFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'url_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'start_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'end_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'start_location' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'end_location' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'membership_level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'max_swimmers' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'course_map' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'body' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'distance' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '6,3'),
		'distance_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'meters' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'experience_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'title' => 'Lorem ipsum dolor sit amet',
			'url_title' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'date' => '2013-06-26',
			'start_time' => '18:56:09',
			'end_time' => '18:56:09',
			'start_location' => 1,
			'end_location' => 1,
			'membership_level_id' => 1,
			'max_swimmers' => 1,
			'course_map' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'distance' => 1,
			'distance_id' => 1,
			'meters' => 1,
			'experience_id' => 1,
			'created' => '2013-06-26 18:56:09',
			'modified' => '2013-06-26 18:56:09'
		),
	);

}
