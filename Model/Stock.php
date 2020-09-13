<?php

class Stock{
    private $db;
    private $table = "table_stock";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getStock()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        
        return $this->db->resultSet();
    }

}