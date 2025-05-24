<?php

class FormationDate extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT fd.* FROM vformation_date fd;";
        return $this->query($sql)->fetchAll();
    }

    public function getUpcoming()
    {
        $sql = "SELECT fd.* FROM vformation_date fd WHERE fd.date >= CURDATE();";
        return $this->query($sql)->fetchAll();
    }
    public function getPast()
    {
        $sql = "SELECT fd.* FROM vformation_date fd WHERE fd.date < CURDATE();";
        return $this->query($sql)->fetchAll();
    }

    public function getByMonth($month, $year = null)
    {
        if (!$year) $year = date('Y');
        $sql = "SELECT fd.* FROM vformation_date fd WHERE 
                        fd.date >= STR_TO_DATE(CONCAT(?, '-', ?, '-01'), '%Y-%m-%d')
                        AND fd.date <  STR_TO_DATE(CONCAT(?, '-', ?, '-01'), '%Y-%m-%d') + INTERVAL 1 MONTH;;";
        return $this->query($sql, [$year, $month, $year, $month])->fetchAll();
    }

    public function getFiltered($idFormateur, $idDomaine, $idSujet, $idCours, $idVille)
    {
        //initialized as id > 0 to avoid handling the first condition of the query 'AND'
        $where = "id > 0";
        $params = [];
        if (!empty($idFormateur)) {
            $where .= " AND f.idFormateur = ?";
            array_push($params, $idFormateur);
        }
        if (!empty($idSujet)) {
            $where .= " AND f.idSujet = ?";
            array_push($params, $idSujet);
        }
        if (!empty($idCours)) {
            $where .= " AND f.idCours = ?";
            array_push($params, $idCours);
        }
        if (!empty($idDomaine)) {
            $where .= " AND f.idDomaine = ?";
            array_push($params, $idDomaine);
        }
        if (!empty($idVille)) {
            $where .= " AND fd.idVille = ?";
            array_push($params, $idVille);
        }
        $sql = "SELECT fd.* FROM vformation_date fd WHERE $where;";
        return $this->query($sql, $params)->fetchAll();
    }

    public function getUpcomingFiltered($idFormateur, $idDomaine, $idSujet, $idCours, $idVille)
    {
        $where = "";
        $params = [];
        if (!empty($idFormateur)) {
            $where .= " AND f.idFormateur = ?";
            array_push($params, $idFormateur);
        }
        if (!empty($idSujet)) {
            $where .= " AND f.idSujet = ?";
            array_push($params, $idSujet);
        }
        if (!empty($idCours)) {
            $where .= " AND f.idCours = ?";
            array_push($params, $idCours);
        }
        if (!empty($idDomaine)) {
            $where .= " AND f.idDomaine = ?";
            array_push($params, $idDomaine);
        }
        if (!empty($idVille)) {
            $where .= " AND fd.idVille = ?";
            array_push($params, $idVille);
        }
        $sql = "SELECT fd.* FROM vformation_date fd WHERE fd.date >= CURDATE() $where;";
        return $this->query($sql, $params)->fetchAll();
    }

    public function getPastFiltered($idFormateur, $idDomaine, $idSujet, $idCours, $idVille)
    {
        $where = "";
        $params = [];
        if (!empty($idFormateur)) {
            $where .= " AND f.idFormateur = ?";
            array_push($params, $idFormateur);
        }
        if (!empty($idSujet)) {
            $where .= " AND f.idSujet = ?";
            array_push($params, $idSujet);
        }
        if (!empty($idCours)) {
            $where .= " AND f.idCours = ?";
            array_push($params, $idCours);
        }
        if (!empty($idDomaine)) {
            $where .= " AND f.idDomaine = ?";
            array_push($params, $idDomaine);
        }
        if (!empty($idVille)) {
            $where .= " AND fd.idVille = ?";
            array_push($params, $idVille);
        }
        $sql = "SELECT fd.* FROM vformation_date fd WHERE fd.date < CURDATE() $where;";
        return $this->query($sql, $params)->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT fd.* FROM vformation_date fd WHERE fd.id = ?;";
        return $this->query($sql, [$id])->fetch();
    }


    public function add($formation, $ville, $date)
    {
        try {
            $this->beginTransaction();
            $sql = "INSERT INTO formation_date (idFormation, idVille, date) VALUES (?, ?, ?);";
            if (!$this->query($sql, [$formation, $ville, $date])) {
                $this->rollback();
                throw new Exception("Erreur lors de l'ajout du formation date");
            }
            $this->commit();
            return true;
        } catch (Throwable $th) {
            $this->rollback();
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
    public function update($id, $formation, $ville, $date)
    {
        try {
            $this->beginTransaction();
            $sql = "UPDATE formation_date SET idFormation = ?, idVille = ?, date = ? WHERE id = ?;";
            if (!$this->query($sql, [$formation, $ville, $date, $id])) {
                $this->rollback();
                throw new Exception("Erreur lors de la modification du formation date");
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
            $sql = "DELETE FROM formation_date WHERE id = ?;";
            return $this->query($sql, [$id]);
        } catch (Throwable $th) {
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
}
