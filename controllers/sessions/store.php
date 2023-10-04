<?php

use Core\App;
use Core\DataBase;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
$db = App::resolve(DataBase::class);

// validate the forms inputs
if (!Validator::email($email)) {
    $errors['email'] = 'please provide a valid email address ';
}

if (!Validator::string($password)) {
    $errors['password'] = 'please provide a valid password';
}

if (!empty($errors)) {
    return view('sessions/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query(
    "SELECT * FROM users WHERE email= :email",
    [
        'email' => $email
    ]
)->find();

if ($user) {

    if (password_verify($password, $user['password']) ?? 'no User') {
        login(['email' => $email]);

        header('Location: /');
        exit();
    }
}



return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'no matching account found for that email address or password wrong'
    ]
]);
