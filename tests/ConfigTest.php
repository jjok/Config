<?php

require_once 'src/jjok/Config/Config.php';
require_once 'src/jjok/Config/Exceptions/BadConfigurationException.php';

class MockConfig extends \jjok\Config\Config {}

class ConfigTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \jjok\Config\Config::__construct
	 */
	public function testConstructorParamSetsValues() {
		$config = new \jjok\Config\Config(array(
			'test name 1' => 'test value 1',
			'test name 2' => 'test value 2'
		));

		$this->assertSame('test value 1', $config->get('test name 1'));
		$this->assertSame('test value 2', $config->get('test name 2'));
	}

	/**
	 * @covers \jjok\Config\Config::set
	 */
	public function testSetReturnsSelf() {
		$config = new \jjok\Config\Config();
		
		$this->assertInstanceOf('jjok\Config\Config',
			$config->set('test1', 'test1')
		);
		$this->assertInstanceOf('jjok\Config\Config',
			$config->set('test2', 'test2')
				   ->set('test3', 'test3')
		);
	}
	
	/**
	 * @covers \jjok\Config\Config::get
	 * @covers \jjok\Config\Config::set
	 */
	public function testSetValuesCanBeGot() {
		$config = new \jjok\Config\Config();

		$test_string = 'Some string value';
		$test_integer = 1234567890;
		$test_float = 12345.67890;
		$test_object = new \jjok\Config\Config();
		$test_array = array(
			'some_test_stuff',
			'blah'
		);

		$config->set('a string', $test_string);
		
		$config->set('an integer', $test_integer)
		       ->set('a float', $test_float)
		       ->set('an array', $test_array)
		       ->set('an object', $test_object);

		$this->assertSame($test_string, $config->get('a string'));
		$this->assertSame($test_integer, $config->get('an integer'));
		$this->assertSame($test_float, $config->get('a float'));
		$this->assertSame($test_array, $config->get('an array'));
		$this->assertSame($test_object, $config->get('an object'));
	}

	/**
	 * @covers \jjok\Config\Config::create
	 */
	public function testInstanceOfConfigCanBeStaticallyCreated() {
		$this->assertInstanceOf('jjok\Config\Config', \jjok\Config\Config::create());
		$this->assertInstanceOf('MockConfig', MockConfig::create());
	}

	/**
	 * @expectedException \jjok\Config\Exceptions\BadConfigurationException
	 * @covers \jjok\Config\Config::get
	 */
	public function testExceptionIsThrownIfValueNotFound() {
		$config = new \jjok\Config\Config();
		$config->get('value that does not exist');
	}
}
