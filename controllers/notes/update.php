<?php

use Core\App;
use Core\Database;
use Core\Validator;

$currentUserId = 1;

$db = App::resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['title'], 1, 255)) {
    $errors['title'] = 'A title of no more than 255 characters is required.';
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A text of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors,
        'note' => $note,
    ]);
    die();
}

$db->query(
    '
    UPDATE notes 
    SET title = :title, body = :body
    WHERE id = :id',
    [
        ':title' => $_POST['title'],
        ':body' => $_POST['body'],
        ':id' => $_POST['id'],
    ],
);

header('Location: /notes');
