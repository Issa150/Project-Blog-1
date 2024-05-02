<?php
include_once "Newdb.php";

class Posts extends Newdb{
    public function getAll()
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }

    public function insertPost($title, $body, $user_id, $image_banner){
        $sql = "INSERT INTOR posts(title, body, user_id, image_banner) VALUES
                                (:title, :body, :user_id, :image_banner)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":title" => $title, 
            ":body" => $body, 
            ":user_id" => $user_id, 
            ":image_banner" => $image_banner 
        ]);


    }
}