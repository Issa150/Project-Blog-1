<?php
include_once "Database.php";

class Categorie extends Database
{
    public function getAll()
    {
        $sql = "SELECT c.*, u.name
                FROM categories c 
                LEFT JOIN users u 
                ON c.user_id = u.id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }



    public function insertCategorie($title,$description, $user_id)
    {
        $sql = "INSERT INTO categories(title, description, user_id) VALUES (:title, :description, :user_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":title" => $title,
            ":description" => $description,
            ":user_id" => $user_id
        ]);
    }

}
