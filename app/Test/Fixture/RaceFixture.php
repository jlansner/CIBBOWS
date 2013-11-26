<?php
/**
 * RaceFixture
 *
 */
class RaceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'url_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'series_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'checkin_start_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'checkin_end_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'start_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'end_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'start_location' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'end_location' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'checkin_location' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'postrace_location' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'membership_level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'minimum_age' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'max_swimmers' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'max_volunteers' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'logo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'course_map' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'body' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'distance' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '6,3'),
		'distance_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'meters' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'experience_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'lft' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'rght' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'parent_id' => 1,
			'user_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'url_title' => 'Lorem ipsum dolor sit amet',
			'series_id' => 1,
			'date' => '2013-06-26',
			'checkin_start_time' => '18:56:04',
			'checkin_end_time' => '18:56:04',
			'start_time' => '18:56:04',
			'end_time' => '18:56:04',
			'start_location' => 1,
			'end_location' => 1,
			'checkin_location' => 1,
			'postrace_location' => 1,
			'membership_level_id' => 1,
			'minimum_age' => 1,
			'max_swimmers' => 1,
			'max_volunteers' => 1,
			'logo' => 'Lorem ipsum dolor sit amet',
			'course_map' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'distance' => 1,
			'distance_id' => 1,
			'meters' => 1,
			'experience_id' => 1,
			'created' => '2013-06-26 18:56:04',
			'modified' => '2013-06-26 18:56:04',
			'lft' => 1,
			'rght' => 1
		),
	);

}
