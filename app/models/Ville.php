<?php

class Ville extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT v.*,p.name as pays FROM ville v INNER JOIN pays p ON v.idPays = p.id;";
        return $this->query($sql)->fetchAll();
    }

    public function getByPays($id)
    {
        $sql = "SELECT v.*,p.name as pays FROM ville v INNER JOIN pays p ON v.idPays = p.id where v.idPays = ?;";
        return $this->query($sql, [$id])->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM ville WHERE id = ?;";
        return $this->query($sql, [$id])->fetch();
    }

    public function add($pays, $name, $sigle)
    {
        try {
            $this->beginTransaction();
            $sql = "INSERT INTO ville (idPays, name, sigle) VALUES (?, ?, ?);";
            if (!$this->query($sql, [$pays, $name, $sigle])) {
                $this->rollback();
                throw new Exception("Erreur lors de l'ajout du sujet");
            }
            $this->commit();
            return true;
        } catch (Throwable $th) {
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
    public function update($id, $pays, $name, $sigle)
    {
        try {
            $this->beginTransaction();
            $sql = "UPDATE ville SET idPays = ?, name = ?, sigle = ? WHERE id = ?;";
            if (!$this->query($sql, [$pays, $name, $sigle, $id])) {
                $this->rollback();
                throw new Exception("Erreur lors de la modification du sujet");
            }
            $this->commit();
            return true;
        } catch (Throwable $th) {
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM ville WHERE id = ?;";
            return $this->query($sql, [$id]);
        } catch (Throwable $th) {
            return false;
        }
    }

    protected function updateImage($logo, $id)
    {
        $sql = "UPDATE sujet SET logo = ? WHERE id = ?;";
        return $this->query($sql, [$logo, $id]);
    }
}
