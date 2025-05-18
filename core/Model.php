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
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
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
}
