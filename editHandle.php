<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@proread.com') {

} else {
    header("Location: login.php");
}

require_once 'dbConfig.php';
$productId = $_GET['productId'];
$newTitle = $_POST['title'];
$newAuthor = $_POST['author'];
$newPrice = $_POST['price'];
$newDesc = $_POST['description'];
$newCategory = $_POST['category'];

$query = "UPDATE products SET title = :newTitle, author = :newAuthor ,description = :newDesc, price = :newPrice, category = :newCategory  WHERE id = :productId";
// Prepare and execute the query\
$stmt = $conn->prepare($query);

    $stmt->bindParam(':newTitle', $newTitle);
    $stmt->bindParam(':newAuthor', $newAuthor);
    $stmt->bindParam(':newDesc', $newDesc);
    $stmt->bindParam(':newPrice', $newPrice);
    $stmt->bindParam(':newCategory', $newCategory);
    $stmt->bindParam(':productId', $productId);
$stmt->execute();
if($stmt) {
    header("Location: manageProducts.php");
} else {
    echo "Something went wrong";
}
?>
