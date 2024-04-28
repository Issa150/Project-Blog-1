<?php
include_once '../../inc/function.php';
include_once "../../classes/GetUsers.php";
function creatingAccount($firstName,$lastName,$username, $email, $password) {
    $db = new Database();
    $pdo = $db->connection();
    $sql = "INSERT INTO users (name, lastName, username, email, password)
                        VALUE(:name, :lastName, :username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ":name" => $firstName,
        ":lastName"=>$lastName,
        ":username"=>$username,
        ":email"=>$email,
        ":password"=>$password
    ));


}

// Error variables
$firstNameErr = $lastNameErr = $usernameErr = $emailErr = $passwordErr = $passwordRepeatErr = $welcome = "";

if(!empty($_POST)) {

    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = strtolower(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $passwordRepeat = filter_input(INPUT_POST, 'passwordRepeat', FILTER_SANITIZE_SPECIAL_CHARS);
    $verifyTicket = true;


    
    if (empty($firstName)) {
        $firstNameErr = "First name is required!.";
        $verifyTicket = false;
        
    }else{
        if(strlen($firstName) <= 2){
            $firstNameErr = "First name must be at least 2 characters";
            $verifyTicket = false;
        }elseif(preg_match('/\d/', $firstName)){
            $firstNameErr = "No numbers are allowed in the first name field.";
            $verifyTicket = false;
        }
    }

    if (empty($lastName)) {
        $lastNameErr = "Family name is required!.";
        $verifyTicket = false;
    }else{
        if(strlen($lastName < 3)){
            $lastNameErr = "Last name must contain more than 3 characters.";
            $verifyTicket = false;
        }elseif(preg_match('/\d/', $lastName)){
            $firstNameErr = "No numbers are allowed in the last name field.";
            $verifyTicket = false;
        }
    }

    if (empty($username)) {
        $usernameErr = "This field can not be empty.";
        $verifyTicket = false;
    } elseif (strlen($username) < 5) {
        $usernameErr = "The value must be at least 5 characters!";
        $verifyTicket = false;
    }

    if (empty($email)) {
        $emailErr = "This field can not be empty.";
        $verifyTicket = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
        $verifyTicket = false;
    }

    if (empty($password)) {
        $passwordErr = "This field can not be empty.";
        $verifyTicket = false;
    } elseif (strlen($password) < 5) {
        $passwordErr = "The value must be at least 8 characters!";
        $verifyTicket = false;
    } else {
        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)$/i", $password)) {
            $passwordErr = "The password must contain at least one uppercase letter, one lowercase letter, and one digit.";
            $verifyTicket = false;
        }
    }

    if (empty($passwordRepeat)) {
        $passwordRepeatErr = "This field can not be empty.";
        $verifyTicket = false;
    } elseif ($password !== $passwordRepeat) {
        $passwordRepeatErr = "Passwords do not match.";
        $verifyTicket = false;
    }

    if ($verifyTicket) {

        // $user = getUser($username);
        $getuser = new GetUsers();
        $user = $getuser->getSingleUser( $username);
        // If the user is already registered show error message.
        if ($user != null) {
            $usernameErr = "Username already exists.";
            return;
        }else{
            // Code to create a new user account
            $passHash = password_hash($password,PASSWORD_ARGON2ID);
            creatingAccount($firstName, $lastName, $username, $email, $passHash);
            // echo "alert('Account successfully created, please login')";
            header('Location: login.php');

        }

    }
}