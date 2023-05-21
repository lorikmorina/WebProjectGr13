<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['access']);
header("location: login.php");