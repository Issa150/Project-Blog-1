<?php
include_once "Database.php";

class Posts extends Database
{

    // ********     Get   ******** 
    //✅
    public function getSingleJoin($id)
    {
        $sql = "SELECT p.*, u.username, u.image 
                FROM posts p
                LEFT JOIN users u ON p.user_id = u.id
                WHERE p.id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }
    public function getSinglePostOfficeJoin($id)
    {
        $sql = "SELECT 
                p.*,
                u.name AS 'author',
                t.title AS 'thematic',
                GROUP_CONCAT(c.title SEPARATOR ', ') AS categories
            FROM posts p 
            JOIN users u ON p.user_id = u.id
            JOIN thematics t ON p.thematic_id = t.id
            JOIN post_categories pc ON p.id = pc.post_id
            LEFT JOIN categories c ON pc.category_id = c.id 
            WHERE p.id = :id
            GROUP BY p.id, p.title, u.name, t.title, p.created_at
            ORDER BY p.title";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        $result = $stmt->fetch();
        return $result;
    }

    public function getAllpostOfUser($id_user, $thematic_id )
    {
        $sql = "SELECT p.*, u.username AS author, u.image AS author_image
                FROM posts p
                LEFT JOIN users u ON p.user_id = u.id
                WHERE u.id = :id_user 
                AND thematic_id = :thematic_id
                ORDER BY id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':id_user' => $id_user,
            ':thematic_id' => $thematic_id
        ]);
        $results = $stmt->fetchAll();
        return $results;
    }
    // slide
    public function getAll($published, $param = "")
    {
        $sql = "SELECT * FROM posts WHERE published = :published $param";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':published' => $published]);
        $results = $stmt->fetchAll();
        return $results;
    }
    // home page feeds
    public function getAllJoin($thematic_id, $published = 'NOT NULL', $limit = "")
    {
        $sql = "SELECT p.*, u.username AS author, u.image AS author_image 
                FROM posts p
                LEFT JOIN users u ON p.user_id = u.id
                WHERE p.thematic_id = :thematic_id AND published = :published 
                $limit";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(
            [
                ':thematic_id'=> $thematic_id,
                ':published'=> $published
        ]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getAllPostsInsight()
    {
        $sql = "SELECT 
                    p.id,p.title,
                    u.name AS 'author',
                    t.title AS 'thematic',
                    GROUP_CONCAT(c.title SEPARATOR ', ') AS categories,
                    p.created_at as 'date'
                FROM posts p 
                JOIN users u ON p.user_id = u.id
                JOIN thematics t ON p.thematic_id = t.id
                JOIN post_categories pc ON p.id = pc.post_id
                LEFT JOIN categories c ON pc.category_id = c.id 
                GROUP BY p.id,p.title, u.name, t.title, p.created_at
                ORDER BY p.id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    
    

    //✅
    public function getAllPostsInfosOffice($id)
    {
        $sql = "SELECT 
                    p.id,p.title,
                    u.name AS 'author',
                    t.title AS 'thematic',
                    GROUP_CONCAT(c.title SEPARATOR ', ') AS categories,
                    p.created_at as 'date'
                FROM posts p 
                JOIN users u ON p.user_id = u.id
                JOIN thematics t ON p.thematic_id = t.id
                JOIN post_categories pc ON p.id = pc.post_id
                LEFT JOIN categories c ON pc.category_id = c.id 
                WHERE p.user_id = :id
                GROUP BY p.id,p.title, u.name, t.title, p.created_at
                ORDER BY p.id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        $results = $stmt->fetchAll();
        return $results;
    }
// unuseable
    public function getAllByJoin($sql)
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }


    // ********     Add / Create   ********
    public function addPostJoin($user_id, $title, $body, $image_cover, $published, $thematic_id, $categorie_ids)
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
        if (!empty($categorie_ids)) {
            foreach ($categorie_ids as $categorie_id) {
                $sql = "INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, :category_id)";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([
                    ':post_id' => $post_id,
                    ':category_id' => $categorie_id
                ]);
            }
        } else {
            $sql = "INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, NULL)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                ':post_id' => $post_id
            ]);
        }
    }


    public function insertSingleFile($image_cover)
    {
        $sql = "INSERT INTO posts (image_cover) VALUE(:image_cover)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":image_cover" => $image_cover
        ]);
    }


    // ********    Update   ********
    public function updatePostJoin($post_id, $user_id, $title, $body, $image_cover, $published, $thematic_id, $categorie_ids)
    {
        $sql = "UPDATE posts SET user_id = :user_id, title = :title, body = :body, image_cover = :image_cover, published = :published, thematic_id = :thematic_id WHERE id = :post_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":user_id" => $user_id,
            ":title" => $title,
            ":body" => $body,
            ":image_cover" => $image_cover,
            ":published" => $published,
            ":thematic_id" => $thematic_id,
            ":post_id" => $post_id
        ]);

        // Delete existing categories for the post
        $sql = "DELETE FROM post_categories WHERE post_id = :post_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":post_id" => $post_id
        ]);

        if (!empty($categorie_ids)) {
            foreach ($categorie_ids as $categorie_id) {
                $sql = "INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, :category_id)";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([
                    ':post_id' => $post_id,
                    ':category_id' => $categorie_id
                ]);
            }
        }
        else {
            $sql = "INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, NULL)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                ':post_id' => $post_id
            ]);
        }
    }
    


    // ********     Delete   ********
    public function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);

        // Also delete associated post categories
        $sql = "DELETE FROM post_categories WHERE post_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
