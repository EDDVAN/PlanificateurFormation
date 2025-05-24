<?php

class PaysController extends Controller
{
    protected $paysModel;

    public function __construct()
    {
        $this->paysModel = new Pays();
    }
    public function index()
    {
        $data = $this->paysModel->getAll();
        $this->view('pays/index', 'Gestion Pays', $data);
    }
    public function add()
    {
        $this->view('pays/Add', 'Ajouter Pays');
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('/gestion/pays');
        }
        $id = $_GET['id'];
        $data = $this->paysModel->getById($id);
        $this->view('pays/Edit', 'Modifier Pays - ' . $data->name, $data);
    }

    public function create()
    {
        $name = $_POST['name'];
        $sigle = $_POST['sigle'];
        if (empty($name) || empty($sigle)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/pays/add');
        }
        if ($this->paysModel->add($name, $sigle))

            Session::setMessage('Success', 'Pays ajouté avec succès!');
        else
            Session::setMessage('Fail', 'Echec de l\'ajout!');
        $this->redirect('/gestion/pays');
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sigle = $_POST['sigle'];
        if (empty($id) || empty($name) || empty($sigle)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/pays');
        }
        if ($this->paysModel->update($id, $name, $sigle))
            Session::setMessage('Success', 'Pays modifié avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la modification!');
        $this->redirect('/gestion/pays');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if (empty($id)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/pays');
        }
        // $this->paysModel->delete($id);
        if ($this->paysModel->delete($id))
            Session::setMessage('Success', 'Pays supprimé avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la suppression!');
        $this->redirect('/gestion/pays');
    }
}
