<?php 

session_start();

require_once("dbConfig.php");

$pageNr = 1;
if(isset($_GET['pageNr'])) {
   $pageNr = intval($_GET['pageNr']);
}
$offset = 12* $pageNr - 12;
// Get image data from database
// if($type == NULL) {
//    $result = $db->query("SELECT * FROM allProducts WHERE title LIKE '%{$search}%' ORDER BY id DESC LIMIT 9 OFFSET $offset");
//    $setPath = "searchBar=". $search;
// } else {
   
//       $setPath = "type=$type";
//       $result = $db->query("SELECT * FROM allProducts WHERE category = '$type' ORDER BY id DESC LIMIT 9 OFFSET $offset"); 
   
   

// }
$query = "SELECT * FROM products LIMIT 12 OFFSET $offset";
// Prepare and execute the query
$stmt = $conn->prepare($query);
$stmt->execute();

// Fetch all the rows as associative array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$disableNext = 'style="display: show;"';
$disablePrev = 'style="display: show;"';
if(count($products) < 12){
   
   $disableNext = 'style="display: none;"';
}
if($pageNr <= 1) {
   $disablePrev = 'style="display: none;"';
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
    <script src="modal.js"></script>
    <link rel="stylesheet" href="modal.css">
    <title>Shop</title>
</head>

<body>
<?php
//    header here
   include("header.php");
   ?>
    

    <section id="page-header">

        <h2>Shop from Home</h2>

        <p>Save more with coupons & up to 40% off!</p>
        <?php
              if(isset($_SESSION['access'])){
                if($_SESSION['access'] == 0){  
                echo 
                '<div>'. 
                    '<button class="normal" id="show" name="addproduct"><a href="AddRemoveProducts.php" style="text-decoration:none;color:black;">Add</a></button>'.
                    '<button class="normal" id="show" name="manageProduct"><a href="manageProducts.php" style="text-decoration:none;color:black;">Manage</a></button>'.
                '</div>';
            }
        }
        ?>
        <h3 id="randomTitle"></h3>


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


    <section id="products" class="section-p1">

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

    <section id="pagination" class="section-p1">
        <a  <?php echo $disablePrev;?> href="shop.php?<?php $prev = $pageNr - 1;  echo "&pageNr=$prev"; ?>" >Pas</a>
        <a><?php echo $pageNr; ?></a>
        <a <?php echo $disableNext; ?> href="shop.php?<?php $next = $pageNr +1; echo "&pageNr=$next"; ?>">Para</a>
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
    <script src="addToCart.js"></script>

</body>

</html>