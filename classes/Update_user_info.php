<?php
include_once "Database.php";

class updateUserInfo extends Database
{
    public function updateUser($firstName, $lastName, $username, $email, $city, $country, $gender,$id)
    {
        $stmt = $this->connection->prepare("UPDATE users SET 
        name = :firstName, 
        lastName = :lastName, 
        username = :username, 
        email = :email,  
        city = :city, 
        country = :country,
        gender = :gender
        WHERE id = :id");
        $stmt->execute([
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':username' => $username,
            ':email' => $email,
            ':city' => $city,
            ':country' => $country,
            ':gender' => $gender,
            ':id' => $id // assuming the user's ID is stored in the session
        ]);
    }
}
