$(document).ready(function() {
    $('.add-to-cart-btn').click(function() {
        var productId = $(this).data('product-id');
        var quantity = 1; // Use default value from data-quantity attribute


        $.ajax({
            url: 'addtocart.php',
            method: 'GET',
            data: {
                productId: productId,
                quantity: quantity
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // alert(response.message);  // Display success message
                    // Optionally update the cart count or perform any other actions
                } else {
                    // alert(response.message);  // Display error message
                }
            },
            error: function() {
                alert('An error occurred while adding the product to the cart.');
            }
        });
    });


});

function addToCart(productId, quantity) { 
    $.ajax({
        url: 'addtocart.php',
        method: 'GET',
        data: {
            productId: productId,
            quantity: quantity
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // alert(response.message);  // Display success message
                // Optionally update the cart count or perform any other actions
            } else {
                // alert(response.message);  // Display error message
            }
        },
        error: function() {
            alert('An error occurred while adding the product to the cart.');
        }
    });

}