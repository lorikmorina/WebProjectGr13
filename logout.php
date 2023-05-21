<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['access']);

$cookieExpiration = time() -3600; // Set the cookie to expire in 30 days
                setcookie('logged_in_user', '', $cookieExpiration);
                setcookie('logged_in_id', '', $cookieExpiration);
                setcookie('logged_in_email', '', $cookieExpiration);
header("location: login.php");