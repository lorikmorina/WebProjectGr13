<?php 
session_start();
if(isset($_COOKIE['logged_in_user'])) {
    $_SESSION['user'] = $_COOKIE['logged_in_user'];
    $_SESSION['id'] = $_COOKIE['logged_in_id'];
    $_SESSION['email'] = $_COOKIE['logged_in_email'];
    header("location: index.php");
 }
require_once("dbConfig.php");

$query = "SELECT * FROM products LIMIT 8";
// Prepare and execute the query
$stmt = $conn->prepare($query);
$stmt->execute();

// Fetch all the rows as associative array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    


?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/49b85c6328.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="modal.js"></script>
    <link rel="stylesheet" href="modal.css">
</head>

<body>


   <?php
//    header here
   include("header.php");
   ?>

    <section id="hero">
        <h4>New titles coming</h4>
        <h2>Best Prices</h2>
        <h1>On all Bestsellers</h1>
        <p>Save more with coupons & up to 40% off!</p>
        <a href="#goto"><button id="shbutton">Shop Now</button></a>
    </section>
    <section id="feature" class="section-p1">
        <div class="feature-box">
            <img src="feature1.jpg" alt="image">
            <h6>Quality Books</h6>

        </div>
        <div class="feature-box">
            <img src="feature1.jpg" alt="image">
            <h6>Lowest prices</h6>

        </div>
        <div class="feature-box">
            <img src="feature1.jpg" alt="image">
            <h6>Fastest Shipping</h6>

        </div>
        <div class="feature-box">
            <img src="feature1.jpg" alt="image">
            <h6>Free Shipping</h6>

        </div>

    </section>

    <!--  /////////MODAL Checkout/////////// -->


<div id="open-modal" class="modal-window">
  <div>
    <h1>Product added to cart!</h1>
    <div>Product succesfully added to cart!</div>
    <br>
    <div>
        <a id="closeModal" class="modal-close">Shop more</a>
        <a href="cart.php">Checkout</a>
        
</div>

  </div>
</div>
</div>
<!-- //////////////////// --> 
    <div id="goto"></div>
    <br><br><br>
    <section id="products" class="section-p1">
        <h2>Featured Books</h2>
        <p>Most loved Books right now</p>
        <div class="pro-container">
            <!-- iterate through list and display a div for each -->
            <?php 
            foreach ($products as $product) {?>
         <a href="sproduct.php?proId=<?php echo $product['id'] ?>">
            <div class="pro">
                <img src="<?php echo $product['image']; ?>" alt="image">
                <div class="description">
                    <span><?php echo $product['author']; ?></span>
                    <h5><?php echo $product['title']; ?></h5>
                    <div class="star">
                        <!-- full stars -->
                    <?php for ($i = 0; $i < $product['rating']; $i++) {?>
                        <i class="fas fa-star"></i>
                         <?php   }?>
                            <!-- empty stars -->
                         <?php for ($i = 0; $i < 5 - $product['rating']; $i++) {?>
                        <i class="far fa-star"></i>
                         <?php   }?>
                    </div>
                    <h4><?php echo $product['price']; ?>€</h4>
                </div>
                <a class="add-to-cart-btn" href="#open-modal" data-product-id="<?php echo $product['id']; ?>" data-quantity="1"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
        </a>
           <?php }
            
            ?>
            
            
        </div>
    </section>
    <section id="banner" class="section-m1">
        <h4>Go on Twitter</h4>
        <h2>Enjoy some amazing tweets about Books</h2>
        <button id="exploreButton" class="normal">Explore Tweets</button>

    </section>
    <section id="products" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Newest Trending Books</p>
        <div class="pro-container">
            <?php 
            foreach ($products as $product) {?>

            <div class="pro">
                <img src="<?php echo $product['image']; ?>" alt="image">
                <div class="description">
                    <span><?php echo $product['author']; ?></span>
                    <h5><?php echo $product['title']; ?></h5>
                    <div class="star">
                    <?php for ($i = 0; $i < $product['rating']; $i++) {?>
                        <i class="fas fa-star"></i>
                         <?php   }?>

                         <?php for ($i = 0; $i < 5 - $product['rating']; $i++) {?>
                        <i class="far fa-star"></i>
                         <?php   }?>
                    </div>
                    <h4><?php echo $product['price']; ?>€</h4>
                </div>
                <a class="add-to-cart-btn" href="#open-modal" data-product-id="<?php echo $product['id']; ?>" data-quantity="1"><i class="fas fa-shopping-cart cart"></i></a>
            </div>

           <?php }
            
            ?>
            
            
        </div>
    </section>
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>New Deal</h4>
            <h2>buy one get one free</h2>
            <span>the best classic books are on sale</span>
            <button class="white">Learn More</button>

        </div>
        <div class="banner-box banner-box2">
            <h4>bestsellers</h4>
            <h2>explore deals on bestselling books</h2>
            <span>if everyone is reading it, it must be good</span>
            <button class="white">Collection</button>

        </div>
    </section>


    <section id="banner3">
        <div class="banner-box">

            <h2>Winter Sale</h2>
            <h3>Winter is cozy with a good book</h3>


        </div>
        <div class="banner-box banner-box2 ">

            <h2>Winter Sale</h2>
            <h3>Winter is cozy with a good book</h3>


        </div>
        <div class="banner-box banner-box3">

            <h2>Winter Sale</h2>
            <h3>Winter is cozy with a good book</h3>


        </div>
    </section>
    <abbr id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletter</h4>
            <p>Get E-Mail updates about our latest arivals and <span class="cssContent"></span> </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </abbr>
    <footer class="section-p1">
        <div class="col">
            <img src="logo2.png" class="logo" alt="" width="100px">
            <h4>Contact</h4>
            <p> <strong>Address:</strong> 231 Prishtin Afrim Zhitia, 10000</p>
            <p> <strong>Phone:</strong> 049346316</p>
            <p> <strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
            <a href="mailto: proread@info.com">
                <p> <strong>Email:</strong> proread@info.com</p>
            </a>

            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/proread_official" id="geturl1"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                    <button id="getButton" onclick="getUrla()">CLICK</button>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="about.php">About Us</a>
            <a href="https://instagram.com/proread_official">Delivery information</a>
            <a href="https://instagram.com/proread_official">Privacy Policy</a>
            <a href="https://instagram.com/proread_official">Terms & Conditions</a>
            <a href="contact.php">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="signin.php">Sign In</a>
            <a href="https://instagram.com/proread_official">View Cart</a>
            <a href="https://instagram.com/proread_official">My Wishlist</a>
            <a href="https://instagram.com/proread_official">Track My Order</a>
            <a href="https://instagram.com/proread_official">Help</a>
        </div>
        <div class="col install">
            <h4>Install <abbr title="Application">App</abbr> </h4>
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
    <script src="script.js" defer></script>
    <script src="addToCart.js"></script>
    <script>
        document.getElementById('exploreButton').addEventListener('click', function() {
        window.location.href = 'tweets.php';
        });
    </script>
    
</body>

</html>