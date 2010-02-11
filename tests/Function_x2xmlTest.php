<?php
require_once 'PHPUnit/Framework.php';

require_once dirname(__FILE__).'/../functions/x2xml.php';

/**
 * Test class for x2xml.
 */
class Function_x2xmlTest extends PHPUnit_Framework_TestCase {

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp() {

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown() {

	}

    public function testArrayString() {
		$array = array(
			'fruit' => 'banana'
		);

        $this->assertEquals(
                "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<response>\n\t<fruit>banana</fruit>\n</response>\n",
                x2xml($array)
        );
    }

	public function testArrayBooleans() {
		$array = array(
			'true' => true,
			'false' => false
		);
        $this->assertEquals(
                "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<response>\n\t<true>true</true>\n\t<false>false</false>\n</response>\n",
                x2xml($array)
        );
    }

	public function testNumbers() {
		$array = array(
			'zero' => 0,
			'one' => 1,
			'onedotfive' => 1.5,
			'minusten' => -10
		);
        $this->assertEquals(
                "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<response>\n\t<zero>0</zero>\n\t<one>1</one>\n\t<onedotfive>1.5</onedotfive>\n\t<minusten>-10</minusten>\n</response>\n",
                x2xml($array)
        );
    }

	public function testEmpty(){
		$array = array(
			'null' => null,
			'void' => '',
		);

		$this->assertEquals(
                "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<response>\n\t<null/>\n\t<void/>\n</response>\n",
                x2xml($array)
        );
	}
	
}