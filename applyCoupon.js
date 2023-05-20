$(document).ready(function() {
    var originalPrice = parseFloat($('#totalPrice').text()); // Store the original total price
  
    $('#applyCouponButton').click(function(event) {
      event.preventDefault(); // Prevent the default form submission behavior
  
      var couponCode = $('#couponCodeInput').val();
      var totalPrice = originalPrice; // Use the original total price
  
      $.ajax({
        url: 'apply_coupon.php',
        method: 'POST',
        data: { coupon_code: couponCode, total_price: totalPrice },
        dataType: 'json',
        success: function(response) {
          if (response.hasOwnProperty('discounted_price')) {
            var discountedPrice = response.discounted_price;
  
            // Update the displayed discounted price
            $('#totalPrice').text(discountedPrice.toFixed(2));
            originalPrice = discountedPrice; // Update the original price with the discounted price
            $('#hiddenCoupon').css("display", "none");
            $('#appliedCoupon').show();
            $('#appliedCouponCode').text(couponCode);
          } else if (response.hasOwnProperty('error')) {
            alert(response.error);
          }
        },
        error: function() {
          alert('An error occurred while applying the coupon.');
        }
      });
    });
  });