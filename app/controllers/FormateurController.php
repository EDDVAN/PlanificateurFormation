<?php

class FormateurController extends Controller
{
    protected $formateurModel;

    public function __construct()
    {
        $this->formateurModel = new Formateur();
    }
    public function index()
    {
        $data = $this->formateurModel->getAll();
        $this->view('formateur/index', 'Gestion Formateur', $data);
    }
    public function add()
    {
        $this->view('formateur/Add', 'Ajouter Formateur');
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('/gestion/formateur');
        }
        $id = $_GET['id'];
        $data = $this->formateurModel->getById($id);
        $this->view('formateur/Edit', 'Modifier Formateur - ' . $data->lastName, $data);
    }

    public function create()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $description = $_POST['description'];
        $photo = $_FILES['photo'];
        if (empty($firstName) || empty($lastName)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/formateur');
        }
        // $this->formateurModel->add($name, $sujet, $content, $description, $audience, $duration, $testIncluded, $testContent, $logo);
        if ($this->formateurModel->add($firstName, $lastName, $description, $photo))
            Session::setMessage('Success', 'Formateur ajouté avec succès!');
        else
            Session::setMessage('Fail', 'Echec de l\'ajout!');
        $this->redirect('/gestion/formateur');
    }

    public function update()
    {
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $description = $_POST['description'];
        $photo = $_FILES['photo'];
        if (empty($id) || empty($firstName) || empty($lastName)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/formateur');
        }
        // $this->formateurModel->update($id, $firstName, $lastName, $description, $photo);
        if ($this->formateurModel->update($id, $firstName, $lastName, $description, $photo))
            Session::setMessage('Success', 'Sujet modifié avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la modification!');
        $this->redirect('/gestion/formateur');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if (empty($id)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/formateur');
        }
        if ($this->formateurModel->delete($id))
            Session::setMessage('Success', 'Formateur supprimé avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la suppression!');
        $this->redirect('/gestion/formateur');
    }
}
