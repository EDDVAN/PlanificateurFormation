<?php

class formationController extends Controller
{
    protected $formateurModel;
    protected $coursModel;
    protected $formationModel;
    protected $sujetModel;
    protected $domaineModel;

    public function __construct()
    {
        $this->formationModel = new Formation();
        $this->formateurModel = new Formateur();
        $this->coursModel = new Cours();
        $this->sujetModel = new Sujet();
        $this->domaineModel = new Domaine();
    }
    public function index()
    {
        if (empty($_GET['domaine']) && empty($_GET['sujet']) && empty($_GET['cours']) && empty($_GET['formateur']))
            $data = $this->formationModel->getAll();
        else
            $data = $this->formationModel->getFiltered($_GET['formateur'], $_GET['domaine'], $_GET['sujet'], $_GET['cours']);

        // Dependency filter in front end
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $dependencies['cours'] = $this->coursModel->getAll();
        $dependencies['formateur'] = $this->formateurModel->getAll();

        $this->view('formation/index', 'Gestion Formation', $data, $dependencies);
    }

    public function client()
    {
        if (empty($_GET['domaine']) && empty($_GET['sujet']) && empty($_GET['cours']) && empty($_GET['formateur']))
            $data = $this->formationModel->getAll();
        else
            $data = $this->formationModel->getFiltered($_GET['formateur'], $_GET['domaine'], $_GET['sujet'], $_GET['cours']);

        // Dependency filter in front end
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $dependencies['cours'] = $this->coursModel->getAll();
        $dependencies['formateur'] = $this->formateurModel->getAll();

        $this->view('client/Formation', 'Liste Formation', $data, $dependencies);
    }
    public function add()
    {
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $dependencies['cours'] = $this->coursModel->getAll();
        $dependencies['formateur'] = $this->formateurModel->getAll();
        $this->view('formation/Add', 'Ajouter Formation', null, $dependencies);
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('/gestion/formation');
        }
        $id = $_GET['id'];
        $data = $this->formationModel->getById($id);
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $dependencies['cours'] = $this->coursModel->getAll();
        $dependencies['formateur'] = $this->formateurModel->getAll();
        $this->view('formation/Edit', 'Modifier Formation - ' . $data->cours . ' - ' . $data->formateur, $data, $dependencies);
    }

    public function create()
    {
        $cours = $_POST['cours'];
        $formateur = $_POST['formateur'];
        $price = $_POST['price'];
        $mode = $_POST['mode'];
        if (empty($cours) || empty($formateur) || empty($price) || empty($mode)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/formation');
        }
        if ($this->formationModel->add($formateur, $cours, $price, $mode))
            Session::setMessage('Success', 'Formation ajouté avec succès!');
        else
            Session::setMessage('formation', 'Echec de l\'ajout!');
        $this->redirect('/gestion/formation');
    }

    public function update()
    {
        $id = $_POST['id'];
        $cours = $_POST['cours'];
        $formateur = $_POST['formateur'];
        $price = $_POST['price'];
        $mode = $_POST['mode'];
        if (empty($id) || empty($cours) || empty($formateur) || empty($price) || empty($mode)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/formation');
        }
        if ($this->formationModel->update($id, $formateur, $cours, $price, $mode))
            Session::setMessage('Success', 'Formation modifié avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la modification!');
        $this->redirect('/gestion/formation');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if (empty($id)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/formation');
        }
        if ($this->formationModel->delete($id))
            Session::setMessage('Success', 'Formation supprimé avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la suppression!');
        $this->redirect('/gestion/formation');
    }
}
