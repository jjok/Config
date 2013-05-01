<?php

namespace jjok\Config;

/**
 * Exception thrown if Config::get is called with the name of a value which
 * has not been set.
 * @author Jonathan Jefferies (jjok)
 * @version 0.9.0
 */
class BadConfigurationException extends \UnexpectedValueException {}
