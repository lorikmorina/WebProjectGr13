<?php
    require_once('dbConfig.php');
    session_start();
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $question = $_POST['questions'];
        $userId = $_SESSION['id'];

        $sql = "SELECT * FROM users where id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $userId);
        
        if($stmt->execute()){
            $users = $stmt->fetch(PDO::FETCH_ASSOC);

            $nameDb = $users['fullName'];
            $emailDb = $users['email'];
            echo $nameDb;
            if(($nameDb == $name) && ($emailDb == $email)){
                $sql = "INSERT INTO questions(id,user_id,question) 
                values(NULL, :user_id, :question)";
                $stm = $conn->prepare($sql);
                $stm->bindParam(':user_id',$userId);
                $stm->bindParam(':question',$question);
                $stm->execute();
                header("location:index.php");
            }else{
                echo "ERORR name or email not equal";
            }
        }else{
            echo "something with database";
        }

    }




?>