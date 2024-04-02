<?php
include_once "Database.php";

class getUsers{
    private $db;
    
    public function __construct(){
        $this->db = new Database("localhost","root", "", "blog_1" );
    }


    public function getSingleUser( $param){
        $stmt = $this->db->connection()->prepare("SELECT * FROM users WHERE username = :username");

        $stmt->execute(array(
            ":username" => $param
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


/* 
public function getSingleUser($par1, $parValue){
        $stmt = $this->db->connection()->prepare("SELECT * FROM users WHERE $par1 = ?");

        $stmt->execute(array(
            $par1 = $parValue
        ));
        $user = $stmt->fetch();

        return $user;
    }
*/