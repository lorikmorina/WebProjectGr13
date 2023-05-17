<?php 
    $newRow = "";
    if (isset($_POST['addtocart'])) {
        if (!isset($_SESSION['counter'])) {
            $_SESSION['counter'] = 0;
        }
        $_SESSION['counter']++;
        $value = 'row'.$_SESSION['counter'];

        $quantity = $_POST['quantity'];
     
        // Generate a unique ID for each product
    
        $newRow = "<tr id='pro2' name='$value'>".
            '<td> <a name="remove" onclick="removeProduct(document.getElementById(\'pro2\'))"><i class="far fa-times-circle"></i></a></td>' .
            '<td><img src="https://b3c4r2f7.stackpathcdn.com/24350-home_default/sekretet-e-familjes-tajd.jpg"></td>' .
            '<td>NEW BOOK</td>' .
            '<td>$12</td>' .
            '<td>' . $quantity . '</td>' .
            '<td>$' . ($quantity * 12) . '</td>' .
            '</tr>';
    
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = []; // Initialize cart as an empty list
        }
    
        $_SESSION['cart'][] = $newRow; // Add new row to the cart list
    }
    if (isset($_POST['remove'])) {
        $name = $_POST['remove'];
        foreach ($_SESSION['cart'] as $key => $row) {
            if (strpos($row, "name='$name'") !== false) {
                unset($_SESSION['cart'][$key]); // Remove the row from the cart
                break;
            }
        }
    }
    
?>