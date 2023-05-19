<?php 

session_start();
require_once('dbConfig.php');
$productId = intval($_GET['productId']);
$userId = $_SESSION['id'];

if(isset($_GET['quantity'])) {
    $quantity = $_GET['quantity'];
} else {
    $quantity = 1;

}

    $sql = "INSERT INTO carts (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':product_id', $productId);
    $stmt->bindParam(':quantity', $quantity);

    $stmt->execute();

    header("Location: shop.php");
    
    ?>