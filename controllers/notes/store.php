<?php

use Core\Validator;
use Core\App;
use Core\DataBase;


$db = App::resolve(DataBase::class);

$currentUserId = 1;

// validate the require of note
if (!Validator::string($_POST['note'], 1, 1000)) {
    $errors['note'] = 'A Note is required and no more than 1000 characters';
}


if (!empty($errors)) {
    return view(
        'notes/create.view.php',
        [
            'heading' => 'Create Note',
            'errors' => $errors,
        ]
    );
}

$db->query(
    "INSERT INTO notes(body,user_id) VALUES(:body, :user_id)",
    [
        'body' => $_POST['note'],
        'user_id' => 1
    ]
);

header('Location: /notes');
exit();
