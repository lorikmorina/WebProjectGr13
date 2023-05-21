<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@proread.com') {

} else {
    header("Location: login.php");
}
require_once 'dbConfig.php'; 
$category = $_GET['category'];
 if($category == 'featured') {
  $query = "SELECT * FROM products WHERE category = 'featured' ORDER BY id DESC";


} else if($category == 'newArrival') {
    $query = "SELECT * FROM products WHERE category = 'newArrival' ORDER BY id DESC";

} else if($category == 'all') {
    $query = "SELECT * FROM products";

} else {
    $query = "SELECT * FROM products";

}

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
    <title>Manage Products</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="manageStyle.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
      <a href="shop.php"><h1 class="heading-lv1">< Go Back</h1></a>
      <h1 class="heading-lv1">Products</h1>

      <div class="table-app" id="product-table-app">
        <div class="table-handler">
        

          <div class="table-handler-dropdown-cell">
            <div class="dropdown">
              <h3 class="dropdown-heading">
                <i class="fas fa-filter"></i> Category
              </h3>
              <select
                class="select js-handle-table js-filter"
                id="filter-category"
              >

                <option value="">Select</option>
                <option value="all">All</option>
                <option value="featured">Featured</option>
                <option value="newArrival">New Arrivals</option>
              </select>
            </div>
          </div>

        

          <div class="table-handler-dropdown-cell">
            <!-- TODO: add label and create style -->
            
          </div>
        </div>
        <!-- /.table-handler -->

        <div class="table-wrapper">
          <table class="table" id="table">
            <thead>
              <tr class="table-head">
                <th class="table-cell align-left">ID</th>
                <th class="table-cell align-left">Title</th>
                <th class="table-cell align-left">Price</th>
                <th class="table-cell align-left">Category</th>
                <th class="table-cell align-left">Image</th>
                <th class="table-cell align-left">Edit</th>
                <th class="table-cell align-left">Delete</th>
              </tr>
            </thead>

            <tbody>

<?php 
            foreach ($products as $product) {?>
          <tr>
                  <td><?php echo ($product['id']);  ?></td>
                  <td><?php echo ($product['title']);  ?></td>
                  <td><?php echo ($product['price']);  ?>  €</td>
                  <td><?php echo ($product['category']);  ?></td>
                  <td> <img src="<?php echo $product['image']; ?>" height="50px" alt=""></td>
                  <td><button class="deleteButton" id="editPro" onclick="editTheProduct(<?php echo ($product['id']);   ?>)">Edit</button></td>
                  <td><button class="deleteButton" id="deletePro" onclick="deleteTheProduct(<?php echo ($product['id']);   ?>)">Delete</button></td>
                </tr>
                


           <?php }
            
            ?>
            
            </tbody>
          </table>

          <div class="no-results hidden" id="no-results">
            <p class="no-results-message">
              No results found.
            </p>
          </div>
          <!-- /#no-results -->
        </div>
        <!-- /.table-wrapper -->
      </div>
      <!-- /.table-app -->
    </div>
    <!-- /.container -->
  <script>
    $("#filter-category").change(function(){
  var status = this.value;
  window.location.href = "manageProducts.php?category=" + status;
    });

    function deleteTheProduct(theId){
      if (confirm("Are you sure you want to delete this product?")) {
        window.location.href = "deletePro.php?productId=" + theId;

      } else {
    
  }
     

    }
    function editTheProduct(theId){
      window.location.href = "editPro.php?productId=" + theId;
     

    }
  </script>
  <style>
    a .heading-lv1{
      color: white;
    }
  #editPro {
    background-color: blue;
  }
    a h1 {
      width: 200px;
      text-align: center;
      border-radius: 10px;
    background-color: black;
    }
  </style>
  </body>
</html>