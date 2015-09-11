<?php
App::uses('OrgGroup', 'Model');

/**
 * OrgGroup Test Case
 */
class OrgGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.org_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrgGroup = ClassRegistry::init('OrgGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrgGroup);

		parent::tearDown();
	}

}
