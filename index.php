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

      echo '<blockquote class="blockquote bq-success"><h1 class="bq-title">Hello '.$_SESSION['logged_in_user']['username'].'<br></h1></blockquote>'; ?>
         <?php   
            if (isset($_SESSION['success_add_product']))
                {
                  echo "success";
                  unset($_SESSION['success_add_product']);
                }

           ?>
        <form method="post" id="form" name="form" enctype="multipart/form-data" action="controllers/add_product.php" class="text-center border border-light p-5">
            <p class="h4 mb-4">Add Item</p>
               <label>Product Name</label>
            <input type="text" name="prodName" id="prodName" class="form-control mb-4" placeholder="Name">
                <label>Product Description</label>
             <textarea class="form-control rounded-0" name="prodDesc" id="prodDesc" rows="3" placeholder="Enter description here"></textarea>
                <label>Product Price</label>
            <input type="number" name="prodPrice" id="prodPrice" class="form-control mb-4" placeholder="Price">
               <label>List Price</label>
            <input type="number" name="listPrice" id="listPrice" class="form-control mb-4" placeholder="List Price">
               <label>Product Sub-Category</label>
            <select name="subCategory" id="subCategory" class="browser-default custom-select mb-4">
                 <?php     
                      $subcategories_qry = "SELECT * FROM sub_categories";
                      $subcategories = mysqli_query($conn, $subcategories_qry);
                      foreach ($subcategories as $sub_category) {
                        extract($sub_category);
                      echo "<option value='$id'>$name</option>";
                    } ?>
            </select>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="prodImage" id="prodImage" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
              <button class="btn btn-info btn-block" type="submit" id="saveButton">Save</button>
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
                <td><?php echo $category_id; ?>      </td>
                <td><?php echo $description; ?></td>
                <td>img<?php echo "$image"; ?></td>
                <td>

                  <div class="text-center">
                      <a data-id=<?php echo $id ?> href="" class="btn btn-default btn-rounded mb-1 admin-btn-edit-item" data-toggle="modal" data-target="#modalContactForm">Edit Item</a>
                  </div>
                  <a data-id=<?php echo $id ?> href="" class="btn btn btn-warning btn-rounded mb-1 admin-btn-delete-item">Delete</a>
                </td>
              </tr>

              <?php } ?>
            </tbody>
          </table>
          <?php require 'partials/admin_edit_modal.php'; ?>
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
         <?php 
          if(isset($_SESSION['success_message'])) {
      echo "<span class='sucess_message'>".$_SESSION['success_message']."</span>";
      unset($_SESSION['success_message']);
          } ?>

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
