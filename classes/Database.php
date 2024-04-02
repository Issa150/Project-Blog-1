<?php

class Database{
    private $host;
    private $username;
    private $password;
    private $db_name;
    private $connection;


    public function __construct($host = 'localhost', $username = 'root', $password = '', $db_name = 'blog_1'){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;

    }
    
    public function connection(){
        
        try{
            $charset = 'utf8mb4';
            $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];  
            return $this->connection = new PDO($dsn, $this->username, $this->password, $opt); 
        }catch(PDOException $e){
            die('Connection failed: ' . $e->getMessage());
        }
    }
    


    public function closeConn(){
        $this->connection = null;
    }
}
