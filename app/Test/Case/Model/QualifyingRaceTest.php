<?php
App::uses('QualifyingRace', 'Model');

/**
 * QualifyingRace Test Case
 *
 */
class QualifyingRaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.qualifying_race',
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
		'app.race',
		'app.series',
		'app.distance',
		'app.experience',
		'app.test_swim',
		'app.test_swim_fee',
		'app.test_swim_registration',
		'app.qualifying_swim',
		'app.race_registration',
		'app.age_group',
		'app.result',
		'app.code',
		'app.codes_result',
		'app.shirt_size',
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
		$this->QualifyingRace = ClassRegistry::init('QualifyingRace');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QualifyingRace);

		parent::tearDown();
	}

}
