  <?php
    $id = $_POST['id'];
    require 'connection.php';
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
  ?>
<form id="form-edit-item" method="POST" enctype="multipart/form-data" action="controllers/admin_edit.php?id=<?php echo $id ?>">
  <div class="md-form mb-5">
      <input type="text" name="prodName" id="prodName" class="form-control validate" value="<?php echo $product['name'] ?>">
      <label class="active" for="form34">Product name</label>
  </div>

  <div class="md-form mb-5">
      <textarea type="text" name="prodDesc" id="prodDesc" class="md-textarea form-control" rows="4"><?php echo $product['description'] ?></textarea>
      <label class="active" for="form29">Product Description</label>
  </div>

  <div class="md-form mb-5">
      <input type="number" name="prodPrice" id="prodPrice" class="form-control validate" value="<?php echo $product['price'] ?>">
      <label class="active" for="form32">Product Price</label>
  </div>

  <div class="md-form mb-5">
        <input type="number" name="listPrice" id="listPrice" class="form-control validate" value="<?php echo $product['list_price'] ?>">
      <label class="active" for="form8">List Price</label>
  </div>

  <div class="md-form">
      <label></label>
          <select name="subCategory" id="subCategory">
            <?php

            $subcategories_qry = "SELECT * FROM sub_categories";
            $subcategories = mysqli_query($conn, $subcategories_qry);
            foreach ($subcategories as $sub_category) {
              extract($sub_category);
              if ($id == $product['sub_category_id']) {
                echo "<option value='$id' selected>$name</option>";
              } else {
                echo "<option value='$id'>$name</option>";
              }
              
          } ?>
          </select>
  </div>

  <div class="md-form mb-5">
      <input type="file" name="prodImage" id="prodImage">
      <label for="form8"></label>
  </div>
</form>