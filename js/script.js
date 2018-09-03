$(document).ready(function() {
  const updateCartBadge = function() {
    $.ajax({
      url: 'controllers/update_cart_badge.php',
      success : function(data) {
        $('#badge-items').html(data);
      }
    });
  };
    
  $('a.cart-update').click(function() {
    const id = $(this).data("id");
    const quantity = Number($(this).prev().val());
    if (quantity <= 0 || !Number.isInteger(quantity)) {
      alert('Please enter a positive integer.')
    } else {
      $.post('controllers/cart_update.php',
        { id: id, quantity: quantity },
        function(data) {
           location.reload();
          // M.toast({html: 'Updated cart successfully!'});
          // console.log(data);
          const price = $('#price'+id).html();
          const prevQuantity = $('#quantity'+id).html();
          const prevTotal = $('#total').html();
          $('#quantity'+id).html(quantity);
          $('#subtotal'+id).html(quantity*price);
          $('#total').html(prevTotal - price*prevQuantity + price*quantity);
           updateCartBadge();
         
      });
    }
  });

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

  $('.admin-btn-edit-item').click(function() {
    const id = $(this).data('id');
    $.ajax({
      url: 'controllers/admin_get_item_details.php',
      data: { id: id },
      method: 'post',
      success: function(data) {
        $('#modal-body').html(data);
      }
    });
  });

  $('#btn-edit-item').click(function() {
    // tapos na si user mag-edit
    // save changes
    $('#form-edit-item').submit();
  });

  $('.admin-btn-delete-item').click(function() {
    const id = $(this).data('id');
    $.ajax({
      url: 'controllers/delete_item.php',
      data: { id: id },
      method: 'post',
      success: function(data) {
        location.reload();
      }
    });
  });

  $('[data-target="#viewOrderDetails"]').click(function() {
    const id = $(this).data('id');
    $.ajax({
      url: 'controllers/view_order_details.php',
      data: { id: id },
      method: 'post',
      success: function(data) {
        $('#modal-body-order-details').html(data);
      }
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



