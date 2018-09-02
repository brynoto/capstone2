<?php
session_start();
$id = $_POST['product_id'];
$quantity = $_POST['product_quantity'];


if(isset($_SESSION['cart'][$id])) {
	$_SESSION['cart'][$id] = $_SESSION['cart'][$id] + $quantity;
} else {
	$_SESSION['cart'][$id] = $quantity;
} ?>

<div class="alert alert-warning" role="alert" id="successMsg"> <span><a href="../capstone2/cart.php" target ="_blank">
  Your item has been added to cart, check it here!</span>
</div>';


