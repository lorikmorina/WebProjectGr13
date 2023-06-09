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
    <title>Contact</title>
</head>

<body>
<?php
//    header here
   include("header.php");
   ?>
    

    <section id="page-header" class="blog-header">

        <h2>#let's_talk</h2>

        <p>LEAVE A MESSAGE, We love to hear from you</p>

    </section>

    <address id="contact-details" class="section-p1">
        <div class="details">
            <b><span><mark id="mark3">GET</mark> <mark class="mark1">IN</mark> <mark
                        class="mark2">TOUCH</mark></span></b>
            <h2>Visit one of our agency location or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>Afrim Zhitia Prishtin </p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>proread@info.com </p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>+38349000000 </p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday: 9.00am to 16.pm </p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.5926651603595!2d21.16496201477374!3d42.64879462481212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ec1b6ecb2c1%3A0x7f0893730efce187!2sFakulteti%20Teknik!5e0!3m2!1sen!2s!4v1673206716062!5m2!1sen!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </address>
    <section id="form-details">
        <form action="">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Your Name" id="nameForm" onchange="checkForNumber()">
            <input type="email" placeholder="E-mail" id="emailForm">
            <input type="text" placeholder="Subject" id="subjectForm">
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal"
                onclick="checkForNumber();checkEmpty(document.getElementById('nameForm'),document.getElementById('emailForm'),document.getElementById('subjectForm'))">Submit</button>
        </form>

        <div class="people">
            <div>
                <img src="https://m.media-amazon.com/images/M/MV5BYTNlOGZhYzgtMmE3OC00Y2NiLWFhNWQtNzg5MjRhNTJhZGVmXkEyXkFqcGdeQXVyNzg5MzIyOA@@._V1_.jpg"
                    alt="">
                <p><span><i>Jeff Bezos</i></span> Senior Marketing Manager <br>
                    Phone: + 000 123 000 77 88 <br> Email: contact@example.com</p>
            </div>
            <div>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Elon_Musk_Royal_Society_%28crop2%29.jpg/330px-Elon_Musk_Royal_Society_%28crop2%29.jpg"
                    alt="">
                <p><span><b>Elon Musk</b></span> Senior Marketing Manager <br>
                    Phone: + 000 123 000 77 88 <br> Email: contact@example.com</p>
            </div>
            <div>
                <img src="https://simplydirect.com/wp-content/uploads/katelyn-austin-2022.jpg" alt="">
                <p><span><u>Emma Stone</u></span> Senior Marketing Manager <br>
                    Phone: + 000 123 000 77 88 <br> Email: contact@example.com</p>
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

    <h2>Drag and Drop</h2>
    <div class="draganddrop">
        <div id="drop1" ondrop="drop(event)" ondragover="allowDrop(event)">
            <img src="banner.jpg" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
        </div>
        <div id="drop2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    </div>

    <script src="script.js"></script>
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>

</body>

</html>