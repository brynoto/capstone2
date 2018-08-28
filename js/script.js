$(document).ready(function() {




});

  function addToCart(productid) {
    let id = productid;
    let quantity = $('#productQuantity'+id).val();
 
    $.ajax ({
      url : "controllers/add_to_cart.php",
      data : {"product_id": id,"product_quantity": quantity},
      method :"POST",
      success : function(data) {
        $('#successMsg').html(data);
      }
    });
  }