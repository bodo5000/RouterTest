<?php

namespace Core\Middleware;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Exception;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        // if the key not exists
        $middleware = static::MAP[$key] ?? false;

        // if we call undefined key on routes.php middleware
        if (!$middleware) {
            throw new Exception('no matching middleware');
        }
        (new $middleware)->handle();
    }
}
