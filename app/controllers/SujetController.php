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
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $this->view('sujet/index', 'Gestion Sujet', $data, $dependencies);
    }
    public function add()
    {
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $this->view('sujet/Add', 'Ajouter Sujet', null, $dependencies);
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('/gestion/sujet');
        }
        $id = $_GET['id'];
        $data = $this->sujetModel->getById($id);
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $this->view('sujet/Edit', 'Modifier Sujet - ' . $data->name, $data, $dependencies);
    }

    public function create()
    {
        $name = $_POST['name'];
        $domaine = $_POST['domaine'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $individualBenefit = $_POST['individualBenefit'];
        $businessBenefit = $_POST['businessBenefit'];
        $logo = $_FILES['logo'];
        if (empty($name) || empty($domaine) || empty($shortDescription)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/sujet');
        }
        // $this->sujetModel->add($name, $domaine, $shortDescription, $longDescription, $individualBenefit, $businessBenefit, $logo);

        if ($this->sujetModel->add($name, $domaine, $shortDescription, $longDescription, $individualBenefit, $businessBenefit, $logo))
            Session::setMessage('Success', 'Sujet ajouté avec succès!');
        else
            Session::setMessage('Fail', 'Echec de l\'ajout!');
        $this->redirect('/gestion/sujet');
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $domaine = $_POST['domaine'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $individualBenefit = $_POST['individualBenefit'];
        $businessBenefit = $_POST['businessBenefit'];
        $logo = $_FILES['logo'];
        if (empty($id) || empty($name) || empty($domaine) || empty($shortDescription)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/sujet');
        }
        // $this->sujetModel->update($id, $name, $domaine, $shortDescription, $longDescription, $individualBenefit, $businessBenefit, $logo);
        if ($this->sujetModel->update($id, $name, $domaine, $shortDescription, $longDescription, $individualBenefit, $businessBenefit, $logo))
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
