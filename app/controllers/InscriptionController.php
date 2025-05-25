<?php

class InscriptionController extends Controller
{
    protected $inscriptionModel;

    protected $formationDateModel;

    public function __construct()
    {
        $this->inscriptionModel = new Inscription();

        $this->formationDateModel = new FormationDate();
    }
    public function index()
    {
        $data = $this->formationDateModel->getAll();

        $this->view('date/index', 'Gestion Dates', $data);
    }
    public function inscription()
    {
        if (!isset($_GET['formation'])) {
            $this->redirect('/client/formation');
        }
        $dependencies['formationDate'] = $this->formationDateModel->getUpcomingByFormation($_GET['formation']);
        $this->view('inscription/Add', 'Ajouter Date Formation', null, $dependencies);
    }
    public function edit()
    {
        if (!isset($_GET['id']) || !isset($_GET['formation'])) {
            $this->redirect('/formation');
        }
        $id = $_GET['id'];
        $data = $this->inscriptionModel->getById($id);
        $dependencies['formationDate'] = $this->formationDateModel->getUpcomingByFormation($_GET['formation']);
        $this->view('inscription/Edit', 'Modifier Date Formation', $data, $dependencies);
    }

    public function join()
    {
        $formationDate = $_POST['formationDate'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $company = $_POST['company'];
        if (empty($formationDate) || empty($firstName) || empty($lastName) || empty($email)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/client/formation');
        }
        if ($this->inscriptionModel->add($formationDate, $firstName, $lastName, $phone, $email, $company))
            Session::setMessage('Success', 'Inscription effectuée avec succès! Merci pour votre confiance.');
        else
            Session::setMessage('Fail', 'Echec de l\'Inscription!');
        $this->redirect('/client/formation');
    }

    public function update()
    {
        $id = $_POST['id'];
        $formationDate = $_POST['formationDate'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $company = $_POST['company'];
        $paid = $_POST['paid'] == 'on' ? 1 : 0;
        if (empty($formationDate) || empty($formationDate) || empty($firstName) || empty($lastName) || empty($email)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/inscription');
        }
        if ($this->inscriptionModel->update($id, $formationDate, $firstName, $lastName, $phone, $email, $company, $paid))
            Session::setMessage('Success', 'Modification effectuée avec succès.');
        else
            Session::setMessage('Fail', 'Echec de la modification!');
        $this->redirect('/inscription');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if (empty($id)) {
            Session::setMessage('Fail', 'Veuillez remplir tous les champs!');
            $this->redirect('/inscription');
        }
        // $this->inscriptionModel->delete($id);
        if ($this->inscriptionModel->delete($id))
            Session::setMessage('Success', 'Inscription supprimé avec succès!');
        else
            Session::setMessage('Fail', 'Echec de la suppression!');
        $this->redirect('/inscription');
    }
}
