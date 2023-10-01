<?php

use Core\App;
use Core\Container;
use Core\DataBase;

$container = new Container;

$container->bind('Core\DataBase', function () {

    $config = require_once basePath('config.php');

    return new DataBase($config['database']);
});

App::setContainer($container);
