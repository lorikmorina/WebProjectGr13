<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['id']);
unset($_SESSION['email']);
header("location: signin.html");