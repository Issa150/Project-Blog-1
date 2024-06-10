<?php
include_once "Database.php";

class Thematic extends Database
{
    // ********     Get   ********
    public function getAll()
    {
        $sql = "SELECT * FROM thematics";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getSingle($id)
    {
        $sql = "SELECT 
                t.*,
                u.name AS 'author'
            FROM thematics t 
            JOIN users u ON t.user_id = u.id
            WHERE t.id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    // ********     Add / Create   ********
    public function insertThematic($title, $description, $user_id)
    {
        $sql = "INSERT INTO thematics(title, description, user_id) VALUES (:title, :description, :user_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":title" => $title,
            ":description" => $description,
            ":user_id" => $user_id
        ]);
    }

    // ********    Update   ********
    public function updateThematic($id_thematic, $title, $description, $user_id)
    {
        $sql = "UPDATE thematics SET title = :title, description = :description, user_id = :user_id WHERE id = :id_thematic";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":title" => $title,
            ":description" => $description,
            ":user_id" => $user_id,
            ":id_thematic" => $id_thematic
        ]);
    }

    // ********     Delete   ********
    public function deleteThematic($id)
    {
        $sql = "DELETE FROM thematics WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);

        // Also delete associated posts
        $sql = "DELETE FROM posts WHERE thematic_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
