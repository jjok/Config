<?php

/**
 * Copyright (c) 2013 Jonathan Jefferies
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 */

namespace jjok\Config;

use jjok\Config\Exceptions\BadConfigurationException;

/**
 * Stores configuration values.
 * @author Jonathan Jefferies (jjok)
 * @version 1.0.0
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
	 * @throws BadConfigurationException
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
	 * @return Config
	 */
	public function set($key, $value) {
		$this->values[$key] = $value;
		
		return $this;
	}
	
	/**
	 * Create a new config instance.
	 * @return Config
	 */
	public static function create() {
		return new static();
	}
}
