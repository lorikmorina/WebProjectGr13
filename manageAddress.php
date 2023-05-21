<?php
require_once("dbConfig.php");
session_start();
if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@proread.com') {

} else {
    header("Location: login.php");
}

    if (isset($_POST['proceed'])) {
        $userId = $_SESSION['id'];
        $name =$_POST['Name'];
        $address = $_POST['Address'];
        $city = $_POST['City'];
        $postcode =$_POST['Postcode'];
        $country = $_POST['Country'];
        $phoneNr = $_POST['PhoneNr'];

        $sql = "INSERT INTO useraddress (id, user_id, fullName, addresLine, city, postalCode, country, phoneNumber)
        VALUES (NULL, :user_id, :fullName, :address, :city, :postalCode, :country, :phoneNumber);";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':fullName', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':postalCode', $postcode);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':phoneNumber', $phoneNr);
        
        $stmt->execute();
        
    }

?>
