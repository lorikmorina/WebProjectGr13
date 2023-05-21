<section id="header">
        <a href="index.php"><img src="logo2.png" alt="" width="150px" class="logo"></a>

        <div>
            <ul id="navbar">
                <li><a  href="index.php" id="homeNav">Home</a></li>
                <li><a href="shop.php" id="shopNav">Shop</a></li>
                <li><a href="FAQ.php" id="blogNav">FAQs</a></li>
                <li><a href="blog.php" id="blogNav">Blog</a></li>
                <li><a href="about.php" id="aboutNav">About</a></li>

                <li><a href="contact.php" id="contactNav">Contact</a></li>
                <li id="lg-bag"><a href="cart.php" id="bagNav"><i class="fa fa-shopping-bag"></i></a></li>
                <a href="#" id="close"> <i class="fa fa-times"></i></a>
                <li>
                <?php if(isset($_SESSION['user'])) {
                        ?><a href="profile.php"><i class="fa-solid fa-user" style="color:white"></i></a></li>
                <?php
                    }else {
                        ?>
                         <a href="login.php" id="loginNav">Login</a>
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