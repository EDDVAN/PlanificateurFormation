<?php

class Formateur extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT f.*, (SELECT COUNT(*) FROM formation f2 WHERE f2.idFormateur = f.id) as nbFormation FROM formateur f;";
        return $this->query($sql)->fetchAll();
    }
    public function getById($id)
    {
        $sql = "SELECT f.*, (SELECT COUNT(*) FROM formation f2 WHERE f2.idFormateur = f.id) as nbFormation FROM formateur f WHERE f.id = ?;";
        return $this->query($sql, [$id])->fetch();
    }

    public function add($firstName, $lastName, $description, $photo)
    {
        try {
            $this->beginTransaction();
            $sql = "INSERT INTO formateur (firstName, lastName, description) VALUES (?, ?, ?);";
            if (!$this->query($sql, [$firstName, $lastName, $description])) {
                throw new Exception("Erreur lors de l'ajout du formateur");
            }
            $id = $this->insertedId();
            $fileName = Utiles::handleFileUpload($photo, $id, 'formateur');
            if (!$this->updateImage($fileName, $id)) {
                $this->rollback();
                return false;
            }
            $this->commit();
            return true;
        } catch (Throwable $th) {
            $this->rollback();
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
    public function update($id, $firstName, $lastName, $description, $photo)
    {
        try {
            $this->beginTransaction();
            $sql = "UPDATE formateur SET firstName = ?, lastName = ?, description = ? WHERE id = ?;";
            if (!$this->query($sql, [$firstName, $lastName, $description, $id])) {
                throw new Exception("Erreur lors de la modification du formateur");
            }
            $fileName = Utiles::handleFileUpload($photo, $id, 'formateur');
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
            $this->rollback();
            Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM formateur WHERE id = ?;";
            return $this->query($sql, [$id]);
        } catch (Throwable $th) {
            // Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }

    protected function updateImage($img, $id)
    {
        $sql = "UPDATE formateur SET photo = ? WHERE id = ?;";
        return $this->query($sql, [$img, $id]);
    }
}
