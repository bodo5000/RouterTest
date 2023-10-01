<?php

session_start();

use Core\Router;

define("BASE_PATH", str_replace('\\', DIRECTORY_SEPARATOR,  __DIR__ . '/../'));

// var_dump(BASE_PATH);

require_once BASE_PATH . 'Core/functions.php';

// this method to autoload classes when its create object using namespace
spl_autoload_register(function ($class) {

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require_once basePath("{$class}.php");
});

require_once basePath('bootstrap.php');

$router = new Router;
$routes = require_once basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

// route($uri, $routes);