<?php
 session_start();
require_once('dbConfig.php');
 $productId =1;
$productId = $_GET['proId'];

$query = "SELECT * FROM products WHERE id = '$productId' LIMIT 1";
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
    <script src="modal.js"></script>
    <link rel="stylesheet" href="modal.css">
    <title>ProDetails</title>
</head>

<body>

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
<?php
//    header here
   include("header.php");

   if (count($products) > 0) {
   ?>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <a href="#"><img src="<?php echo $products[0]['image']; ?>" width=100% id="MainImg" alt="image"></a>
            
        </div>
        

        <div class="single-pro-details">
            <h6>Home/Books</h6>
            <h4><?php echo $products[0]['title']; ?></h4>
            <div class="star" style="color: gold;">
                        <!-- full stars -->
                    <?php for ($i = 0; $i < $products[0]['rating']; $i++) {?>
                        <i class="fas fa-star"></i>
                         <?php   }?>
                            <!-- empty stars -->
                         <?php for ($i = 0; $i < 5 - $products[0]['rating']; $i++) {?>
                        <i class="far fa-star"></i>
                         <?php   }?>
        </div>
            <h2 id="price"><?php echo $products[0]['price']; ?>€</h2>

                <label>Quantity: </label>
                <input type="number" id="quantity" name="quantity" onchange="updateQuantity(this.value, <?php echo $products[0]['price']; ?>)"
                    value="1" min="1">
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
  var priceElement = document.getElementById("price");
  var quantityInput = document.getElementById("quantity");
  var originalPrice = <?php echo $products[0]['price']; ?>;

  quantityInput.addEventListener("input", updatePrice);

  function updatePrice() {
    var quantity = parseInt(quantityInput.value);

    var totalPrice = quantity * originalPrice;
    priceElement.innerText = totalPrice.toFixed(2) + "€";
  }

  // Call updatePrice initially
  updatePrice();
});
</script>
                    <a class="normal" href="#open-modal" onclick="addToCart(<?php echo $products[0]['id']; ?>, document.getElementById('quantity').value)" style=" font-size: 14px;
    font-weight: 600;
    padding: 15px 30px;
    color: #fff;
    background-color: #088178;
    border-radius: 4px;
    cursor: pointer;
    border: none;
    outline: none;
    transition: 0.2s;" >Add to Cart</i></a>





            <h4>Product Details</h4>
            <span id="bookDes"><?php echo $products[0]['description']; ?></span>
        </div>
    </section>
    <?php } else {
    echo "This product doesn't exist";
} ?>


    <section id="products" class="section-p1">
        <h2>Featured Products</h2>
        <p>Newest Trending Books</p>
        <div class="pro-container">
            <div class="pro">
                <img src="firstCover.jpg" alt="image">
                <div class="description">
                    <span>J.K Rowling</span>
                    <h5>Harry Potter and the Philosopher's Stone</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>12$</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="cover2.jpg" alt="image">
                <div class="description">
                    <span>J.K Rowling</span>
                    <h5>Harry Potter and the Prisoner of Azkaban</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>12$</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="cover3.jpg" alt="image">
                <div class="description">
                    <span>George R. Martin</span>
                    <h5>Game of Thrones</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>24$</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="cover4.jpg" alt="image">
                <div class="description">
                    <span>George R. Martin</span>
                    <h5>The Winds of Winter</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>24$</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
        </div>
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
            <img src="logo2.png" class="logo" alt="image" width="100px">
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
                <img src="app.png" alt="image" width="100px">
                <img src="play.png" alt="image" width="100px">
                <p>Secured Payment Gateways</p>
                <img src="pay.png" alt="image" width="200px">
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2023, ProRead, Best Local Online Book Store</p>
            <p id="date"></p>
        </div>
    </footer>

   
    <script src="addToCart.js"></script>
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/49b85c6328.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>
