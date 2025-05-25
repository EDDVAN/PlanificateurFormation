<?php

class HomeController extends Controller
{
    protected $domaineModel;

    public function __construct()
    {
        $this->domaineModel = new Domaine();
    }
    public function index()
    {
        $this->view('Home', 'Home');
    }

    public function pageDoesNotExist()
    {
        $this->view('404', '404 Page Not Found');
    }

    public function contact()
    {
        $this->view('Contact', 'Home');
    }
    public function sendContact()
    {
        //handle SMTP EMAIL SEND
        Session::setMessage('Success', 'Votre message a été envoyé avec succès!');
        $this->view('Home', 'Home');
    }
}
