<?php

class SujetController extends Controller
{
    protected $sujetModel;
    protected $domaineModel;

    public function __construct()
    {
        $this->sujetModel = new Sujet();
        $this->domaineModel = new Domaine();
    }
    public function index()
    {
        if (empty($_GET['domaine']))
            $data = $this->sujetModel->getAll();
        else
            $data = $this->sujetModel->getByDomaine($_GET['domaine']);
        $this->view('sujet/index', 'Gestion Sujet', $data);
    }
    public function add()
    {
        $data = $this->domaineModel->getAll();
        $this->view('sujet/Add', 'Ajouter Sujet', $data);
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('/gestion/sujet');
        }
        $id = $_GET['id'];
        $data = $this->sujetModel->getById($id);
        $this->view('sujet/Edit', 'Modifier Sujet - ' . $data->name, $data);
    }

    public function create()
    {
        $name = $_POST['name'];
        $domaine = $_POST['domaine'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $individualBenefit = $_POST['individualBenefit'];
        $buisnessBenefit = $_POST['buisnessBenefit'];
        $logo = $_FILES['logo'];
        if (empty($name) || empty($domaine)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/sujet/add');
        }
        $this->sujetModel->add($name, $domaine, $shortDescription, $longDescription, $individualBenefit, $buisnessBenefit, $logo);

        // if ($this->sujetModel->add($name, $domaine, $shortDescription, $longDescription, $individualBenefit, $buisnessBenefit, $logo))
        // Session::setMessage('Success', 'Sujet ajouté avec succès!');
        // else
        // Session::setMessage('Fail', 'Echec de l\'ajout!');
        $this->redirect('/gestion/sujet');
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        if (empty($id) || empty($name) || empty($description)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/sujet');
        }
        if ($this->sujetModel->update($id, $name, $description))
            Session::setMessage('Success', 'Sujet modifié avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la modification!');
        $this->redirect('/gestion/sujet');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if (empty($id)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/sujet');
        }
        // $this->sujetModel->delete($id);
        if ($this->sujetModel->delete($id))
            Session::setMessage('Success', 'Sujet supprimé avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la suppression!');
        $this->redirect('/gestion/sujet');
    }
}
