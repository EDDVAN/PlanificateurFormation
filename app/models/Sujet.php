<?php

class Sujet extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT s.*,d.name as domaine FROM sujet s INNER JOIN domaine d ON s.idDomaine = d.id;";
        return $this->query($sql)->fetchAll();
    }

    public function getByDomaine($id)
    {
        $sql = "SELECT s.*,d.name as domaine FROM sujet s INNER JOIN domaine d ON s.idDomaine = d.id where s.idDomaine = ?;";
        return $this->query($sql, [$id])->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM sujet WHERE id = ?;";
        return $this->query($sql, [$id])->fetch();
    }

    public function add($name, $domaine, $shortDescription, $longDescription, $individualBenefit, $businessBenefit, $logo)
    {
        try {
            $this->beginTransaction();
            $sql = "INSERT INTO sujet (idDomaine, name, shortDescription, longDescription, individualBenefit, businessBenefit)
                                VALUES (?, ?, ?, ?, ?, ?);";
            if (!$this->query($sql, [$domaine, $name, $shortDescription, $longDescription, $individualBenefit, $businessBenefit])) {
                throw new Exception("Erreur lors de l'ajout du sujet");
            }
            $id = $this->insertedId();
            $fileName = Utiles::handleFileUpload($logo, $id, 'sujet');
            if (!$this->updateImage($fileName, $id)) {
                $this->rollback();
                return false;
            }
            $this->commit();
            return true;
        } catch (Throwable $th) {
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
    public function update($id, $name, $domaine, $shortDescription, $longDescription, $individualBenefit, $businessBenefit, $logo)
    {
        try {
            $this->beginTransaction();
            $sql = "UPDATE sujet SET name = ?, idDomaine = ?, shortDescription = ?, longDescription = ?,
                        individualBenefit = ?, businessBenefit = ? WHERE id = ?;";
            if (!$this->query($sql, [$name, $domaine, $shortDescription, $longDescription, $individualBenefit, $businessBenefit, $id])) {
                throw new Exception("Erreur lors de la modification du sujet");
            }
            $fileName = Utiles::handleFileUpload($logo, $id, 'sujet');
            if ($fileName) {
                if (!$this->updateImage($fileName, $id)) {
                    Session::setMessage('Fail', 'Image non modifiée');
                    $this->rollback();
                    return false;
                }
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
            $sql = "DELETE FROM sujet WHERE id = ?;";
            return $this->query($sql, [$id]);
        } catch (Throwable $th) {
            // Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }

    protected function updateImage($logo, $id)
    {
        $sql = "UPDATE sujet SET logo = ? WHERE id = ?;";
        return $this->query($sql, [$logo, $id]);
    }
}
