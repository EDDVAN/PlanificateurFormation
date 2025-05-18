<?php

class Controller
{
    public function view($view, $title, $data = NULL)
    {
        if (Session::hasMessage()) {
            $message = Session::getMessage();
        }
        $authState = Session::isLogged();
        if ($authState) {
            $user = Session::getUser();
        }
        require_once '../app/views/' . $view . '.php';
    }
    public function redirect($url)
    {
        header('location: ' . $url);
    }
}
