<?php

class FormationDateController extends Controller
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
        if (empty($_GET['domaine']) && empty($_GET['sujet']) && empty($_GET['cours']) && empty($_GET['formateur']) && empty($_GET['ville'])) {
            $data['old'] = $this->formationDateModel->getPast();
            $data['new'] = $this->formationDateModel->getUpcoming();
        } else {
            $data['old'] = $this->formationDateModel->getPastFiltered($_GET['formateur'], $_GET['domaine'], $_GET['sujet'], $_GET['cours'], $_GET['ville']);
            $data['new'] = $this->formationDateModel->getUpcomingFiltered($_GET['formateur'], $_GET['domaine'], $_GET['sujet'], $_GET['cours'], $_GET['ville']);
        }

        // Dependency filter in front end
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $dependencies['cours'] = $this->coursModel->getAll();
        $dependencies['formateur'] = $this->formateurModel->getAll();
        $dependencies['ville'] = $this->villeModel->getAll();

        $this->view('date/index', 'Gestion Dates', $data, $dependencies);
    }
    public function add()
    {
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $dependencies['cours'] = $this->coursModel->getAll();
        $dependencies['formateur'] = $this->formateurModel->getAll();
        $dependencies['formation'] = $this->formationModel->getAll();
        $dependencies['ville'] = $this->villeModel->getAll();
        $this->view('date/Add', 'Ajouter Date Formation', null, $dependencies);
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('/gestion/date');
        }
        $id = $_GET['id'];
        $data = $this->formationDateModel->getById($id);
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $dependencies['cours'] = $this->coursModel->getAll();
        $dependencies['formateur'] = $this->formateurModel->getAll();
        $dependencies['formation'] = $this->formationModel->getAll();
        $dependencies['ville'] = $this->villeModel->getAll();
        $this->view('date/Edit', 'Modifier Date Formation', $data, $dependencies);
    }

    public function create()
    {
        $formation = $_POST['formation'];
        $ville = $_POST['ville'];
        $date = $_POST['date'];
        if (empty($formation) || empty($ville) || empty($date)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/date');
        }
        if ($this->formationDateModel->add($formation, $ville, $date))
            Session::setMessage('Success', 'Date Formation ajouté avec succès!');
        else
            Session::setMessage('formation', 'Echec de l\'ajout!');
        $this->redirect('/gestion/date');
    }

    public function update()
    {
        $id = $_POST['id'];
        $formation = $_POST['formation'];
        $ville = $_POST['ville'];
        $date = $_POST['date'];
        if (empty($id) || empty($formation) || empty($ville) || empty($date)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/date');
        }
        // $this->formationModel->update($id, $formateur, $cours, $price, $mode);
        if ($this->formationDateModel->update($id, $formation, $ville, $date))
            Session::setMessage('Success', 'Date Formation modifié avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la modification!');
        $this->redirect('/gestion/date');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if (empty($id)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/date');
        }
        $this->formationDateModel->delete($id);
        if ($this->formationDateModel->delete($id))
            Session::setMessage('Success', 'Formation supprimé avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la suppression!');
        $this->redirect('/gestion/date');
    }
}
