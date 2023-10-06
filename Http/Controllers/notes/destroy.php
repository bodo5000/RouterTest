<?php

use Core\App;
use Core\DataBase;


$db = App::resolve(DataBase::class);

// connect to our MYSQl dataBase
// $config = require_once  basePath('config.php');
// $db = new DataBase($config['database']);
// dd($db);
$currentUserId = 1;

$note = $db->query(
    "SELECT * FROM notes WHERE id =:id",
    [
        'id' => $_GET['id']
    ]
)->fetchOrFail();

authorize($note['user_id'] === $currentUserId);

// form was submitted delete the current note
$db->query(
    "DELETE FROM notes WHERE id = :id",
    [
        'id' => $_POST['id'],
    ]
);
header('Location: /notes');
exit();
