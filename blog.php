<?php
 session_start();
require_once('dBConfig.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/49b85c6328.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <title>Blog</title>
</head>

<body>
    <?php 
    include('header.php')
    ?>

    <section id="page-header" class="blog-header">

        <h2>#mostSellingBooks</h2>

        <p id="changeTake" style="color: black">Read about two of the most selling books</p>
        <!-- <div>
            <button class="normal" onclick="changeF()">CHANGE</button>
    </div> -->
    </section>


    <section id="blog">
        <div class="blog-box">
            <div class="blog-img">
                <img src="productImages/don1.jpg" alt="image">
            </div>
            <div class="blog-details">
                <h4>#1 – Don Quixote (500 million copies sold) - Miguel de Cervantes</h4>
                <p id="setText1">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Laudantium unde voluptatum ratione rem.
                    Voluptatem iste quod tempora iure fuga quisquam maxime labore
                    quam doloribus sunt non adipisci voluptas, ea itaque!</p>
               

            </div>
        </div>

        <div class="blog-box">
            <div class="blog-img">
                <img src="productImages/atale.jpg" alt="image">
            </div>
            <div class="blog-details">
                <h4>#2 – A Tale of Two Cities (200 million copies sold) - Charles Dickens</h4>
                <p id="setText2">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Laudantium unde voluptatum ratione rem.
                    Voluptatem iste quod tempora iure fuga quisquam maxime labore
                    quam doloribus sunt non adipisci voluptas, ea itaque!
                </p>
            </div>
        </div>

        <!-- <div class="blog-box">
            <div class="blog-img">
                <img src="productImages/lord.jpg" alt="image">
            </div>
            <div class="blog-details">
                <h4>#3 – The Lord of the Rings (200 million copies sold) - J.R.R. Tolkien</h4>
                <p id="setText3" >Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Laudantium unde voluptatum ratione rem.
                    Voluptatem iste quod tempora iure fuga quisquam maxime labore
                    quam doloribus sunt non adipisci voluptas, ea itaque!</p>

            </div>
        </div> -->

       

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
                <img src="app.png" alt="image" width="100px">
                <img src="play.png" alt="image" width="100px">
                <p>Secured Payment Gateways</p>
                <img src="pay.png" alt="image" width="200px">
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2023, ProRead, Best Local Online Book Store</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>