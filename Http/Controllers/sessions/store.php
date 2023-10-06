<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm;

// validate the forms inputs
if ($form->validate($email, $password)) {
    // auth
    $auth = new Authenticator;

    if ($auth->attempt($email, $password)) {

        redirect('/');
    }

    $form->error('email', 'no matching account found for that email address or password wrong ');
}


Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $_POST['email']
]);

redirect('/login');
// return view('sessions/create.view.php', [

//     'errors' => [
//         'email' => $form->errors(),
//     ]
// ]);
