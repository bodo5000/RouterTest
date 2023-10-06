<?php

session_start();

use Core\Router;
use Core\Session;
use Core\ValidationException;

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

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);
    return redirect($router->previousUrl());
}

// we ending the errors session after the end of our router
// just we unset the values and not destroy session cause we don't want to create it every time we have validationError
Session::unFlash();

// route($uri, $routes);