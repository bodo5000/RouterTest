<?php

use Core\App;
use Core\DataBase;

$db = App::resolve(DataBase::class);

$heading = 'My Notes';

$notes = $db->query("SELECT * FROM notes WHERE user_id = 1")->get();

view(
    'notes/index.view.php',
    [
        'heading' => 'my Notes',
        'notes' => $notes
    ]
);
