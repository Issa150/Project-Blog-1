<?php
include_once "Database.php";

class Genreal extends Database
{
    public function counter($table, $column, $value, $user_id = 3){
        $sql = "SELECT COUNT(*) 
                FROM $table 
                WHERE $column = :$column 
                AND user_id = :$user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":$column" => $value,
            ":$user_id" => $user_id
        ]);
        $results = $stmt->fetch();
        return $results;
    }

    // Many to many relation tables like Categories & Posts need to be count more complecated
    public function counterJoin_3($categorie_id, $user_id){
        $sql = "SELECT COUNT(*) AS 'total'
                FROM post_categories pc
                JOIN categories c ON pc.category_id = c.id
                JOIN posts p ON pc.post_id = p.id
                WHERE c.id = :categorie_id AND p.user_id = :user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":categorie_id" => $categorie_id,
            ":user_id" => $user_id
        ]);
        $results = $stmt->fetch();
        return $results;
    }

}