<?php require_once("dbConfig.php"); 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php include("header.php");?>

<section id="form-details">
        <form action="questionManage.php" method="POST">
            <span>Ask a question</span>
            <h2></h2>
            <input type="text" placeholder="Your Name" id="nameForm"  name="name">
            <input type="email" placeholder="E-mail" id="emailForm" name="email">
            <input type="text" placeholder="Questions" id="subjectForm" name="questions">
            <button class="normal" name="submit">Submit</button>
        </form>
    </section>
</body>
</html>