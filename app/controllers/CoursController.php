<?php

class CoursController extends Controller
{
    protected $coursModel;
    protected $sujetModel;
    protected $domaineModel;

    public function __construct()
    {
        $this->coursModel = new Cours();
        $this->sujetModel = new Sujet();
        $this->domaineModel = new Domaine();
    }
    public function index()
    {
        if (empty($_GET['domaine']) && empty($_GET['sujet']))
            $data = $this->coursModel->getAll();
        else if (!empty($_GET['domaine']) && empty($_GET['sujet']))
            $data = $this->coursModel->getByDomaine($_GET['domaine']);
        else if (empty($_GET['domaine']) && !empty($_GET['sujet']))
            $data = $this->coursModel->getBySujet($_GET['sujet']);
        else
            $data = $this->coursModel->getByDomaineAndSujet($_GET['domaine'], $_GET['sujet']);
        $dependencies['domaine'] = $this->domaineModel->getAll();
        if (empty($_GET['domaine']))
            $dependencies['sujet'] = $this->sujetModel->getAll();
        else
            $dependencies['sujet'] = $this->sujetModel->getByDomaine($_GET['domaine']);
        $this->view('cours/index', 'Gestion Cours', $data, $dependencies);
    }
    public function add()
    {
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $this->view('cours/Add', 'Ajouter Cours', null, $dependencies);
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            $this->redirect('/gestion/cours');
        }
        $id = $_GET['id'];
        $data = $this->coursModel->getById($id);
        $dependencies['domaine'] = $this->domaineModel->getAll();
        $dependencies['sujet'] = $this->sujetModel->getAll();
        $this->view('cours/Edit', 'Modifier Cours - ' . $data->name, $data, $dependencies);
    }

    public function create()
    {
        $name = $_POST['name'];
        $domaine = $_POST['domaine'];
        $sujet = $_POST['sujet'];
        $content = $_POST['content'];
        $description = $_POST['description'];
        $audience = $_POST['audience'];
        $duration = $_POST['duration'];
        $testIncluded = ($_POST['testIncluded'] == 'on') ? 1 : 0;
        if (empty($testIncluded))
            $testContent = NULL;
        else
            $testContent = $_POST['testContent'];
        $logo = $_FILES['logo'];
        if (empty($name) || empty($domaine) || empty($sujet)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/cours');
        }
        // $this->coursModel->add($name, $sujet, $content, $description, $audience, $duration, $testIncluded, $testContent, $logo);
        if ($this->coursModel->add($name, $sujet, $content, $description, $audience, $duration, $testIncluded, $testContent, $logo))
            Session::setMessage('Success', 'Cours ajouté avec succès!');
        else
            Session::setMessage('Fail', 'Echec de l\'ajout!');
        $this->redirect('/gestion/cours');
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $domaine = $_POST['domaine'];
        $sujet = $_POST['sujet'];
        $content = $_POST['content'];
        $description = $_POST['description'];
        $audience = $_POST['audience'];
        $duration = $_POST['duration'];
        $testIncluded = ($_POST['testIncluded'] == 'on') ? 1 : 0;
        if (empty($testIncluded))
            $testContent = NULL;
        else
            $testContent = $_POST['testContent'];
        $logo = $_FILES['logo'];
        if (empty($id) || empty($name) || empty($domaine) || empty($sujet)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/cours');
        }
        // $this->coursModel->update($id, $name, $sujet, $content, $description, $audience, $duration, $testIncluded, $testContent, $logo);
        if ($this->coursModel->update($id, $name, $sujet, $content, $description, $audience, $duration, $testIncluded, $testContent, $logo))
            Session::setMessage('Success', 'Sujet modifié avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la modification!');
        $this->redirect('/gestion/cours');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if (empty($id)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/gestion/cours');
        }
        if ($this->coursModel->delete($id))
            Session::setMessage('Success', 'Cours supprimé avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la suppression!');
        $this->redirect('/gestion/cours');
    }
}
