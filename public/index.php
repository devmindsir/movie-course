<?php
use App\Core\Authenticator;
use App\Core\Router;
use App\Core\Session;
use App\Helper\Cart;

@session_start();

require(__DIR__ . "/../config/config.php");

//!Autoload Class
require(BASE_PATH . 'vendor/autoload.php');

require(BASE_PATH . "App/Helper/global.php");

$cart=new Cart();
(new Authenticator)->check();

$url = currentUrl();
$router = new Router();
require(BASE_PATH . "routes/routes.php");

$method = $_POST['_method_'] ?? $_SERVER['REQUEST_METHOD'];

$router->checkRoute($url, $method);

Session::unFlash();
