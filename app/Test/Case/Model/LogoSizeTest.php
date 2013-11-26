<?php
App::uses('LogoSize', 'Model');

/**
 * LogoSize Test Case
 *
 */
class LogoSizeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.logo_size',
		'app.sponsor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LogoSize = ClassRegistry::init('LogoSize');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LogoSize);

		parent::tearDown();
	}

}
