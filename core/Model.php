<?php

class Model
{
    protected $db;

    public function __construct()
    {
        global $config;
        $this->db = Database::getInstance($config['database'])->getConnection();
    }

    protected function query($sql, $params = [])
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    protected function beginTransaction()
    {
        $this->db->beginTransaction();
    }

    protected function commit()
    {
        $this->db->commit();
    }

    protected function rollback()
    {
        $this->db->rollBack();
    }

    protected function insertedId()
    {
        return $this->db->lastInsertId();
    }
}
