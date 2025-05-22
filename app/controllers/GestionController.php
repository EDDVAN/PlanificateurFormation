<?php

class GestionController extends Controller
{

    public function __construct() {}
    public function index()
    {
        $this->view('gestion/index', 'Gestion');
    }
}
