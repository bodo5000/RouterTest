<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;


class LoginForm
{
    public array $attrs;
    protected $errors = [];

    public function __construct($attrs)
    {
        $this->attrs = $attrs;

        if (!Validator::email($attrs['email'])) {
            $this->errors['email'] = 'please provide a valid email address ';
        }

        if (!Validator::string($attrs['password'])) {
            $this->errors['password'] = 'please provide a valid password';
        }
    }

    public static function validate($attrs)
    {
        $instants = new static($attrs);

        return $instants->failed() ? $instants->throw() : $instants;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attrs);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($filed, $message)
    {
        $this->errors[$filed] = $message;

        return $this;
    }
}
