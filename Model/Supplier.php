<?php

class Supplier 
{
    private $db;
    private $table = "table_supplier";

    public function __construct()
    {
        $this->db = new Database;    
    }

    public function getAllSpl()
    {
        $query = "SELECT name_supplier,address,phone_number,description,id_supplier FROM {$this->table}";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getOneSpl($id){
        $query = "SELECT name_supplier, address, phone_number, description, id_supplier FROM {$this->table} WHERE id_supplier = :id_supplier";
        $this->db->query($query);
        $this->db->bind(":id_supplier", $id);

        return $this->db->single();
    }

    public function addSupplier($data)
    {
        // generate data
        // name, address, phone number, and description

        $id_supplier = generateRandomString();
        $name_supplier = $data["name_supplier"];
        $address_supplier = $data["address_supplier"];
        $phone_number = $data["phone_number"];
        $desc_supplier = $data["desc_supplier"];
        $created_at = getDateNow();
        $created_by = $_SESSION['username'];

        $query = "INSERT INTO {$this->table} (name_supplier, address, phone_number, description, created_at, created_by, id_supplier) VALUES (:name_supplier, :address, :phone_number, :desc, :created_at, :created_by, :id_supplier)";
        $this->db->query($query);
        
        $this->db->bind(":id_supplier", $id_supplier);
        $this->db->bind(":name_supplier", $name_supplier);
        $this->db->bind(":address", $address_supplier);
        $this->db->bind(":phone_number", $phone_number);
        $this->db->bind(":desc", $desc_supplier);
        $this->db->bind(":created_at", $created_at);
        $this->db->bind(":created_by", $created_by);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editSupplier($data)
    {
        // generate data
        $id_supplier = $data['id_supplier_edit'];
        $name_supplier = $data["edit_name_supplier"];
        $address_supplier = $data["edit_address_supplier"];
        $phone_number = $data["edit_phone_number"];
        $desc_supplier = $data["edit_desc_supplier"];
        $updated_at = getDateNow();
        $updated_by = $_SESSION['username'];

        $query = "UPDATE {$this->table} SET name_supplier= :name_supplier, address= :address, phone_number= :phone_number, description= :description, updated_at= :updated_at, updated_by= :updated_by WHERE id_supplier= :id_supplier";
        $this->db->query($query);
        $this->db->bind(":id_supplier", $id_supplier);
        $this->db->bind(":name_supplier", $name_supplier);
        $this->db->bind(":address", $address_supplier);
        $this->db->bind(":phone_number", $phone_number);
        $this->db->bind(":description", $desc_supplier);
        $this->db->bind(":updated_at", $updated_at);
        $this->db->bind(":updated_by", $updated_by);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSupplier($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id_supplier = :id_supplier";
        $this->db->query($query);
        $this->db->bind(":id_supplier", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getRowSpl(){
        $query = "SELECT name_supplier FROM {$this->table}";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
}