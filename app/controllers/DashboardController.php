<?php

class DashboardController extends Controller
{

    public function __construct() {}
    public function index()
    {
        $this->view('dashboard/index', 'Dashboard');
    }
}
