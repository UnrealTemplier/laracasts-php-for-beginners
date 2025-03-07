<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['title'], 1, 255)) {
    $errors['title'] = 'A title of no more than 255 characters is required.';
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A text of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors,
    ]);
    die();
}

$db->query('
    INSERT INTO notes(title, body, user_id) 
    VALUES(:title, :body, :user_id)', [
    ':title' => $_POST['title'],
    ':body' => $_POST['body'],
    ':user_id' => 1,
]);

header('Location: /notes');
exit();
