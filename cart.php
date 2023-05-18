<?php session_start();?>
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
        <div>
            <button class="normal" id="hide" onclick="Hide()">Hide</button>
            <button class="normal" id="show" onclick="Show()">Show</button>
        </div>
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
                    include('addtocart.php');
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $row) {
                            echo $row;
                        }
                    }
                ?>
            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div id="forms">
                <form action="#" autocomplete="on">
                    <input types="text" placeholder="Enter Your Coupon" pattern="[A-Za-z]{5}">
                    <button class="normal">Apply</button>
                    <input type="text" placeholder="Name" pattern="[A-Za-z]{20}" id="firstName">
                    <input type="text" placeholder="Last Name" pattern="[A-Za-z]{25}" id="lastName">
                    <br>
                    <input type="email" placeholder="Email" id="firstEmail">
                    <br>

                    <input type="password" name="" id="pass" placeholder="Password">

                    <br>
                    <div id="widthAuto">
                        <label for="genM">Male</label>
                        <input type="radio" name="gen" id="genM">
                        <br>
                        <label for="genF">Female</label>
                        <input type="radio" name="gen" id="genF">
                        <br>
                        <br>
                        <label for="range">Your Satisfaction With Our Services</label>
                        <input type="range" min="1" max="100" value="50" class="slider" id="range">
                        <br>
                        <input type="checkbox" id="check">

                        <label for="check">Be notified for our latest arrivals and our blogs</label>
                    </div>

                    <br>
                    <button class="normal" type="submit"
                        onclick="checkEmpty(document.getElementById('firstName'),document.getElementById('firstEmail'),document.getElementById('lastName'))">Submit</button>
                </form>

            </div>
        </div>

        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>$ 335</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td bgcolor="green">Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$ 335</strong></td>
                </tr>
            </table>
            
            <button class="normal" onclick="fadeNote()">Proceed to checkout</button>
            <h2 id="thankNote">THANK YOU FOR YOUR PURCHASE</h2>
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
</body>

</html>
<?php

    echo $i+=1;
?>