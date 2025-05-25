<?php

class Inscription extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT i.*,fd.idFormation, fd.idVille, fd.date, fd.formateur, fd.cours, fd.idSujet, fd.sujet, fd.idDomaine,
                        fd.domaine, fd.idFormateur, fd.idCours, fd.price, fd.mode, fd.ville, fd.villeSigle, fd.pays, fd.paysSigle 
                    FROM planforma.inscription i Join vformation_date fd on i.idFormationDate = fd.id;";
        return $this->query($sql)->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM inscription WHERE id = ?;";
        return $this->query($sql, [$id])->fetch();
    }

    public function getPaid()
    {
        $sql = "SELECT * FROM inscription WHERE paid = 1;";
        return $this->query($sql)->fetchAll();
    }

    public function getIncome()
    {
        $sql = "SELECT sum(fd.price) as total
                    FROM planforma.inscription i Join vformation_date fd on i.idFormationDate = fd.id WHERE paid = 1;";
        return $this->query($sql)->fetch()->total;
    }

    public function add($formationDate, $firstName, $lastName, $phone, $email, $company)
    {
        try {
            $this->beginTransaction();
            $sql = "INSERT INTO inscription (idFormationDate, firstName, lastName, phone, email, company, paid) 
                            VALUES (?, ?, ?, ?, ?, ?, 0);";
            if (!$this->query($sql, [$formationDate, $firstName, $lastName, $phone, $email, $company])) {
                $this->rollback();
                throw new Exception("Erreur lors de l'inscription");
            }
            $this->commit();
            return true;
        } catch (Throwable $th) {
            $this->rollback();
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
    public function update($id, $formationDate, $firstName, $lastName, $phone, $email, $company, $paid)
    {
        try {
            $this->beginTransaction();
            $sql = "UPDATE inscription SET idFormationDate = ?, firstName = ?, lastName = ?, phone = ?, email = ?, company = ?, paid = ?  WHERE id = ?;";
            if (!$this->query($sql, [$formationDate, $firstName, $lastName, $phone, $email, $company, $paid, $id])) {
                $this->rollback();
                throw new Exception("Erreur lors de la modification du l'inscription");
            }
            $this->commit();
            return true;
        } catch (Throwable $th) {
            $this->rollback();
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM inscription WHERE id = ?;";
            return $this->query($sql, [$id]);
        } catch (Throwable $th) {
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
}
