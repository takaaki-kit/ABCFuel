<?php
// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';

\Autoloader::add_classes(array(
    'Validation' => APPPATH.'classes/validation.php',
    'User' => APPPATH.'classes/repository/user.php',
    'LoginUser' => APPPATH.'classes/repository/login.php',
    'SignupUser' => APPPATH.'classes/repository/signup.php',
    'Message' => APPPATH.'classes/repository/message.php',
    'Controller_Base' => APPPATH.'classes/controller/base.php',
));

// Register the autoloader
\Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
\Fuel::$env = \Arr::get($_SERVER, 'FUEL_ENV', \Arr::get($_ENV, 'FUEL_ENV', \Fuel::DEVELOPMENT));

// Initialize the framework with the config file.
\Fuel::init('config.php');
