<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = APP::resolve(DataBase::class)->query(
            "SELECT * FROM users WHERE email= :email",
            [
                'email' => $email
            ]
        )->find();


        if ($user) {

            if (password_verify($password, $user['password']) ?? 'no User') {
                $this->login(['email' => $email]);

                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }
}
