<?php

if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('ROOT')) {
	define('ROOT', dirname(dirname(dirname(__FILE__))));
}

if (!defined('APP_DIR')) {
	define('APP_DIR', basename(dirname(dirname(__FILE__))));
}

//$vendorPath = ROOT . DS . APP_DIR . DS . 'Vendor' . DS . 'cakephp' . DS . 'cakephp' . DS . 'lib';
//$dispatcher = 'Cake' . DS . 'Console' . DS . 'ShellDispatcher.php';
$newPath = ROOT . DS . 'cakephp' . DS . 'lib';
if (!defined('CAKE_CORE_INCLUDE_PATH'))
	define('CAKE_CORE_INCLUDE_PATH', $newPath);
}

if (!defined('WEBROOT_DIR')) {
	define('WEBROOT_DIR', basename(dirname(__FILE__)));
}
if (!defined('WWW_ROOT')) {
	define('WWW_ROOT', dirname(__FILE__) . DS);
}

if (php_sapi_name() === 'cli-server') {
	if ($_SERVER['REQUEST_URI'] !== '/' && file_exists(WWW_ROOT . $_SERVER['PHP_SELF'])) {
		return false;
	}
	$_SERVER['PHP_SELF'] = '/' . basename(__FILE__);
}

if (!defined('CAKE_CORE_INCLUDE_PATH')) {
	if (function_exists('ini_set')) {
		ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'));
	}
	if (!include 'Cake' . DS . 'bootstrap.php') {
		$failed = true;
	}
} else {
	if (!include CAKE_CORE_INCLUDE_PATH . DS . 'Cake' . DS . 'bootstrap.php') {
		$failed = true;
	}
}
if (!empty($failed)) {
	trigger_error("CakePHP core could not be found. Check the value of CAKE_CORE_INCLUDE_PATH in APP/webroot/index.php. It should point to the directory containing your " . DS . "cake core directory and your " . DS . "vendors root directory.", E_USER_ERROR);
}

App::uses('Dispatcher', 'Routing');

$Dispatcher = new Dispatcher();
$Dispatcher->dispatch(
	new CakeRequest(),
	new CakeResponse()
);
