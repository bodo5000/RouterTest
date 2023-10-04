<?php

// DAY AND DUMP FUNCTION
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

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];

    session_destroy();

    // clear the cookies that exists in the browser
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
}
