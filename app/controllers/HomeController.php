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

    public function dashboard()
    {
        $this->view('layout/Calandar', 'Dashboard');
    }
}
