<?php

class Formation extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM vformation;";
        return $this->query($sql)->fetchAll();
    }

    public function getFiltered($idFormateur, $idSujet, $idCours, $idDomaine)
    {
        //initialized as id > 0 to avoid handling the first condition of the query 'AND'
        $where = "id > 0";
        $params = [];
        if (!empty($idFormateur)) {
            $where .= " AND idFormateur = ?";
            array_push($params, $idFormateur);
        }
        if (!empty($idSujet)) {
            $where .= " AND idSujet = ?";
            array_push($params, $idSujet);
        }
        if (!empty($idCours)) {
            $where .= " AND idCours = ?";
            array_push($params, $idCours);
        }
        if (!empty($idDomaine)) {
            $where .= " AND idDomaine = ?";
            array_push($params, $idDomaine);
        }
        $sql = "SELECT * FROM vformation WHERE $where;";
        return $this->query($sql, $params)->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM vformation WHERE id = ?;";
        return $this->query($sql, [$id])->fetch();
    }


    public function add($formateur, $cours, $price, $mode)
    {
        try {
            $this->beginTransaction();
            $sql = "INSERT INTO formation (idFormateur, idCours, price, mode) VALUES (?, ?, ?, ?);";
            if (!$this->query($sql, [$formateur, $cours, $price, $mode])) {
                $this->rollback();
                throw new Exception("Erreur lors de l'ajout du formation");
            }
            $this->commit();
            return true;
        } catch (Throwable $th) {
            $this->rollback();
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
    public function update($id, $formateur, $cours, $price, $mode)
    {
        try {
            $this->beginTransaction();
            $sql = "UPDATE formation SET idFormateur = ?, idCours = ?, price = ?, mode = ?
                        WHERE id = ?;";
            if (!$this->query($sql, [$formateur, $cours, $price, $mode, $id])) {
                $this->rollback();
                throw new Exception("Erreur lors de la modification du formation");
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
            $sql = "DELETE FROM formation WHERE id = ?;";
            return $this->query($sql, [$id]);
        } catch (Throwable $th) {
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
}
