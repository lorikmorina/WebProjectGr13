<?php
    require_once("dbConfig.php");
    session_start();

        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $price = intval($_POST['price']);
        $image = "test";
        $category = $_POST['category'];
        $rating =  intval($_POST['rating']);


        /////image 
        // check if form was submitted
        $target_dir = "productImages/"; // specify the target directory
        $path_info = pathinfo($_FILES["image"]["name"]);
        $fileExt = $path_info['extension'];
        $randomAdd = rand(1,10000);
        $target_file = $target_dir . basename($_FILES["image"]["tmp_name"]). $randomAdd . ".$fileExt"; // get the file name and append it to the target directory
        echo $target_file;
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "<h2 style='color: red;''>GABIM: Ky imazh ekziston</h2>";
          die;
        } else {
          // Check if file is an image
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if($check !== false) {
            
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
              
            } else {
                echo "<h2 style='color: red;''>GABIM: Ka ndodhur nje gabim teknik</h2>";
                die;
            }
          } else {
            echo "<h2 style='color: red;''>GABIM: File nuk eshte imazh</h2>";
          die;
          }
        }

    $sql = "INSERT INTO products (id, title, author, description, price, image, category, rating) 
        VALUES (NULL, :title, :author, :description, :price, :image, :category, :rating)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $target_file);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':rating', $rating);

    if ($stmt->execute()) {
        // echo "ADDED SUCCESS";
        header("location: shop.php");
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
?>