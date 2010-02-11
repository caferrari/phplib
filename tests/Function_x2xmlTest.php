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
	protected function setUp() { }

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @access protected
	 */
	protected function tearDown() { }

	public function testArrayString() {
		$array = array(
			'fruit' => 'banana'
		);

		$this->assertEquals(
			"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n\t<fruit>banana</fruit>\n</root>\n",
			x2xml($array)
		);
	}

	public function testArrayBooleans() {
		$array = array(
			'true' => true,
			'false' => false
		);
		$this->assertEquals(
			"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n\t<true>true</true>\n\t<false>false</false>\n</root>\n",
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
			"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n\t<zero>0</zero>\n\t<one>1</one>\n\t<onedotfive>1.5</onedotfive>\n\t<minusten>-10</minusten>\n</root>\n",
			x2xml($array)
		);

	}

	public function testEmpty(){
		$array = array(
			'null' => null,
			'void' => '',
		);

		$this->assertEquals(
				"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n\t<null/>\n\t<void/>\n</root>\n",
				x2xml($array)
		);
	}

	public function testSubArray(){
		$array = array(
			'fruits' => array('banana', 'apple'),
			'car' => array('color' => 'red', 'dors' => 2)
		);

		$this->assertEquals(
				"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n\t<fruits>\n\t\t<item>banana</item>\n\t\t<item>apple</item>\n\t</fruits>\n\t<car>\n\t\t<color>red</color>\n\t\t<dors>2</dors>\n\t</car>\n</root>\n",
				x2xml($array)
		);
	}

	public function testObject(){

		$obj = new stdClass();
		$obj->name = 'Carlos';

		$this->assertEquals(
				"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n\t<name>Carlos</name>\n</root>\n",
				x2xml($obj)
		);

	}

	public function testObjectWithArray(){
		$obj = new stdClass();
		$obj->name = array('first' => 'Carlos', 'last' => 'Ferrari');

		$this->assertEquals(
				"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n\t<name>\n\t\t<first>Carlos</first>\n\t\t<last>Ferrari</last>\n\t</name>\n</root>\n",
				x2xml($obj)
		);
	}

	public function testObjectWithObject(){
		$obj = new stdClass();
		$name = new stdClass();
		$name->first = 'Carlos';
		$name->last = 'Ferrari';
		$obj->name = $name;
		$this->assertEquals(
				"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n\t<name>\n\t\t<first>Carlos</first>\n\t\t<last>Ferrari</last>\n\t</name>\n</root>\n",
				x2xml($obj)
		);
	}

	public function testSpecialChars(){
		$obj = new stdClass();
		$obj->name = 'Carlos André Ferrari';

		$this->assertEquals(
				"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n\t<name><![CDATA[Carlos André Ferrari]]></name>\n</root>\n",
				x2xml($obj)
		);
	}

}