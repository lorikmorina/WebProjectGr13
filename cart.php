<?php session_start();
require_once('dbConfig.php');
$userId = $_SESSION['id'];

// SQL query to fetch products from the user's cart
$sql = "SELECT products.title, products.image, products.price,carts.id, carts.quantity
        FROM carts
        JOIN products ON carts.product_id = products.id
        WHERE carts.user_id = :user_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $userId);
$stmt->execute();

// Fetch all rows as an associative array
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cartSubTotal = 0;
if(isset($_SESSION['coupon_code' . $userId])) {
    $appliedCoupon =  $_SESSION['coupon_code' . $userId];
    // unset( $_SESSION['coupon_code'  . $userId]);
    $appliedCouponStyle = "display: show;";
    $hiddenCoupon = "display:none;";
    $cartTotal = $_SESSION['cart_subtotal' . $userId];
} else {
    $appliedCouponStyle = "display: none;";
    $hiddenCoupon = "display:show;";
    $cartTotal = 0;
}
    #
    #Check if the user has already Purchased something
    if (isset($_SESSION['id'])) {

        $userId = $_SESSION['id'];
        $sql = "SELECT * FROM useraddress WHERE user_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        $userAddress = $stmt->fetch(PDO::FETCH_ASSOC); 
        if ($userAddress) {
            $fullName = $userAddress['fullName'];
            $address = $userAddress['addresLine'];
            $city = $userAddress['city'];
            $postalCode = $userAddress['postalCode'];
            $country = $userAddress['country'];
            $phoneNumber = $userAddress['phoneNumber'];
        }else {
   
            $fullName = '';
            $address = '';
            $city = '';
            $postalCode = '';
            $country = '';
            $phoneNumber = '';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/49b85c6328.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Cart</title>
</head>

<body>
<?php
//    header here
   include("header.php");
   ?>
    

    <section id="page-header" class="blog-header">

        <h2>#Cart</h2>

        <p>Add your coupon code & SAVE upto 70%!</p>
       
    </section>
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Display the product information
                    foreach ($rows as $row) {
                        
                            $cartSubTotal += intval($row['price']) * intval($row['quantity']);
                            if(isset($_SESSION['coupon_code' . $userId])) {
                                $cartTotal = $cartSubTotal - ($cartSubTotal * ($_SESSION['cart_discount' . $userId] / 100));
                            } else {
                                $cartTotal = $cartSubTotal;
                            }

                        ?>

                        <tr>
            
                    <td><a href="removeFromCart.php?cartProductId=<?php echo $row['id']; ?>"><i class="far fa-times-circle"></i></a></td>
                    <td><img src="<?php echo $row['image']; ?>"
                            alt=""></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['price']; ?>€</td>
                    <td><input type="number" value="<?php echo $row['quantity']; ?>"></td>
                    <td><?php echo intval($row['price']) * intval($row['quantity']); ?>€</td>
                </tr>

                 <?php   }
                ?>
            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <div id="hiddenCoupon" style="<?php echo $hiddenCoupon; ?>">
            <h3>Apply Coupon</h3>
            <input type="text" id="couponCodeInput" placeholder="Enter Your Coupon(Optional)">
                    <button class="normal" id="applyCouponButton">Apply</button>
                    </div>
            <div id="forms">
    
                <form action="manageAddress.php" method="POST">
                   
                    <input type="text" placeholder="Full Name"  id="name" name="Name" value="<?php echo isset($fullName) ? $fullName : ''; ?>">

                    <input type="text" placeholder="Address Line"  id="address" name="Address" value="<?php echo isset($address) ? $address : ''; ?>">
                    <input type="text" placeholder="City"  id="city" name="City" value="<?php echo isset($city) ? $city : ''; ?>">
                    <br>
                    <input type="text" placeholder="Postal Code"  id="postcode" name="Postcode" value="<?php echo isset($postalCode) ? $postalCode : ''; ?>">
                    <br>
                    <input type="text" placeholder="Country"  id="country" name="Country" value="<?php echo isset($country) ? $country : ''; ?>">
                    <br>
                    <input type="text" placeholder="Phone Number"  id="phone" name="PhoneNr" value="<?php echo isset($phoneNumber) ? $phoneNumber : ''; ?>">
                    <br>

                    <br>
                    <button class="normal" name="proceed">Proceed to checkout</button>
                </form>

            </div>
        </div>

        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td id="subTotalPrice"><?php echo $cartSubTotal; ?>€</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td bgcolor="green">Free</td>
                </tr>
                <tr id="appliedCoupon" style="<?php echo $appliedCouponStyle; ?>">
                    <td>Coupon Applied</td>
                    <td id="appliedCouponCode" bgcolor="green"><?php echo $appliedCoupon; ?></td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong id="totalPrice"><?php echo $cartTotal; ?>€</strong></td>
                </tr>
            </table>     
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img src="logo2.png" class="logo" alt="" width="100px">
            <h4>Contact</h4>
            <p> <strong>Address:</strong> 231 Prishtin Afrim Zhitia, 10000</p>
            <p> <strong>Phone:</strong> 049346316</p>
            <p> <strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-pinterest-p"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="about.html">About Us</a>
            <a href="https://instagram.com/proread_official">Delivery information</a>
            <a href="https://instagram.com/proread_official">Privacy Policy</a>
            <a href="https://instagram.com/proread_official">Terms & Conditions</a>
            <a href="contact.html">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="signin.html">Sign In</a>
            <a href="https://instagram.com/proread_official">View Cart</a>
            <a href="https://instagram.com/proread_official">My Wishlist</a>
            <a href="https://instagram.com/proread_official">Track My Order</a>
            <a href="https://instagram.com/proread_official">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From Appstore or Google Play</p>
            <div class="row">
                <img src="app.png" alt="" width="100px">
                <img src="play.png" alt="" width="100px">
                <p>Secured Payment Gateways</p>
                <img src="pay.png" alt="" width="200px">
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2023, ProRead, Best Local Online Book Store</p>
        </div>
    </footer>


    <script src="script.js"></script>
    <script src="applyCoupon.js"></script>
</body>

</html>
<?php

?>