<?php
include_once "Database.php";

class Categorie extends Database
{
    // ********     Get   ********
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

    public function getAllMyCategories($user_id)
    {
        $sql = "SELECT c.*, u.name
                FROM categories c 
                LEFT JOIN users u 
                ON c.user_id = u.id
                WHERE user_id = :$user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([":$user_id" => $user_id]);
        $results = $stmt->fetchAll();
        return $results;
    }


    public function getSingle($id)
    {
        $sql = "SELECT 
                c.*,
                u.name AS 'author'
            FROM categories c 
            JOIN users u ON c.user_id = u.id
            WHERE c.id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // ********     Add / Create   ********
    public function insertCategorie($title, $description, $user_id)
    {
        $sql = "INSERT INTO categories(title, description, user_id) VALUES (:title, :description, :user_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":title" => $title,
            ":description" => $description,
            ":user_id" => $user_id
        ]);
    }



    // ********    Update   ********
    public function updateCategorie($id_category, $title, $description, $user_id)
    {
        $sql = "UPDATE categories SET title = :title, description = :description, user_id = :user_id WHERE id = :id_category";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":title" => $title,
            ":description" => $description,
            ":user_id" => $user_id,
            ":id_category" => $id_category
        ]);
    }


    // ********     Delete   ********
    public function deleteCategorie($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);

        // Also delete associated post categories
        $sql = "DELETE FROM post_categories WHERE category_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
