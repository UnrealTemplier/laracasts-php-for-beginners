<?php


use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    view('session/create.view.php', [
        'errors' => $form->errors(),
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
