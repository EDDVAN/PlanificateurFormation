<?php

class CalendarController extends Controller
{
    protected $formationDateModel;
    protected $formateurModel;
    protected $formationModel;
    protected $domaineModel;
    protected $sujetModel;
    protected $coursModel;
    protected $villeModel;
    public function __construct()
    {
        $this->formationDateModel = new FormationDate();
        $this->formationModel = new Formation();
        $this->formateurModel = new Formateur();
        $this->domaineModel = new Domaine();
        $this->sujetModel = new Sujet();
        $this->coursModel = new Cours();
        $this->villeModel = new Ville();
    }
    public function index()
    {
        $this->view('dashboard/index', 'Dashboard');
    }
    public function dashboard()
    {
        if (isset($_GET['month']))
            $_GET['month'] = (int) $_GET['month'];
        else
            $_GET['month'] = date('m');
        if (isset($_GET['year']))
            $_GET['year'] = (int) $_GET['year'];
        else
            $_GET['year'] = date('Y');
        if (empty($_GET['domaine']) && empty($_GET['sujet']) && empty($_GET['cours']) && empty($_GET['formateur']) && empty($_GET['ville']))
            $data = $this->formationDateModel->getByMonth($_GET['month'], $_GET['year']);
        else
            $data = $this->formationDateModel->getByMonthFiltered($_GET['month'], $_GET['year'], $_GET['formateur'], $_GET['domaine'], $_GET['sujet'], $_GET['cours'], $_GET['ville']);
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $dependencies['cours'] = $this->coursModel->getAll();
        $dependencies['formateur'] = $this->formateurModel->getAll();
        $dependencies['ville'] = $this->villeModel->getAll();
        $this->view('dashboard/Calendar', 'Calendar', $data, $dependencies);
    }
}
