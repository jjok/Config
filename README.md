Config
======

A simple configuration class.

	$config = new jjok\Config\Config();
	$config->set('some_setting', 'Some Value');

	try {
		echo $config->get('some_setting');
		echo $config->get('fdg');
	}
	catch(\Exception $e) {
		echo $e;
	}