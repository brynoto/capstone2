<div class="container-fluid">
    <div class="row">
      <div class="col">
        <div>
        <label for="sort">Sort by:</label>
           <select class="form-control" id="sort">
           <?php 
                $_SESSION['sort_array'] = ['name','price'];
                $sort = $_SESSION['sort_array'];
                for ($i=0; $i < count($sort); $i++) { ?>
                  <option value="<?php echo $i; ?>"><?php echo $sort[i]; ?></option>
            <?php } ?>   
            </select>
        <label for="order">Order:</label>
           <select class="form-control" id="order">
            <?php 
              $_SESSION['order_array'] = ['ascending','descending'];
              $sort = $_SESSION['order_array'];
              for ($i=0; $i < count($sort); $i++) { ?>
              <option value="<?php echo $i; ?>"><?php echo $sort[i]; ?></option>
            <?php } ?>   
           </select>
       </div>  
        <h2>Filter by:</h2>
         <h3>Categories</h3>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="defaultChecked2" checked>
              <label class="custom-control-label" for="defaultChecked2">All</label>
            </div>
              <?php 
                $categoriesQuery = "SELECT * FROM categories";
                $categories = mysqli_query($conn, $categoriesQuery);
                ?>

               <?php foreach($categories as $category):
                extract($category); ?>
                   <div class="form-check">
                      <input class="form-check-input" type="radio" name="category" id="category<?php echo $id; ?>"
                      value="<?php echo $id; ?>">
                      <label class="form-check-label" for="category <?php echo $id; ?>">
                      <?php echo $name; ?>
                     </label>
                  </div>
             <?php   
              $subcategoriesQuery = "SELECT * FROM sub_categories WHERE category_id = $id";
              $subcategories = mysqli_query($conn, $subcategoriesQuery);
              foreach ($subcategories as $subcategory) {
              extract($subcategory); ?> 
               <ul>
                  <a class="dropdown-item" href="#"><?php   echo $name; ?></a>
                  </ul>

                 <?php } ?>
               <?php endforeach ?>             
</div>  

<script type="text/javascript">
  $('[name="category"]').click(function() {
  $.get('controllers/filter_sort.php?category='+(this).val(), function(data) {
    $('#productlist').html(data);
  });
});

$('#sort').change(function() {
  $.get('controllers/filter_sort.php?sort='+$(this).val()+'&order='+$('#order').val(), function(data) {
    $('#productlist').html(data);
  });
});

$('#order').change(function() {
  $.get('controllers/filter_sort.php?order='+$(this).val()+'&sort='+$('#sort').val(), function(data) {
    $('#productlist').html(data);
  });
});
</script>