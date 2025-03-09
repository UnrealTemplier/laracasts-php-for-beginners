<?php

namespace Core;

class Authenticator
{
    public static function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query(
            'SELECT * FROM users WHERE email = :email',
            [
                'email' => $email,
            ],
        )->find();

        if ($user && password_verify($password, $user['password'])) {
            self::login($user);
            return true;
        }

        return false;
    }

    public static function login($user)
    {
        session_regenerate_id(true);
        Session::put('user', [
            'email' => $user['email'],
        ]);
    }

    public static function logout()
    {
        Session::destroy();
    }
}
