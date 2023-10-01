<?php

use Core\App;
use Core\DataBase;
use Core\Validator;

// find the corresponding note
$db = App::resolve(DataBase::class);

$currentUserId = 1;
$errors = [];

$note = $db->query(
    "SELECT * FROM notes WHERE id =:id",
    [
        'id' => $_POST['id']
    ]
)->fetchOrFail();


// authorize the current user can edit the note
authorize($note['user_id'] === $currentUserId);

// validate the form
if (!Validator::string($_POST['note'], 1, 1000)) {
    $errors['note'] = 'A Note is required and no more than 1000 characters';
}

// if no validation error update the recode in the databaseTable
if (count($errors)) {
    return view(
        'notes/edit.view.php',
        [
            'heading' => 'Edit Note',
            'errors' => $errors,
            'note' => $note
        ]
    );
}

$db->query(
    'UPDATE notes set body =:body WHERE id =:id',
    [
        'id' => $_POST['id'],
        'body' => $_POST['note']
    ]
);

// redirect the user;
header('Location: /notes');
die();
