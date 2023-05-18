<?php
    require_once('dbConfig.php');
   session_start();
     // Set the values of the parameters
     $username = $_POST["username"];
     $password = $_POST["password"]; 
try {
    
    $stm = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stm->bindParam(':username', $username);
    $stm->execute();
    $users = $stm->fetch(PDO::FETCH_ASSOC);

    $stm1 = $conn->prepare("SELECT * FROM admins WHERE username = :username");
    $stm1->bindParam(':username', $username);
    $stm1->execute();
    $admins = $stm1->fetch(PDO::FETCH_ASSOC);

   
    
    if ($users) {
        $_SESSION['access'] = 1;
        $hashedPassword = $users['saltedHash'];
        $id = $users['id'];
        $email = $users['email'];
        
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            header("location: index.php");
        } else {
            header("location: login.php?error=Password is incorrect!  HYSEN $hashedPassword");
        }
    }else if($admins){
        $_SESSION['access'] = 0;
        $hashedPassword = $admins['saltedHash'];
        $id = $admins['id'];
        $email = $admins['email'];
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            header("location: index.php");
        } else {
            header("location: login.php?error=Password is incorrect!  HYSEN $hashedPassword");
        }
    }else {
        header("location: login.php?error=User not found!");
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>