<?php

use Core\App;
use Core\DataBase;

$db = App::resolve(DataBase::class);

$currentUserId = 1;

$note = $db->query(
    "SELECT * FROM notes WHERE id =:id",
    [
        'id' => $_GET['id']
    ]
)->fetchOrFail();

authorize($note['user_id'] === $currentUserId);

view(
    'notes/edit.view.php',
    [
        'heading' => 'Edit Note',
        'errors' => [],
        'note' => $note,
    ]
);
