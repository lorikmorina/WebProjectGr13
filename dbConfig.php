<?php  

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "php2023";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connection success";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>