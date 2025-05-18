<?php

class AuthController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function authenticate()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $user = $this->userModel->authenticate($username, $password);
        if ($user && password_verify($password, $user->password)) {
            $authUser = (object) [
                'id' => $user->id,
                'username' => $user->username
            ];
            Session::setUser($authUser);
            Session::setMessage('success', 'You are logged in!');
        } else {
            Session::setMessage('fail', 'Invalid credentials!');
        }
        $this->redirect('/');
    }

    public function login()
    {
        $this->view('auth/Login', 'Login');
    }
    public function logout()
    {
        $this->userModel->logout();
        $this->redirect('/');
    }
}
