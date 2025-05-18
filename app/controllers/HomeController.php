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
        $data = $this->domaineModel->getAll();
        $this->view('Home', 'Home', $data);
        // include '../app/views/Home.php';
    }

    public function pageDoesNotExist()
    {
        $title = '404 Page Not Found';
        // Check if user is logged in
        include '../app/Views/404.php';
    }
}
