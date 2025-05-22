<?php

class Domaine extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM domaine;";
        return $this->query($sql)->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM domaine WHERE id = ?;";
        return $this->query($sql, [$id])->fetch();
    }
    public function add($name, $description)
    {
        try {
            $sql = "INSERT INTO domaine (name, description) VALUES (?, ?);";
            return $this->query($sql, [$name, $description]);
        } catch (Throwable $th) {
            return false;
        }
    }
    public function update($id, $name, $description)
    {
        try {
            $sql = "UPDATE domaine SET name = ?, description = ? WHERE id = ?;";
            return $this->query($sql, [$name, $description, $id]);
        } catch (Throwable $th) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM domaine WHERE id = ?;";
            return $this->query($sql, [$id]);
        } catch (Throwable $th) {
            // Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
}
