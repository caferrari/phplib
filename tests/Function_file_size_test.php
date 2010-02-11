<?php
require_once 'PHPUnit/Framework.php';

require_once dirname(__FILE__).'/../functions/file_size.php';

/**
 * Test class for slug function.
 */
class Function_file_sizeTest extends PHPUnit_Framework_TestCase {

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

	public function testSize() {

		$size = 465464646;

		$this->assertEquals(
			"443.90Mb",
			file_size($size)
		);
	}

}