<?php
App::uses('GroupSwim', 'Model');

/**
 * GroupSwim Test Case
 *
 */
class GroupSwimTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.group_swim',
		'app.location',
		'app.clinic',
		'app.user',
		'app.gender',
		'app.clinic_registration',
		'app.qualifying_swim',
		'app.distance',
		'app.experience',
		'app.race',
		'app.series',
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
		'app.qualifying_race',
		'app.race_registration',
		'app.age_group',
		'app.result',
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
		$this->GroupSwim = ClassRegistry::init('GroupSwim');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GroupSwim);

		parent::tearDown();
	}

}
