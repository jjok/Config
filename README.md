Config
======

[![Build Status](https://travis-ci.org/jjok/Config.png)](https://travis-ci.org/jjok/Config)

A simple configuration class.

Example
-------

	$config = new jjok\Config\Config();
	
	# Set a value
	$config->set('some_setting', 'Some Value');

	try {
		# Get a value that has been set
		echo $config->get('some_setting');
	
		# Trying to get a value that hasn't been set throws and exception
		echo $config->get('fdg');
	}
	catch(\Exception $e) {
		echo $e->getMessage();
	}


Run tests
---------

	phpunit


Copyright (c) 2013 Jonathan Jefferies
