<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if (Authenticator::attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'An account with these credentials do not exist');
}

return view('session/create.view.php', [
    'errors' => $form->errors(),
]);
