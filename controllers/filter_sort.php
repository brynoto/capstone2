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
	$filter .= $_SESSION['category'] ? " WHERE sub_category_id = ".$_SESSION['category'] : "";
	$filter .= " ORDER BY ".$sort_array[$_SESSION['sort']];
	$filter .= $order_array[$_SESSION['order']] == 'descending' ? " DESC" : "";

	require '../connection.php';
	$sql = "SELECT * FROM products".$filter;
	$products = mysqli_query($conn, $sql);
	foreach ($products as $product) {
            extract($product); ?>
       <div class="card">
        <div class="view overlay zoom">
            <h5><?php echo $name; ?></h5>
           <img src="<?php echo "../$image"; ?>" class="img-thumb ">
             <div class="mask flex-center waves-effect waves-light""></div>
        </div>
        <div class="card-body ">
            <p class="list-price text-warning">List Price: <s><?php echo $list_price; ?></s></p>
            <p class="price">Our price: <?php echo $price; ?></p>
              <input type="number" min="1" name="quantity" id="productQuantity<?= $id ?>">
              <button onclick="addToCart(<?php echo $id; ?>)" type="button" class="btn btn-success">Add To Cart</button>
        </div>
      </div>
      <?php } ?>
    </div>