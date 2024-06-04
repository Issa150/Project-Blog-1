<?php
include_once "Database.php";

class Thematic extends Database
{
    public function getAll()
    {
        $sql = "SELECT * FROM thematics";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }



    public function insertThematic($title,$description)
    {
        $sql = "INSERT INTO thematics(title) VALUES (:title)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":title" => $title,
            ":description" => $description
        ]);
    }

}
