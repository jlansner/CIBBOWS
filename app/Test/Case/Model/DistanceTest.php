<?php
App::uses('Distance', 'Model');

/**
 * Distance Test Case
 *
 */
class DistanceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.distance',
		'app.experience',
		'app.race',
		'app.user',
		'app.gender',
		'app.clinic_registration',
		'app.clinic',
		'app.location',
		'app.group_swim',
		'app.membership_level',
		'app.clinic_fee',
		'app.event',
		'app.permanent',
		'app.membership_fee',
		'app.membership',
		'app.race_fee',
		'app.test_swim_fee',
		'app.test_swim',
		'app.test_swim_registration',
		'app.qualifying_swim',
		'app.race_registration',
		'app.age_group',
		'app.result',
		'app.code',
		'app.codes_result',
		'app.qualifying_race',
		'app.shirt_size',
		'app.group',
		'app.address',
		'app.board_member',
		'app.content',
		'app.emergency_contact',
		'app.external_profile',
		'app.post',
		'app.volunteer_registration',
		'app.volunteer_task',
		'app.volunteer_need',
		'app.series',
		'app.route'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Distance = ClassRegistry::init('Distance');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Distance);

		parent::tearDown();
	}

}
