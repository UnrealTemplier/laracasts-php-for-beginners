<?php

use Core\Database;

$currentUserId = 1;

$config = require basePath('config.php');
$db = new Database($config['database']);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', [
    ':id' => $note['id'],
]);

header('Location: /notes');
