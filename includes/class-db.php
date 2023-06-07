<?php

class DB
{
    public $host = 'devkinsta_db';
    public $dbname = 'todolist_01';
    public $dbuser = 'root';
    public $dbpassword = 'WaoDc0cvoNR1eUiM';
    public $db;


    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=$this->host;dbname=$this->dbname",
            $this->dbuser,
            $this->dbpassword
        );
    }

    public function fetchAll( $sql, $data = [] )
    {
        $query = $this->db->prepare($sql);
        $query->execute($data);
        return $query->fetchAll();
    }

    public function fetch( $sql, $data = [] )
    {
        $query = $this->db->prepare($sql);
        $query->execute($data);
        return $query->fetch();
    }

    public function insert( $sql, $data = [] )
    {
        $query = $this->db->prepare($sql);
        $query->execute($data);
    }

    public function update( $sql, $data = [] )
    {
        $query = $this->db->prepare($sql);
        $query->execute($data);
    }

    public function delete( $sql, $data = [] )
    {
        $query = $this->db->prepare($sql);
        $query->execute($data);
    }


}