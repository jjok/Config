<?php

require '../src/jjok/Config/Config.php';
require '../src/jjok/Config/BadConfigurationException.php';

$config = new jjok\Config\Config();
$config->set('some_setting', 'Some Value');

try {
	echo $config->get('some_setting');
	echo $config->get('some_missing_setting');
}
catch(\jjok\Config\BadConfigurationException $e) {
	echo $e;
}