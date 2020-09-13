<?php 

class Product {
    private $db;
    private $tb_cat = "table_categories";
    private $tb_units = "table_units";

    public function __construct()
    {
        $this->db = new Database;
    }

    // categories
    public function getAllCat()
    {
        $query = "SELECT name_categories, id_categories FROM {$this->tb_cat}";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getOneCat($id)
    {
        $query = "SELECT name_categories, id_categories FROM {$this->tb_cat} WHERE id_categories = :id_cat";
        $this->db->query($query);
        $this->db->bind(":id_cat", $id);
        return $this->db->single();
    }

    public function addCat($data)
    {
        // generate data
        $name_cat = $data['name_categories'];
        $id_cat = generateRandomString();
        $created_at = getDateNow();
        $created_by = $_SESSION['username'];

        $query = "INSERT INTO {$this->tb_cat} ( id_categories, name_categories, created_at, created_by) VALUES (:id_cat, :name_cat, :created_at, :created_by)";
        $this->db->query($query);
        $this->db->bind(':id_cat', $id_cat);
        $this->db->bind(':name_cat', $name_cat);
        $this->db->bind(':created_at', $created_at);
        $this->db->bind(':created_by', $created_by);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editCat($data)
    {
        // generate data
        $id = $data['id_cat_edit'];
        $name_cat = $data['edit_name_categories'];
        $updated_at = getDateNow();
        $updated_by = $_SESSION['username'];

        $query = "UPDATE {$this->tb_cat} SET name_categories= :name_cat, updated_at= :updated_at, updated_by= :updated_by WHERE id_categories= :id_cat";
        $this->db->query($query);
        $this->db->bind(':name_cat', $name_cat);
        $this->db->bind(':updated_at', $updated_at);
        $this->db->bind(':updated_by', $updated_by);
        $this->db->bind(':id_cat', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteCat($id)
    {
        $query = "DELETE FROM {$this->tb_cat} WHERE id_categories = :id_cat";
        $this->db->query($query);
        $this->db->bind(':id_cat', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    // end of categories



    // units
    public function getAllUnits()
    {
        $query = "SELECT name_units, id_units FROM {$this->tb_units}";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getOneUnits($id)
    {
        $query = "SELECT name_units, id_units FROM {$this->tb_units} WHERE id_units = :id_units";
        $this->db->query($query);
        $this->db->bind(":id_units", $id);
        return $this->db->single();
    }

    public function addUnits($data)
    {
        // generate data
        $name_units = $data['name_units'];
        $id_units = generateRandomString();
        $created_at = getDateNow();
        $created_by = $_SESSION['username'];

        $query = "INSERT INTO {$this->tb_units} ( id_units, name_units, created_at, created_by) VALUES (:id_units, :name_units, :created_at, :created_by)";
        $this->db->query($query);
        $this->db->bind(':id_units', $id_units);
        $this->db->bind(':name_units', $name_units);
        $this->db->bind(':created_at', $created_at);
        $this->db->bind(':created_by', $created_by);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editUnits($data)
    {
        // generate data
        $id = $data['id_units_edit'];
        $name_units = $data['edit_name_units'];
        $updated_at = getDateNow();
        $updated_by = $_SESSION['username'];

        $query = "UPDATE {$this->tb_units} SET name_units= :name_units, updated_at= :updated_at, updated_by= :updated_by WHERE id_units= :id_units";
        $this->db->query($query);
        $this->db->bind(':name_units', $name_units);
        $this->db->bind(':updated_at', $updated_at);
        $this->db->bind(':updated_by', $updated_by);
        $this->db->bind(':id_units', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteUnits($id)
    {
        $query = "DELETE FROM {$this->tb_units} WHERE id_units = :id_units";
        $this->db->query($query);
        $this->db->bind(':id_units', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    // end of units


    // items
    public function getAllItems()
    {
        return [];
    }
}
