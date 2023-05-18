<?php
    require_once('dbConfig.php');
   session_start();
     // Set the values of the parameters
     $username = $_POST["username"];
     $password = $_POST["password"]; 
try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $hashedPassword = $user['saltedHash'];
    $id = $user['id'];
    $email = $user['email'];

    if ($user) {

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            header("location: index.php");
        } else {
            header("location: login.php?error=Password is incorrect!");

        }
    } else {
        header("location: login.php?error=User not found!");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>