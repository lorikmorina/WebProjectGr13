<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@proread.com') {

} else {
    header("Location: login.php");
}

require_once 'dbConfig.php';

$productId = $_GET['productId'];

$query = "SELECT * from products WHERE id = '$productId' ORDER BY id DESC LIMIT 1";
// Prepare and execute the query
$stmt = $conn->prepare($query);
$stmt->execute();

// Fetch all the rows as associative array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>GFG- Store Data</title>
   </head>
   <body>
      
         <a href="manageProducts.php"><h1>< BACK</h1></a>

         <?php
         if (count($products) > 0) {?>
<!-- <form action="editHandle.php?productId=<?php echo $productId;  ?>" method="post" enctype="multipart/form-data">
             
             <p>
                            <label for="firstName">Titulli:</label>
                            <input type="text" name="title" id="firstName" value="<?php echo $row['title'] ?>" require>
                         </p>
              
                          
             <p >
                            <label id="oldPrice" for="lastName">Çmimi:</label>
                            <input type="text" name="price" id="lastName" value="<?php echo $row['price'] ?>" require>
                         </p>
              
                          
             <p>
                            <label for="Gender">Pershkrimi:</label>
                            <textarea name="description" id="description" require><?php echo $row['description'] ?></textarea>
                         </p>
              
                          
              
                        
              
                         <input type="submit" value="Ndrysho" name="submit" id="submitBtn">
                      </form> -->

                      <form action="editHandle.php?productId=<?php echo $productId;  ?>" method="post" enctype="multipart/form-data">
        <div class="wrapper">
            <input type="passowrd" name="title" value="<?php echo $products[0]['title'] ?>" required>
            <label for="">Title</label>
        </div>
        <div class="wrapper">
            <input type="text" name="author" value="<?php echo $products[0]['author'] ?>" required>
            <label for="">Author</label>
        </div>
        <div class="wrapper">
            <input type="text" name="description" value="<?php echo $products[0]['description'] ?>" required>
            <label for="">Description</label>
        </div>

        <div class="wrapper">
            <input type="text" name="price" value="<?php echo $products[0]['price'] ?>" required>
            <label for="">Price</label>
        </div>
        
         <div class="wrapper radio">
               <input type="radio" name="category"  id="featured"  value="featured" require>
               <label for="featured">Featured:</label>
        </div>

        <div class="wrapper radio">

               <input type="radio" name="category" id="newArrival" value="newArrival" require>
               <label for="newArrival">New Arrival:</label> <br>
               <br>
        </div>
       
        <div class="btn">
            <input type="submit" name="submit" value="Change">
            <input type="button" value="Cancel" name="cancel">
        </div>
    </form>
           <?php }
         ?>
         
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>


h1 {
   font-family: Raleway, sans-serif;
   font-weight: bold;
    font-size: 24px
}
   #submitBtn {
      cursor: pointer;
      font-size: 15px;
      padding: 8px 12px;
      color: white;
      background-color: green;
   }
a h1 {
   text-decoration: none;
   width: 100px;
   text-align: center;
   padding: 10px;
   color: white;
   background-color: black;
   border-radius: 15px;
}
   input {
      border: 1px solid black;
      border-radius: 5px;
   }
#description {
   height: 100px;
}

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
    .radio label {
        position: absolute;
        top:50%;
        left:40px;
    }
    .radio input:focus + label,
    .radio input:valid + label{
        top:50%;
        
    }
    .radio input {
        width: 50%;
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
    output {
        font-family:poppins;
        position: absolute;
        right: 15px;
        top: 0;
        color: white;
    }
    .wrapper .range {
        width:80%;
        float: right;
    }
</style>
   </body>
</html>