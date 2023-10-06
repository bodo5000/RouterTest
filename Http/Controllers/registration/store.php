<?php

use Core\App;
use Core\DataBase;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

// validate the forms inputs
if (!Validator::email($email)) {
    $errors['email'] = 'please provide a valid email address ';
}

if (!Validator::string($password, 7, 10)) {
    $errors['password'] = 'password must be between 7 and 10 characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', ['errors' => $errors]);
}


$db = App::resolve(DataBase::class);
// check if the account already exists
$user = $db->query(
    "SELECT * FROM users WHERE email = :email",
    [
        'email' => $email,
    ]
)->find();


//if yes redirect to login 
if ($user) {
    header('Location /');
    exit;
} else {
    // if no create the account and save it into database, log the user in and redirect
    $db->query('INSERT INTO users(email,password) VALUES(:email,:password)', [
        'email' => $email,
        'password' => password_hash((string)$password, PASSWORD_BCRYPT), // for encrypt password
    ]);
}

// mark this user has been logged in
login(['email' => $email]);
header('Location: /');
exit;
