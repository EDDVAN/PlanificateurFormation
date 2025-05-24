<?php

class Pays extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM pays;";
        return $this->query($sql)->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM pays WHERE id = ?;";
        return $this->query($sql, [$id])->fetch();
    }
    public function add($name, $sigle)
    {
        try {
            $sql = "INSERT INTO pays (name, sigle) VALUES (?, ?);";
            return $this->query($sql, [$name, $sigle]);
        } catch (Throwable $th) {
            return false;
        }
    }
    public function update($id, $name, $sigle)
    {
        try {
            $sql = "UPDATE pays SET name = ?, sigle = ? WHERE id = ?;";
            return $this->query($sql, [$name, $sigle, $id]);
        } catch (Throwable $th) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM pays WHERE id = ?;";
            return $this->query($sql, [$id]);
        } catch (Throwable $th) {
            // Session::setMessage('Fail', $th->getMessage());
            return false;
        }
    }
}
