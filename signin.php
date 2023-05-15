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
            echo "Password is incorrect!";
        }
    } else {
        echo "User not found!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>