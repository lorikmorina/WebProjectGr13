<?php
session_start();
session_start();
if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@proread.com') {

} else {
    header("Location: login.php");
}

require_once 'dbConfig.php'; 
$productId = $_GET['productId'];



$query = "SELECT * from products WHERE id = '$productId' ORDER BY id DESC LIMIT 1";
// Prepare and execute the query
$stmt = $conn->prepare($query);
$stmt->execute();

// Fetch all the rows as associative array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($products) > 0) {
  
    $filename = $products[0]["image"]; // specify the path to the file you want to delete
if (file_exists($filename)) { // check if the file exists
    unlink($filename); // delete the file
    echo 'File '.$filename.' has been deleted.'; // display a message confirming the deletion
} else {
    echo 'File '.$filename.' does not exist.'; // display a message if the file does not exist
    die;
}

} else {
  echo "This product does not exist";

  }
  $query2 = "DELETE FROM products WHERE id = '$productId'";
$stmt2 = $conn->prepare($query2);
$stmt2->execute();
  echo "The product with ID: " . $productId . " is deleted";
  // delete file
header('location:manageProducts.php');
?>