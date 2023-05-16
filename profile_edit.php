<?php
    require_once('dbConfig.php');
    session_start();
    if(isset($_POST['btn'])) {
        $old_password =$_POST["old_password"];
        $new_password =$_POST["new_password"];
        $confirm_password =$_POST["confirm_password"];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $_SESSION['user']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $hashedPassword = $user['saltedHash'];

        
        if($confirm_password==$new_password){
            if(password_verify($old_password,$hashedPassword)){
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET saltedHash = :new_saltedHash WHERE username = :username";
                $stmt = $conn->prepare($sql);
            
                $stmt->bindParam(':new_saltedHash', $hashed_new_password);
                $stmt->bindParam(':username', $_SESSION['user']);
                $stmt->execute();
                echo "<br>PASSWORD CHANDED SUSCCESFULLY";
            }else{
                echo "Passowrd not correct";
            }
        }else{
            echo "Password dont match";
        }
    }
?>