<?php
include_once "Database.php";

class Genreal extends Database
{
    public function counter($table, $column, $value){
        $sql = "SELECT COUNT(*) 
                FROM $table 
                WHERE $column = :$column";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([":$column" => $value]);
        $results = $stmt->fetch();
        return $results;
    }

}