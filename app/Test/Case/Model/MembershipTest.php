<?php
App::uses('Membership', 'Model');

/**
 * Membership Test Case
 *
 */
class MembershipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.membership',
		'app.membership_level',
		'app.clinic_fee',
		'app.clinic',
		'app.user',
		'app.gender',
		'app.clinic_registration',
		'app.qualifying_swim',
		'app.distance',
		'app.experience',
		'app.race',
		'app.series',
		'app.race_fee',
		'app.race_registration',
		'app.age_group',
		'app.result',
		'app.test_swim_registration',
		'app.test_swim',
		'app.test_swim_fee',
		'app.qualifying_race',
		'app.code',
		'app.codes_result',
		'app.shirt_size',
		'app.volunteer_need',
		'app.volunteer_task',
		'app.volunteer_registration',
		'app.route',
		'app.group',
		'app.address',
		'app.board_member',
		'app.content',
		'app.permanent',
		'app.emergency_contact',
		'app.external_profile',
		'app.post',
		'app.location',
		'app.group_swim',
		'app.event',
		'app.membership_fee'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Membership = ClassRegistry::init('Membership');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Membership);

		parent::tearDown();
	}

}
