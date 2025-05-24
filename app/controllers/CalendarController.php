<?php

class CalendarController extends Controller
{
    protected $formationModel;
    public function __construct()
    {
        $formationModel = new Formation();
    }
    public function index()
    {
        $dependencies['formation'] = $this->formationModel->getAll();
        $this->view('dashboard/index', 'Dashboard');
    }
    public function dashboard()
    {
        $this->view('dashboard/Calendar', 'Calendar');
    }
}
