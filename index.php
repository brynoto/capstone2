<?php 
session_start();
function get_title() {
  'Index';
}

function get_content() { 
  global $conn; ?>
  
<div class="header-wrapper"></div>

<?php require_once "partials/left_sidebar.php" ?>

    
<div class="col-6">
   <div id="successMsg"></div>
  <h1 class="text-center display-4" id="h1">Feature Products</h1>
    <div class="row" id="productlist">
       <?php
            $sort_array = $_SESSION['sort_array'];
            $order_array = $_SESSION['order_array'];
            $filter = '';
            if(isset($_GET['category'])) {
              if ($_GET['category'] == 'on') {
                
              } else {
                $filter .= $_GET['category'] ? " WHERE sub_category_id = ".$_GET['category'] : "";
              }
              
            }

            if(isset($_GET['sort']) && isset($_GET['order'])) {
              $filter .= " ORDER BY ".$sort_array[$_GET['sort']];
              $filter .= $order_array[$_GET['order']] == 'descending' ? " DESC" : "";
            }

    $productsQuery = "SELECT * FROM products".$filter;
    $products = mysqli_query($conn, $productsQuery);
    foreach ($products as $product) {
    extract($product); ?>
      <div class="card feature">
        <div class="view overlay zoom">
            <h5><?php echo $name; ?></h5>
           <img src="<?php echo "../$image"; ?>" class="img-thumb ">
             <div class="mask flex-center waves-effect waves-light""></div>
        </div>
        <div class="card-body ">
            <p class="list-price text-warning">List Price: <s><?php echo $list_price; ?></s></p>
            <p class="price">Our price: <?php echo $price; ?></p>
              <input type="number" min="1" id="productQuantity<?= $id ?>">
              <button onclick="addToCart(<?php echo $id; ?>)" type="button" class="btn btn-success">Add To Cart</button>
        </div>
      </div>
      <?php } ?>
    </div>

</div>
<?php require_once 'partials/right_sidebar.php'; ?>
  </div>
</div>

<?php } ?>
<?php require_once "template.php"; ?>
