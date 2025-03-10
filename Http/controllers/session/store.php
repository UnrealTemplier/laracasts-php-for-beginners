<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate(
    $params = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ],
);

$signedIn = Authenticator::attempt($params['email'], $params['password']);

if (!$signedIn) {
    $form
        ->error('email', 'An account with these credentials do not exist')
        ->throw();
}

redirect('/');
