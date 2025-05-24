<?php

class VilleController extends Controller
{
    protected $villeModel;
    protected $paysModel;

    public function __construct()
    {
        $this->villeModel = new Ville();
        $this->paysModel = new Pays();
    }
    public function index()
    {
        if (empty($_GET['pays']))
            $data = $this->villeModel->getAll();
        else
            $data = $this->villeModel->getByPays($_GET['pays']);
        $dependencies['pays'] = $this->paysModel->getAll();
        $this->view('ville/index', 'Gestion Sujet', $data, $dependencies);
    }
    public function add()
    {
        $dependencies['pays'] = $this->paysModel->getAll();
        $this->view('ville/Add', 'Ajouter Sujet', null, $dependencies);
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('/gestion/ville');
        }
        $id = $_GET['id'];
        $data = $this->villeModel->getById($id);
        $dependencies['pays'] = $this->paysModel->getAll();
        $this->view('ville/Edit', 'Modifier Sujet - ' . $data->name, $data, $dependencies);
    }

    public function create()
    {
        $name = $_POST['name'];
        $sigle = $_POST['sigle'];
        $pays = $_POST['pays'];
        if (empty($name) || empty($sigle) || empty($pays)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/ville');
        }

        if ($this->villeModel->add($pays, $name, $sigle))
            Session::setMessage('Success', 'Sujet ajouté avec succès!');
        else
            Session::setMessage('Fail', 'Echec de l\'ajout!');
        $this->redirect('/gestion/ville');
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $name = $_POST['name'];
        $sigle = $_POST['sigle'];
        $pays = $_POST['pays'];
        if (empty($id) || empty($name) || empty($sigle) || empty($pays)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/ville');
        }
        if ($this->villeModel->update($id, $pays, $name, $sigle))
            Session::setMessage('Success', 'Sujet modifié avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la modification!');
        $this->redirect('/gestion/ville');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if (empty($id)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/ville');
        }
        // $this->villeModel->delete($id);
        if ($this->villeModel->delete($id))
            Session::setMessage('Success', 'Sujet supprimé avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la suppression!');
        $this->redirect('/gestion/ville');
    }
}
