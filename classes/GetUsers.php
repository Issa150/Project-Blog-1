<?php
include_once "Database.php";

class getUsers extends Database {
    
    public function getSingleUser($param){
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute(array(
            ":username" => $param
        ));
        $user = $stmt->fetch();

        return $user;   
    }

    public function getSingle($table,$col,$val){
        $stmt = $this->connection->prepare("SELECT * FROM $table WHERE $col = :$col");

        $stmt->execute(array(
            ":$col" => $val
        ));
        $user = $stmt->fetch();

        return $user;   
    }

    public function getAllUsers(){
        $stmt = $this->connection->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll();

        return $users;
    }

    // Create
    // Insertion un utilisateur
    public function creatingAccount($firstName,$lastName,$username, $email, $password) {
        $sql = "INSERT INTO users (name, lastName, username, email, password)
                            VALUE(:name, :lastName, :username, :email, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(array(
            ":name" => $firstName,
            ":lastName"=>$lastName,
            ":username"=>$username,
            ":email"=>$email,
            ":password"=>$password
        ));
    
    
    }


    // Update
    //update one file
    public function updateSingleFile($col,$val,$id){
        $sql = "UPDATE users SET $col =:val
                WHERE id =:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":val" => $val,
            ':id'  => $id
        ]);

        //updateing the $_SESSION
        
    }
}