<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address';
}

if (!Validator::string($password, 8, 255)) {
    $errors['password'] = 'Please enter a password of at least 8 characters';
}

if (!empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors,
    ]);
    exit();
}

$db = App::resolve(Database::class);

$user = $db->query(
    'SELECT * FROM users WHERE email = :email',
    [
        'email' => $email,
    ],
)->find();

if ($user) {
    $errors['email'] = 'An account with this email already exists';
    view('registration/create.view.php', [
        'errors' => $errors,
    ]);
    exit();
}

$db->query(
    'INSERT INTO users(email, password) VALUES(:email, :password)',
    [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ],
);

login($user);
redirectTo('/');
