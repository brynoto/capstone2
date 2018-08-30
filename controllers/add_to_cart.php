<?php
session_start();
$id = $_POST['product_id'];
$quantity = $_POST['product_quantity'];


if(isset($_SESSION['cart'][$id])) {
	$_SESSION['cart'][$id] = $_SESSION['cart'][$id] + $quantity;
} else {
	$_SESSION['cart'][$id] = $quantity;
}

echo '  <div class="alert alert-warning" role="alert" id="successMsg">
  Your item has been added to cart!
</div>';


