<?php
App::uses('Gender', 'Model');

/**
 * Gender Test Case
 *
 */
class GenderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gender',
		'app.clinic_registration',
		'app.user',
		'app.shirt_size',
		'app.race_registration',
		'app.race',
		'app.series',
		'app.membership_level',
		'app.clinic_fee',
		'app.clinic',
		'app.location',
		'app.group_swim',
		'app.event',
		'app.permanent',
		'app.membership_fee',
		'app.membership',
		'app.race_fee',
		'app.test_swim_fee',
		'app.test_swim',
		'app.distance',
		'app.experience',
		'app.qualifying_race',
		'app.test_swim_registration',
		'app.qualifying_swim',
		'app.result',
		'app.age_group',
		'app.code',
		'app.codes_result',
		'app.route',
		'app.volunteer_need',
		'app.volunteer_task',
		'app.volunteer_registration',
		'app.group',
		'app.address',
		'app.board_member',
		'app.content',
		'app.emergency_contact',
		'app.external_profile',
		'app.post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Gender = ClassRegistry::init('Gender');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gender);

		parent::tearDown();
	}

}
