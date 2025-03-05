<?php

use Core\Database;

$currentUserId = 1;

$config = require basePath('config.php');
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM notes WHERE user_id = :user_id', [
    'user_id' => $currentUserId,
])->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes,
]);