<?php 
session_start();	
function get_title() {
	echo 'Shopping Cart';
}

function get_content() {
	global $conn;
	if (isset($_POST['cart_empty'])) {
			unset($_SESSION['cart']);
		}
		if (isset($_POST['cart_remove'])) {
			$id = $_POST['cart_remove'];
			unset($_SESSION['cart'][$id]);
			if (count($_SESSION['cart']) == 0) {
				unset($_SESSION['cart']);
			}
		}
		if (isset($_SESSION['cart'])) { ?>
		<?php } ?>

<div class="row">

	<?php if (isset($_SESSION['cart'])): ?>
		<div class="col-9">
				<h2>Products included:</h2>
			<div class="row">	
		<?php 
		$total = 0;
		$totalquantity = 0;
			foreach ($_SESSION['cart'] as $id => $quantity) {
				$cartQuery = "SELECT * FROM products WHERE id = $id";
				$result = mysqli_query($conn, $cartQuery);
				$product = mysqli_fetch_assoc($result);

				 ?>
			 		
		  <div class="col-3">

			<div class="card cart">
			  <div class="view overlay">
					  <img class="card-img-top" src="<?php echo $product['image']; ?>" alt="Card image cap">
					  <a>
				      <div class="mask rgba-white-slight"></div>
					  </a>
				  </div>
					</div>		
			   	 <div class="card-body cart2 success-color rounded-bottom">
				    <!-- Title -->
					<h5 class="card-title"><?php echo $product['name']; ?></h5>
					<hr class="hr-light">
					    <!-- Text -->
					<p class="card-text mb-1">Php:<?php echo number_format($product['price'],2); ?></p>
				    <p class="card-text mb-1">Quantity: <?php echo $quantity; ?></p>
				       <button type="button" class="btn btn btn-dark-green waves-effect">Update</button>
				    <p class="card-text mb-1">Subtotal Php:<span id=<?php echo "subtotal$id" ?>><?php
							$subtotal = $product['price']*$quantity;
							$totalquantity += $quantity;
							$total += $subtotal;
							echo $subtotal; ?></span></p>
						
					 <div class="card-action">
					   <button data-id="<?php echo $id ?>" type="button" class="remove-product btn btn-grey waves-effect">Remove</button>

				    </div>		
				 </div>	
			   </div> 	 
				
		<?php } ?>	
					
				</div> <!-- end 2nd row -->
			</div> <!-- end col-9 -->

			<div class="col-3">
				<?php  
				if (isset($_SESSION['logged_in_user'])) {
					echo "Hello ".$_SESSION['logged_in_user']."<br>";
					} else { ?>
					<p>Welcome Guest, please login.</p>
					<?php } ?>
				<h1>Order Summary</h1>
				<p>Quantity: <?php echo $totalquantity; ?></p>
				<h5>Total: <span id="total"><?php echo $total ?></span></h5>
				<button type="button" class="cart-empty btn btn-grey waves-effect">Empty Cart</button>
				<a href = "controllers/checkout.php" button type="button" class="btn btn-primary waves-effect">Pay with paypal</a>
			</div>
	<?php else: ?>
		<div class="col-12">
			<p>Cart is empty.</p>
		</div>
	<?php endif ?>

</div> <!-- end main row -->


<?php } ?>


<?php require_once "template.php"; ?>