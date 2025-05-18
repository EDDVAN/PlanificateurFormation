<?php

class Session
{

    // generic session functions
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function unset($key)
    {
        unset($_SESSION[$key]);
    }
    public static function get($key)
    {
        $_SESSION[$key];
    }

    // message functions fpr ease of use
    public static function setMessage($type, $message)
    {
        $msg = ['type' => $type, 'message' => $message];
        $_SESSION['message'] = $msg;
    }
    public static function getMessage()
    {
        if (isset($_SESSION['message'])) {
            $msg = $_SESSION['message'];
            unset($_SESSION['message']);
            return $msg;
        }
    }
    public static function hasMessage()
    {
        return isset($_SESSION['message']);
    }

    // authenticated user

    public static function isLogged()
    {
        return isset($_SESSION['user']);
    }

    public static function getUser()
    {
        return $_SESSION['user'];
    }

    public static function setUser($user)
    {
        $_SESSION['user'] = $user;
    }

    public static function unsetUser()
    {
        unset($_SESSION['user']);
    }
}
