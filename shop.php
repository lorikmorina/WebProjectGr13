<?php 

session_start();

require_once("dbConfig.php");
$offset = $_GET['page'] * 12;
$query = "SELECT * FROM products LIMIT 12 OFFSET $offset";
// Prepare and execute the query
$stmt = $conn->prepare($query);
$stmt->execute();

// Fetch all the rows as associative array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    


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
    <title>Shop</title>
</head>

<body>
<section id="header">
        <a href="index.php"><img src="logo2.png" alt="" width="150px" class="logo"></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active"  href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fa fa-shopping-bag"></i></a></li>
                <a href="#" id="close"> <i class="fa fa-times"></i></a>
                <li>
                <?php if(isset($_SESSION['user'])) {
                        ?><a href="profile.php"><i class="fa-solid fa-user" style="color:white"></i></a></li>
                <?php
                    }else {
                        ?>
                         <a href="signin.html">Login</a>
                        <?php 
                    }
                ?>
            </ul>
        </div>
        <div id="mobile">

            <a href="shop.php"><i class="fa fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>
    

    <section id="page-header">

        <h2>Shop from Home</h2>

        <p>Save more with coupons & up to 40% off!</p>
        
        <h3 id="randomTitle"></h3>


    </section>

    <section id="products" class="section-p1">

        <div class="pro-container">
             <!-- iterate through list and display a div for each -->
             <?php 
            foreach ($products as $product) {?>

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
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>

           <?php }
            
            ?>
            
            
            </div>
    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
    </section>

    <abbr id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletter</h4>
            <p>Get E-Mail updates about our latest arivals and <span>special offers.</span> </p>
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
    <script src="randomTitle.js"></script>

</body>

</html>