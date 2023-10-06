<?php

use Core\Session;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require_once basePath("views/{$code}.php");

    die();
}

function authorize($condition, $status = 403)
{
    if (!$condition) {
        abort($status);
    }
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($path, $params = [])
{
    //extract the array to variables -> key is the varName , value is the value of that varName 
    extract($params);

    require_once basePath('views/' . $path);
}

// echo $_SERVER['REQUEST_URI'];
function redirect($path)
{
    header("Location: {$path}");
    exit();
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];

    session_regenerate_id(true);
}

function logout()
{
    Session::destroy();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}
