<?php

class DashboardController extends Controller
{
    protected $domaineModel;
    protected $sujetModel;
    protected $coursModel;
    protected $formateurModel;
    protected $paysModel;
    protected $villeModel;
    protected $formationModel;
    protected $formationDateModel;
    protected $InscriptionModel;

    public function __construct()
    {
        $this->domaineModel = new Domaine();
        $this->sujetModel = new Sujet();
        $this->coursModel = new Cours();
        $this->formateurModel = new Formateur();
        $this->paysModel = new Pays();
        $this->villeModel = new Ville();
        $this->formationModel = new Formation();
        $this->formationDateModel = new FormationDate();
        $this->InscriptionModel = new Inscription();
    }
    public function index()
    {
        $dependencies['domaine'] =  $this->domaineModel->getAll();
        $dependencies['sujet'] =  $this->sujetModel->getAll();
        $dependencies['cours'] =  $this->coursModel->getAll();
        $dependencies['formateur'] =  $this->formateurModel->getAll();
        $dependencies['pays'] =  $this->paysModel->getAll();
        $dependencies['ville'] =  $this->villeModel->getAll();
        $dependencies['formation'] =  $this->formationModel->getAll();
        $dependencies['formationDate'] =  $this->formationDateModel->getAll();
        $dependencies['inscription'] =  $this->InscriptionModel->getAll();
        $dependencies['inscriptionPaid'] =  $this->InscriptionModel->getPaid();
        $dependencies['inscriptionIncome'] =  $this->InscriptionModel->getIncome();

        $this->view('dashboard/index', 'Dashboard', null, $dependencies);
    }
}
