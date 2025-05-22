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
            Session::setMessage('Success', 'You are logged in!');
        } else {
            Session::setMessage('Fail', 'Invalid credentials!');
        }
        $this->redirect('/dashboard');
    }

    public function login()
    {
        if (Session::isLogged())
            $this->redirect('/dashboard');
        $this->view('auth/Login', 'Login');
    }
    public function logout()
    {
        // $this->userModel->logout();
        Session::unsetUser();
        $this->redirect('/login');
    }
}
