<?php 
session_start();
function get_title() {
  'Index';
}

function get_content() { 
  global $conn; ?>
  
<div class="row">
  <div class="col-md-4">
    
    <?php  

    if (isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role_id'] == 1) {

      echo "Hello ".$_SESSION['logged_in_user']['username']."<br>"; ?>

        <h2>Add Item</h2>
        <form method="POST" id="form" name="form" enctype="multipart/form-data" action="controllers/add_product.php">
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="prodName" id="prodName">
          </div>

          <div class="form-group">
            <label>Product Description</label>
            <textarea name="prodDesc" id="prodDesc"></textarea>
          </div>

          <div class="form-group">
            <label>Product Price</label>
            <input type="text" name="prodPrice" id="prodPrice">
          </div>

          <div class="form-group">
            <label>List Price</label>
            <input type="text" name="listPrice" id="listPrice">
          </div>

          
          <div class="form-group">
            <label>Product Sub-Category</label>
            <select name="subCategory" id="subCategory">

              <?php     
              $subcategories_qry = "SELECT * FROM sub_categories";
              $subcategories = mysqli_query($conn, $subcategories_qry);
              foreach ($subcategories as $sub_category) {
                extract($sub_category);
              echo "<option value='$id'>$name</option>";
            } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Product Image</label>
            <input type="file" name="prodImage" id="prodImage">
          </div>

          <div class="form-group">
            <button type="submit" id="saveButton">Save</button>
          </div>
        </form>
      </div>

      <div class="col-md-8">
        <h2>Product List</h2>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $sql = "SELECT * FROM products";
                $products = mysqli_query($conn, $sql);
                foreach ($products as $product) {
                  extract($product); ?>
              <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $price; ?></td>
                <td>
                  <?php 
                    

                   ?>

                </td>
                <td><?php echo $description; ?></td>
                <td>img<?php echo "$image"; ?></td>
                <td>
                  <a href="">Edit</a>
                  <a href="">Delete</a>
                </td>
              </tr>

              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>  
      <?php } else { ?>

 </div>
</div> 

<div class="header-wrapper"></div>
   
    <?php require_once "partials/left_sidebar.php" ?>

          
      <div class="col-6">

         <div id="successMsg"></div>
        <h1 class="text-center display-4" id="h1">Featured Products</h1>
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
  

<?php } ?>

<?php require_once "template.php"; ?>
