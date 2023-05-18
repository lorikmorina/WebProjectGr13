<?php
    require_once("dbConfig.php");
    session_start();
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $rating = $_POST['rating'];


        $sql = "INSERT INTO products (id, title, author, description, price,image,category,rating) 
        VALUES (NULL, :title, :author, :description, :price,NULL,:category,:rating)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':rating', $rating);

        $stmt->execute();
        echo "ADDED SUSCESS";
    }
?>