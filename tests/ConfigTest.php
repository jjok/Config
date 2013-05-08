<?php

require_once 'src/jjok/Config/Config.php';
require_once 'src/jjok/Config/Exceptions/BadConfigurationException.php';

class MockConfig extends \jjok\Config\Config {}

class ConfigTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \jjok\Config\Config::get
	 * @covers \jjok\Config\Config::set
	 */
	public function testConfigValuesCanBeSetAndGot() {
		$config = new \jjok\Config\Config();

		$test_integer = 1234567890;
		$test_float = 12345.67890;
		$test_object = new \jjok\Config\Config();
		$test_array = array(
			'some_test_stuff',
			'blah'
		);

		$this->assertInstanceOf('jjok\Config\Config',
			$config->set('a string', 'Some string value')
		);
		$this->assertInstanceOf('jjok\Config\Config',
			$config->set('an integer', $test_integer)
				   ->set('a float', $test_float)
				   ->set('an array', $test_array)
			       ->set('an object', $test_object)
		);

		$this->assertSame('Some string value', $config->get('a string'));
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
	 * @covers \jjok\Config\Config::get
	 */
	public function testExceptionIsThrownIfValueNotFound() {

		$config = new \jjok\Config\Config();
		
		try {
			$config->get('value that does not exist');
		}
		catch(\jjok\Config\Exceptions\BadConfigurationException $e) {
			$this->assertTrue(true);
		}
		catch(\Exception $e) {
			$this->assertTrue(false);
		}
	}
}
