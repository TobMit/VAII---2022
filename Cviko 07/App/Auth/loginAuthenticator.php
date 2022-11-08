<?php

namespace App\Auth;

class loginAuthenticator extends DummyAuthenticator
{
    public function login($login, $password): bool
    {
        if ($login == $password) {
        $_SESSION['user'] = self::USERNAME;
        return true;
    } else {
        return false;
    }
    }
}