<?php 
function get_title() {
  'Index';
}

function get_content() { ?>
  

<?php } ?>
<?php require_once "template.php"; ?>

<div class="header-wrapper"></div>
<!-- left sidebar -->

<?php require_once "partials/left_sidebar.php" ?>
      
 <div class="col-6">
       <h1 class="text-center display-4">Feature Products</h1>
      <div class="row" id="productlist">
           <?php 
            $productsQuery = "SELECT * FROM products";
            $products = mysqli_query($conn, $productsQuery);
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

      </div>
</div>
<?php require_once 'partials/detailsmodal.php'; ?>

    <!-- right sidebar  -->
    <div class="col">Right Sidebar</div>
  </div>
</div>





<?php require 'partials/footer.php'; ?>