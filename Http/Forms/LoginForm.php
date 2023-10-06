<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'please provide a valid email address ';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'please provide a valid password';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($filed, $message)
    {
        $this->errors[$filed] = $message;
    }
}
