<?php

require '../src/jjok/Config/Config.php';
require '../src/jjok/Config/Exceptions/BadConfigurationException.php';

use jjok\Config\Config;
use jjok\Config\Exceptions\BadConfigurationException;

$config = new Config();

# Set a value
$config->set('some_setting', 'Some Value');

try {
	# Get a value that has been set
	echo $config->get('some_setting');
	
	# Trying to get a value that hasn't been set throws an exception
	echo $config->get('some_missing_setting');
}
catch(BadConfigurationException $e) {
	echo $e->getMessage();
}
