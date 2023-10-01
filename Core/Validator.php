<?php

namespace Core;

class Validator
{
    // when we have pure function [that's mean not depend on any thing like $this or any other class]
    // best practice to make it static function
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return  filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
