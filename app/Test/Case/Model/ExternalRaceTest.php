<?php
App::uses('ExternalRace', 'Model');

/**
 * ExternalRace Test Case
 *
 */
class ExternalRaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.external_race'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ExternalRace = ClassRegistry::init('ExternalRace');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ExternalRace);

		parent::tearDown();
	}

}
