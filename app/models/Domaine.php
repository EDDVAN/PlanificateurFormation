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
}
