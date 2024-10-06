<?php

use core\Session;

@session_start();
require(__DIR__ . "/../core/config.php");
require(BASE_PATH . "core/global.php");
//!Autoload Class
spl_autoload_register(function ($class) {
  $className = str_replace('\\', '/', $class);
  require(BASE_PATH . $className . '.php');
});
$url = currentUrl();
$router = new core\Router();
require(BASE_PATH . "routes.php");

$method = $_POST['_method_'] ?? $_SERVER['REQUEST_METHOD'];
$router->checkRoute($url, $method);

Session::unFlash();
