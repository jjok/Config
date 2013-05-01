<?php

require_once 'src/jjok/Config/BadConfigurationException.php';
require_once 'src/jjok/Config/Config.php';

class ConfigTest extends PHPUnit_Framework_TestCase {

	public function testConfigValuesCanBeSetAndGot() {
		$config = new \jjok\Config\Config();
		
		$test_object = new \jjok\Config\Config();
		$test_array = array(
			'some_test_stuff',
			'blah'
		);
		
		$config->set('a string', 'Some string value');
		$config->set('an integer', 1234567890);
		$config->set('a float', 12345.67890);
		$config->set('an array', $test_array);
		$config->set('an object', $test_object);

		$this->assertSame('Some string value', $config->get('a string'));
		$this->assertSame(1234567890, $config->get('an integer'));
		$this->assertSame(12345.67890, $config->get('a float'));
		$this->assertSame($test_array, $config->get('an array'));
		$this->assertSame($test_object, $config->get('an object'));
	}

	public function testExceptionThrownIfValueNotFound() {

		$config = new \jjok\Config\Config();
		
		try {
			$config->get('value that does not exist');
		}
		catch(\jjok\Config\BadConfigurationException $e) {
			$this->assertTrue(true);
		}
		catch(\Exception $e) {
			$this->assertTrue(false);
		}
	}
}
