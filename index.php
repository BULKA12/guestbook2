<?php

ini_set('display_error', 1);
error_reporting(E_ALL);

session_start();

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/Router/Router.php');
require_once(ROOT.'/db/db.php');

$routes = new Router;
$routes->run();