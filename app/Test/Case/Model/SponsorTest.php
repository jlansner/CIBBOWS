<?php
App::uses('Sponsor', 'Model');

/**
 * Sponsor Test Case
 *
 */
class SponsorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sponsor',
		'app.logo_size'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sponsor = ClassRegistry::init('Sponsor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sponsor);

		parent::tearDown();
	}

}
