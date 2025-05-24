<?php

class Cours extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT c.*, s.idDomaine, s.name as sujet ,d.name as domaine FROM cours c JOIN sujet s ON c.idSujet = s.id
	                JOIN domaine d ON s.idDomaine = d.id;";
        return $this->query($sql)->fetchAll();
    }

    public function getByDomaine($id)
    {
        $sql = "SELECT c.*, s.idDomaine, s.name as sujet ,d.name as domaine FROM cours c JOIN sujet s ON c.idSujet = s.id
	                JOIN domaine d ON s.idDomaine = d.id WHERE s.idDomaine = ?;";
        return $this->query($sql, [$id])->fetchAll();
    }

    public function getBySujet($id)
    {
        $sql = "SELECT c.*, s.idDomaine, s.name as sujet ,d.name as domaine FROM cours c JOIN sujet s ON c.idSujet = s.id
	                JOIN domaine d ON s.idDomaine = d.id WHERE c.idSujet = ?;";
        return $this->query($sql, [$id])->fetchAll();
    }

    public function getByDomaineAndSujet($idDomaine, $idSujet)
    {
        $sql = "SELECT c.*, s.idDomaine, s.name as sujet ,d.name as domaine FROM cours c JOIN sujet s ON c.idSujet = s.id
	                JOIN domaine d ON s.idDomaine = d.id WHERE s.idDomaine = ? AND c.idSujet = ?;";
        return $this->query($sql, [$idDomaine, $idSujet])->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT c.*, s.idDomaine FROM cours c JOIN sujet s ON c.idSujet = s.id WHERE c.id = ?;";
        return $this->query($sql, [$id])->fetch();
    }

    public function add($name, $sujet, $content, $description, $audience, $duration, $testIncluded, $testContent, $logo)
    {
        try {
            $this->beginTransaction();
            $sql = "INSERT INTO cours (idSujet, name, content, description, audience, duration, testIncluded, testContent)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
            if (!$this->query($sql, [$sujet, $name, $content, $description, $audience, $duration, $testIncluded, $testContent])) {
                throw new Exception("Erreur lors de l'ajout du cours");
            }
            $id = $this->insertedId();
            $fileName = Utiles::handleFileUpload($logo, $id, 'cours');
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
    public function update($id, $name, $sujet, $content, $description, $audience, $duration, $testIncluded, $testContent, $logo)
    {
        try {
            $this->beginTransaction();
            $sql = "UPDATE cours SET name = ?, idSujet = ?, content = ?, description = ?, audience = ?, duration = ?, testIncluded = ?, testContent = ?
                        WHERE id = ?;";
            if (!$this->query($sql, [$name, $sujet, $content, $description, $audience, $duration, $testIncluded, $testContent, $id])) {
                throw new Exception("Erreur lors de la modification du cours");
            }
            $fileName = Utiles::handleFileUpload($logo, $id, 'cours');
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
            $sql = "DELETE FROM cours WHERE id = ?;";
            return $this->query($sql, [$id]);
        } catch (Throwable $th) {
            // Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }

    protected function updateImage($logo, $id)
    {
        $sql = "UPDATE cours SET logo = ? WHERE id = ?;";
        return $this->query($sql, [$logo, $id]);
    }
}
