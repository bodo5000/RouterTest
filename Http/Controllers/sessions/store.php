<?php

use Core\Authenticator;

use Http\Forms\LoginForm;

// validate the forms inputs
$form = LoginForm::validate(
    $attrs = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]
);

// auth
$auth = new Authenticator;

// SignedIn
$signedIn = $auth->attempt(
    $attrs['email'],
    $attrs['password']
);

if (!$signedIn) {
    $form->error(
        'email',
        'no matching account found for that email address or password wrong '
    )->throw();
}

redirect('/');
