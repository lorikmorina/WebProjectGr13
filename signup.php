<?php
    include('dbConfig.php');
    $fullname = $_POST["Fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

  
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Username or email already taken.";
        header("refresh:2;url=signup.html");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (id, username, email, fullname, salted_hash) VALUES ('NULL','$username', '$email', '$fullname','$hashedPassword')";
    if (mysqli_query($conn, $query)) {
        echo "Sign-up successful. You can now login.";

    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>