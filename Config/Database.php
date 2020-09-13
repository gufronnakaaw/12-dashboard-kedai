<?php 

// all method in this class is flexible
// you can use for any table in database
// keep enjoy - gufrnn
class Database {
    private $host = DB_HOST;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $dbname = DB_NAME;
    private $dbh; // database handler
    private $stmt; // statement

    // construct
    public function __construct()
    {
        // data source name
        $dsn = "mysql:host={$this->host}; dbname={$this->dbname}";
        $option = [
            "PDO::ATTR_PERSISTANT" => true,
            "PDO::ATTR_ERRMODE" => "PDO::ERRMODE_EXCEPTION"
        ];

        try {

            $this->dbh = new PDO( $dsn, $this->username, $this->password, $option );

        } catch (PDOException $e) {
            
            echo "connection failed!" . $e->getMessage();
            die();
        }

    }

    // query
    public function query($query){  
        
        $this->stmt = $this->dbh->prepare($query);
    }

    // execute
    public function execute()
    {
        $this->stmt->execute();
    }

    // binding
    public function bind($param, $value, $type = null)
    {
        if( is_null($type) ){
            switch( true ) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default: 
                    $type = PDO::PARAM_STR; 
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // get all data
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // get single data
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    
    // fetch column
    // public function fetchColumn()
    // {
    //     return $this->stmt->fetchColumn();
    // }

    public function __destruct()
    {
        $this->dbh = null;
        $this->stmt = null;
    }
}