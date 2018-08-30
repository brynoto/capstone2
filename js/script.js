$(document).ready(function() {

$('.btn.cart-empty').click(function(){
    $.ajax ({
      url : "controllers/cart_empty.php",
    }).done(function(){
      location.reload();
    });

});

$('.btn.remove-product').click(function(){
  const id = $(this).data('id');
  $.ajax ({
    url : "controllers/cart_remove.php",
    data: {id: id},
    method : "POST",
  }).done(function(){
    location.reload();
  });

});

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



