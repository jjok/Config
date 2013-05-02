<?php

namespace jjok\Config;

use jjok\Config\Exceptions\BadConfigurationException;

/**
 * 
 * @author Jonathan Jefferies (jjok)
 * @version 0.9.0
 */
class Config {

	/**
	 * Configured name-pair values.
	 * @var mixed[]
	 */
	protected $values = array();
	
	/**
	 * Get a configured value.
	 * @param string $key The name of the value to get.
	 * @return mixed
	 */
	public function get($key) {
		if(!array_key_exists($key, $this->values)) {
			throw new BadConfigurationException(sprintf('"%s" does not have a value configured.', $key));
		}
		
		return $this->values[$key];
	}

	/**
	 * Set a value.
	 * @param string $key An identifying name for the value.
	 * @param mixed $value The value.
	 */
	public function set($key, $value) {
		$this->values[$key] = $value;
	}
}
