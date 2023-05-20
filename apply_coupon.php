<?php
// var_dump($_POST);
session_start();
require_once('dbConfig.php');


// Retrieve the coupon code from the AJAX request
$couponCode = $_POST['coupon_code'];
// var_dump($couponCode);
// Prepare a query to fetch the coupon details
$query = "SELECT * FROM coupons WHERE code = :code AND active = 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(':code', $couponCode);
$stmt->execute();

// Check if a coupon with the provided code exists
if ($stmt->rowCount() > 0) {
  $coupon = $stmt->fetch(PDO::FETCH_ASSOC);
  $discount = $coupon['discount'];

  // Apply the discount to the total price
  $totalPrice = $_POST['total_price'];
  $discountedPrice = $totalPrice - ($totalPrice * ($discount / 100));

  $_SESSION['coupon_code'] = $coupon['code'];
  $_SESSION['cart_subtotal'] = $discountedPrice;
  // Return the discounted price as a JSON response
  echo json_encode(['discounted_price' => $discountedPrice]);

} else {
  // Coupon not found or inactive
  echo json_encode(['error' => 'Invalid coupon code']);
}
?>



