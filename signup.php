<?php
    include('dbConfig.php');
    $fullname = $_POST["Fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    
    $statement = $link->prepare('INSERT INTO users (id,username, fullname, email,salted_hash)
    VALUES (NULL,:username, :email, :fullname,:salted_hash)');

    $statement->execute([
        'username' => "$username",
        'email' => "$email",
        'fullname' => "$fullname",
        'salted_hash' => "$hashed_password",
    ]);  

?>