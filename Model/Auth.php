<?php
class Auth
{
    private $db;
    private $table = "table_user";

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function checkEmail($data)
    {
        $query = "SELECT email FROM {$this->table} WHERE email = :email";
        $this->db->query($query);
        $this->db->bind(':email', $data);
        $this->db->execute();
        
        return $this->db->rowCount();
    }
    
    public function checkUsername($data)
    {
        $query = "SELECT username FROM {$this->table} WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $data);
        $this->db->execute();
        
        return $this->db->rowCount();
    }
    
    // akan mengambil data yang parameternya adalah inputan email user
    public function getDataByEmail($email){
        $query = "SELECT username,password FROM {$this->table} WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    // akan mengambil data yang parameternya adalah $_SESSION["username"]
    public function getDataByUsername($username){
        $query = "SELECT id_user,email,username,img_user FROM {$this->table} WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->single();
    }
    

    public function signUp($data){

        // generate data
        $id_user = generateRandomString();
        $img_user = "default.jpg";
        $created_at = getDateNow();
        $email = $data['email-signup'];
        $username = $data['username-signup'];
        $password = password_hash($data['password-signup'], PASSWORD_DEFAULT);

        $query = "INSERT INTO {$this->table} (id_user, email, username, password, img_user, created_at) 
        VALUES (:id_user, :email, :username, :password, :img_user, :created_at)";
        $this->db->query($query);
        $this->db->bind(':id_user', $id_user);
        $this->db->bind(':email', $email);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':img_user', $img_user);
        $this->db->bind(':created_at', $created_at);
        $this->db->execute();

        return $this->db->rowCount();
    }
}