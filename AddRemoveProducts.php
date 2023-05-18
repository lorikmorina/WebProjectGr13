<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        margin:10px;
        padding:0;
        box-sizing:border-box;
        outline:0;
        overflow:none;
    }
    body{
        display:-webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: block;
        align-items:center;
        justify-content:center;
        height:100vh;
        background:#0F1415;
    }
    .wrapper{
        width:500px;
        height:60px;
        position:relative;
    }
    .wrapper input{
        background:#0F1415;
        width:100%;
        height: 100%;
        border:3px solid white;
        border-radius:5px;
        padding-left:8px;
        color:white;
    }
    label{
        position: absolute;
        top:50%;
        left:15px;
        transform:translateY(-50%);
        transition:all .5s ease;
        font-size:20px;
        pointer-events:none;
        font-family:poppins;
        color:white;
    }
    input:focus + label,
    input:valid + label{
        font-size:15px;
        top:0;
        background:white;
        color:black;
        padding:5px;
    }
    .btn{
        position:relative;
        
    }
    .btn input{
        width:150px;
        height:50px;
        color:white;
        background: transparent;
        border:none;
        font-size:20px;
    }
    .btn input:hover{
        background:black;
        transition: 0.5s ease;
        
    }
    .image{
        position:relative;
        display:block;
        padding-top:10px;
        margin-bottom:-20px;
        margin-left:-5px;
    }
    .image label{
        position:relative;
        border:3px inset white;
        border-radius:5px;
        font-size:30px;
        padding:10px;
    }
    .image input{
        color:white;
        font-size:20px;
    }
</style>
<body>
    <form action="controllProducts.php" method="POST">
        <div class="wrapper">
            <input type="passowrd" name="title" required>
            <label for="">Title</label>
        </div>
        <div class="wrapper">
            <input type="text" name="author" required>
            <label for="">Author</label>
        </div>
        <div class="wrapper">
            <input type="text" name="description" required>
            <label for="">Description</label>
        </div>

        <div class="wrapper">
            <input type="text" name="price" required>
            <label for="">Price</label>
        </div>
        <div class="image">
            <label for="">Image</label>
            <input type="file" accept="image/*" name="image">
        </div>
        <div class="wrapper">
            <input type="text" name="category" required>
            <label for="">Category</label>
        </div>
        <div class="wrapper">
            <input type="number"  name="rating" required>
            <label for="">Rating</label>
        </div>
        <div class="btn">
            <input type="submit" name="submit">
            <input type="button" value="Cancle" name="cancle">
        </div>
    </form>
    
</body>
</html>