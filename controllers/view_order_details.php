<?php
  require 'connection.php';
  $order_id = $_POST['id'];
  $sql = "SELECT * FROM order_details LEFT JOIN products ON products.id = product_id WHERE order_id = $order_id";
  $order_details = mysqli_query($conn, $sql) or mysqli_error($conn);
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($order_details as $order_detail): ?>
    <tr>
      <td><?php echo $order_detail['name'] ?></td>
      <td><?php echo $order_detail['quantity_id'] ?></td>
      <td><?php echo $order_detail['price'] ?></td>
      <td><?php echo $order_detail['price']*$order_detail['quantity_id'] ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>