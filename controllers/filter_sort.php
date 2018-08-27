<?php 
	session_start();
	$sort_array = $_SESSION['sort_array'];
	$order_array = $_SESSION['order_array'];

	if(isset($_GET['category'])) {
		$_SESSION['category'] = $_GET['category'];
	}

	if(isset($_GET['sort'])) {
		$_SESSION['sort'] = $_GET['sort'];
	}


	if(isset($_SESSION['sort']) && isset($_GET['order'])) {
		$_SESSION['order'] = $_GET['order'];
	}


	$filter = '';
	$filter .= $_SESSION['category'] ? " WHERE category_id = ".$_SESSION['category'] : "";
	$filter .= " ORDER BY ".$sort_array[$_SESSION]['sort']];
	$filter .= $order_array[$_SESSION['order']] == 'descending' ? " DESC" : "";

	require '../connection.php';
	$sql = "SELECT * FROM products".$filter;
	$products = mysqli_query($conn, $sql);
	foreach ($products as $product) {
            extract($product); ?>
            
        <div class="col-md-3">
          <div class="row">
       
           <h5><?php echo $name; ?></h5>
          </div>
          <div class="row">
            <img src="<?php echo $image; ?>" class="img-thumb">
            </div>
              <p class="list-price text-warning">List Price: <s><?php echo $list_price; ?></s></p>
              <p class="price">Our price: <?php echo $price; ?></p>
              <div class="row">
              <form method="POST" action="controllers/add_to_cart.php?id=<?= $id ?>">
              <input type="number" min="1" name="quantity">
              <button class="btn btn-success">Add To Cart</button>
            </form>
          </div>
         </div>     

          <?php } ?>


 ?>