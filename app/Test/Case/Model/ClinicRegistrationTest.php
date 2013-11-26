<?php
App::uses('ClinicRegistration', 'Model');

/**
 * ClinicRegistration Test Case
 *
 */
class ClinicRegistrationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.clinic_registration',
		'app.user',
		'app.gender',
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
		'app.shirt_size',
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
		$this->ClinicRegistration = ClassRegistry::init('ClinicRegistration');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClinicRegistration);

		parent::tearDown();
	}

}
