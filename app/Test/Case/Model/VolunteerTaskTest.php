<?php
App::uses('VolunteerTask', 'Model');

/**
 * VolunteerTask Test Case
 *
 */
class VolunteerTaskTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.volunteer_task',
		'app.volunteer_need',
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
		'app.distance',
		'app.experience',
		'app.qualifying_race',
		'app.race_registration',
		'app.age_group',
		'app.result',
		'app.test_swim_registration',
		'app.qualifying_swim',
		'app.code',
		'app.codes_result',
		'app.shirt_size',
		'app.route',
		'app.group',
		'app.address',
		'app.board_member',
		'app.content',
		'app.emergency_contact',
		'app.external_profile',
		'app.post',
		'app.volunteer_registration',
		'app.series'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VolunteerTask = ClassRegistry::init('VolunteerTask');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VolunteerTask);

		parent::tearDown();
	}

}
