<?php
    require_once('dbConfig.php');

   
     // Set the values of the parameters
     $fullname = $_POST["Fullname"];
     $username = $_POST["username"];
     $email = $_POST["email"];
     $password = $_POST["password"];
     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
     $sql = "INSERT INTO users (id, fullName, email, username, saltedHash) VALUES (NULL, :fullname, :email, :username, :saltedHash)";
     $stmt = $conn->prepare($sql);

    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':saltedHash', $hashed_password);

    $stmt->execute();

header("Location: login.php");    
?>