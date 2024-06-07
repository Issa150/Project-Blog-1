<?php
include_once "Database.php";

class Comments extends Database
{
    public function getCommentsByPostId($postId)
    {
        $sql = "SELECT c.id, c.comment_text, c.created_at, u.username, u.image 
                FROM comments c 
                JOIN users u ON c.user_id = u.id 
                WHERE c.post_id = :postId";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":postId" => $postId
        ]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getCommentsCountByPostId($postId)
    {
        $sql = "SELECT COUNT(*) AS count FROM comments WHERE post_id = :postId";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":postId" => $postId
        ]);
        $result = $stmt->fetch();
        return $result['count'];
    }

    public function insertComment($postId, $userId, $comment)
    {
        $sql = "INSERT INTO comments(user_id, post_id,  comment_text) VALUES (:userId, :postId, :comment_text)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":postId" => $postId,
            ":userId" => $userId,
            ":comment_text" => $comment
        ]);
    }

    public function updateComment($commentId, $content)
    {
        $sql = "UPDATE comments SET content = :content, updated_at = NOW() WHERE id = :commentId";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":commentId" => $commentId,
            ":content" => $content
        ]);
    }

    public function isEdited($commentId)
    {
        $sql = "SELECT updated_at FROM comments WHERE id = :commentId";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ":commentId" => $commentId
        ]);
        $result = $stmt->fetch();
        return $result['updated_at'] !== null;
    }
}
