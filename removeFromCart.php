<?php
session_start();
session_start();
if(isset($_SESSION['email'])) {

} else {
    header("Location: login.php");
}

require_once('dbConfig.php');
$cartProductId = $_GET['cartProductId'];

$query = "DELETE FROM carts WHERE id = '$cartProductId'";
$stmt = $conn->prepare($query);
$stmt->execute();

header('Location: cart.php');

?>