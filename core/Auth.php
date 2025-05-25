<?php

class Auth
{
    public static function handle()
    {
        if (!Session::isLogged()) {
            header('location: /login');
        }
        if (!self::validateSession()) {
            session_destroy();
            header('location: /login');
        }
    }

    private static function validateSession()
    {
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 3600)) {
            return false;
        }
        $_SESSION['last_activity'] = time();
        return true;
    }
}
