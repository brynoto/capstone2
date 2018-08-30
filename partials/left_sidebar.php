<?php require "header.php"; ?>
<div class="container-fluid">
  <form action="index.php#h1">
    <button  class="btn btn-outline-default waves-effect">Click to Sort and order</button>
    <div class="row">
      <div class="col">
        <div>
        <label for="sort">Sort by:</label>
           <select class="form-control" id="sort" name="sort">
            <option disabled selected>Select name or price:
            </option>
           <?php 
                $_SESSION['sort_array'] = ['name','price'];
                $sort = $_SESSION['sort_array'];
                for ($i=0; $i < count($sort); $i++) { ?>
                  <option value="<?php echo $i; ?>"><?php echo $sort[$i]; ?></option>
            <?php } ?>   
            </select>
        <label for="order">Order:</label>
           <select class="form-control" id="order" name="order">
              <option disabled selected>Select order:
            </option>
            <?php 
              $_SESSION['order_array'] = ['ascending','descending'];
              $sort = $_SESSION['order_array'];
              for ($i=0; $i < count($sort); $i++) { ?>
              <option value="<?php echo $i; ?>"><?php echo $sort[$i]; ?></option>
            <?php } ?>   
           </select>
       </div>  

         <h3 class="font-weight-bold">Select Categories:</h3>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="defaultChecked2" name="category">
              <label class="custom-control-label" for="defaultChecked2"><h4>All Products</h4></label>
            </div>
              <?php 
                $categoriesQuery = "SELECT * FROM categories";
                $categories = mysqli_query($conn, $categoriesQuery);
                ?>

               <?php foreach($categories as $category):
                extract($category); ?>
                   <div class="list-group"> 
                    <a class="list-group-item list-group-item-success"><?php echo $name; ?></a>
                  </div>
               <ul>
             <?php   
              $subcategoriesQuery = "SELECT * FROM sub_categories WHERE category_id = $id";
              $subcategories = mysqli_query($conn, $subcategoriesQuery);
              foreach ($subcategories as $subcategory) {
              extract($subcategory); ?> 
                  <li style="list-style: none;"><input name="category" type="radio" value="<?php echo $id; ?>" id="subcategory<?php echo $id; ?>">
                  <label for="subcategory<?php echo $id; ?>"><?php   echo $name; ?></label></li>
                 <?php } ?>
                  </ul>
               <?php endforeach ?>            
</form>
</div>