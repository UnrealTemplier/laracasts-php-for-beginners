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
    $errors['password'] = 'Please enter a valid password';
}

if (!empty($errors)) {
    view('session/create.view.php', [
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

if ($user && password_verify($password, $user['password'])) {
    login($user);
    redirectTo('/');
}

$errors['email'] = 'An account with these credentials do not exist';
view('session/create.view.php', [
    'errors' => $errors,
]);
exit();
