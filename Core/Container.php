<?php

namespace Core;

use Exception;

class Container
{
    protected $bindings = [];
    // like add
    public function bind(string $key, callable $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("no matching found for {$key}");
        }


        $resolver = $this->bindings[$key];

        return  call_user_func($resolver);
    }
}
