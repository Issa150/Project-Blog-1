<?php
include_once "Database.php";

class Posts extends Database
{
    public function getAll()
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }


    public function getPostInfosOffice($id)
    {
        $sql = "SELECT p.title,u.name AS 'author',t.title AS 'thematic', GROUP_CONCAT(c.title SEPARATOR ', ') AS categories,p.created_at
                FROM posts p 
                JOIN users u ON p.user_id = u.id
                JOIN thematics t ON p.thematic_id = t.id
                JOIN post_categories pc ON p.id = pc.post_id
                LEFT JOIN categories c ON pc.category_id = c.id 
                WHERE p.user_id = :id
                GROUP BY p.title
                ORDER BY p.id";
        // the last left join is forcing all categories no matter if it is null! (left means left is more important not the condition after left)
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

    public function addPostJoin($user_id, $title, $body, $image_cover, $published, $thematic_id, $categorie_id)
    {
        $sql = "INSERT INTO posts(user_id, title, body, image_cover,published, thematic_id) VALUES
                                ( :user_id, :title, :body, :image_cover, :published , :thematic_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":user_id" => $user_id,
            ":title" => $title,
            ":body" => $body,
            ":image_cover" => $image_cover,
            ":published" => $published,
            ":thematic_id" => $thematic_id
        ]);

        $post_id = $this->connection->lastInsertId();
        
        $sql = "INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, :category_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':post_id' => $post_id,
            ':category_id' => $categorie_id
        ]);
        
    }
    

    public function insertSingleFile($image_cover)
    {
        $sql = "INSERT INTO posts (image_cover) VALUE(:image_cover)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":image_cover" => $image_cover
        ]);
    }
}
