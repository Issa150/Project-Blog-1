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


    public function getPostInfosOffice($id){
        $sql = "
        SELECT p.title, u.name AS 'author', t.title AS 'thematic', c.title AS 'category' ,p.created_at
        FROM posts p
        JOIN users u ON p.user_id = u.id
        JOIN post_themathics PT ON p.id = PT.post_id
        JOIN thematics t ON PT.thematic_id = t.id
        JOIN post_categories PC ON p.id = PC.post_id
        JOIN categories c ON PC.category_id = c.id
        WHERE p.user_id = :id;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
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


    public function insertPost($title, $body, $user_id, $image_cover, $published){
        $sql = "INSERT INTO posts(title, body, user_id, image_cover,published) VALUES
                                (:title, :body, :user_id, :image_cover, :published)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":title" => $title, 
            ":body" => $body, 
            ":user_id" => $user_id, 
            ":image_cover" => $image_cover ,
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