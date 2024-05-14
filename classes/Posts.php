<?php
include_once "Database.php";

class Posts extends Database{
    public function getAll()
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public function getAllByJoin($sql)
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }


    public function insertPost($title, $body, $user_id, $published){
        $sql = "INSERT INTO posts(title, body, user_id,published) VALUES
                                (:title, :body, :user_id, :published)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":title" => $title, 
            ":body" => $body, 
            ":user_id" => $user_id, 
            ":published" => $published
        ]);
    }

    public function insertSingleFile($image_cover){
        $sql = "INSERT INTO posts (image_cover) VALUE(:image_cover)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":image_cover" => $image_cover
        ]);
    }
}