<?php

class DomaineController extends Controller
{
    protected $domaineModel;

    public function __construct()
    {
        $this->domaineModel = new Domaine();
    }
    public function index()
    {
        $data = $this->domaineModel->getAll();
        $this->view('domaine/index', 'Gestion Domaine', $data);
    }
    public function add()
    {
        $this->view('domaine/Add', 'Ajouter Domaine');
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('/gestion/domaine');
        }
        $id = $_GET['id'];
        $data = $this->domaineModel->getById($id);
        $this->view('domaine/Edit', 'Modifier Domaine - ' . $data->name, $data);
    }

    public function create()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        if (empty($name) || empty($description)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/domaine/add');
        }
        if ($this->domaineModel->add($name, $description))

            Session::setMessage('Success', 'Domaine ajouté avec succès!');
        else
            Session::setMessage('Fail', 'Echec de l\'ajout!');
        $this->redirect('/gestion/domaine');
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        if (empty($id) || empty($name) || empty($description)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/domaine');
        }
        if ($this->domaineModel->update($id, $name, $description))
            Session::setMessage('Success', 'Domaine modifié avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la modification!');
        $this->redirect('/gestion/domaine');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if (empty($id)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/domaine');
        }
        // $this->domaineModel->delete($id);
        if ($this->domaineModel->delete($id))
            Session::setMessage('Success', 'Domaine supprimé avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la suppression!');
        $this->redirect('/gestion/domaine');
    }
}
