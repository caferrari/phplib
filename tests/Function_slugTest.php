<?php
require_once 'PHPUnit/Framework.php';

require_once dirname(__FILE__).'/../functions/slug.php';

/**
 * Test class for slug function.
 */
class Function_slugTest extends PHPUnit_Framework_TestCase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @access protected
	 */
	protected function setUp() { }

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @access protected
	 */
	protected function tearDown() { }

	public function testSlug() {

		$str = 'Carlos André Ferrari';

		$this->assertEquals(
			"carlos-andre-ferrari",
			slug($str)
		);
	}

	public function testSpecialChars() {

		$str = 'ççºº~ ~test/°';

		$this->assertEquals(
			"ccoo-test-o",
			slug($str)
		);
	}
}