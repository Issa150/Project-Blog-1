<?php
// include_once "../config/Database.php";

class getUsers{
    private $db;
    
    public function __construct(){
        $this->db = new Database("localhost","root", "", "first_db" );
    }


    public function getSingleUser($par1, $parValue){
        $stmt = $this->db->connection()->prepare("SELECT * FROM users WHERE $par1 = ?");

        $stmt->execute(array(
            $par1 = $parValue
        ));
        $user = $stmt->fetch();

        return $user;
    }

    public function getAllUsers(){
        $stmt = $this->db->connection()->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll();

        return $users;
    }
    
        
    

}