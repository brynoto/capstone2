<?php 
session_start();	
function get_title() {
	echo 'Shopping Cart';
}

function get_content() {
	global $conn;
	echo 'Content'; ?>



<div class="row">
	<div class="col-3" style="border: 2px solid black;">
		Cart Summary
		<p>Name</p>
		<p>Quantity</p>
		<p>Price</p>
		<h3>Total</h3>
	</div>
	<div class="col-9" style="border: 2px solid black;">
		<h2>Products included:</h2>
<?php 
	foreach ($_SESSION['cart'] as $id => $quantity) {
		$cartQuery = "SELECT * FROM products WHERE id = $id";
		$result = mysqli_query($conn, $cartQuery);
		$product = mysqli_fetch_assoc($result);

		 ?>
 
<div class="card cart">
  <div class="view overlay">
    <img class="card-img-top" src="<?php echo $product['image']; ?>" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">
    <!-- Title -->
    <h4 class="card-title"><?php echo $product['name']; ?></h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4"><h3>Php:<?php echo $product['price']; ?></h3></p>
  </div>

</div>
<!-- Card Dark -->



		
<?php } ?>	

<?php } ?>


<?php require_once "template.php"; ?>