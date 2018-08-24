<nav class="navbar navbar-expand-lg navbar-dark grey darken-4">
 <div class="container">

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

<!-- logo -->
   <a class="navbar-brand px-lg-3 mr-0" href="#">
     <img src="img/logo3.png" width="100" height="100" alt="">
   </a>
<!-- end logo -->
  <div class="collapse navbar-collapse justify-content font-weight-bold" id="navbar">
    <ul class="navbar-nav">
      <?php 
        $categoriesQuery = "SELECT * FROM categories";
        $categories = mysqli_query($conn, $categoriesQuery);
        foreach($categories as $category) {
          extract($category); ?>

           <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $name; ?></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                  <?php   
                    $subcategoriesQuery = "SELECT * FROM sub_categories WHERE category_id = $id";
                    $subcategories = mysqli_query($conn, $subcategoriesQuery);
                    foreach ($subcategories as $subcategory) {
                      extract($subcategory); ?>
                  
                    <a class="dropdown-item" href="#"><?php   echo $name; ?></a>
                     <?php   } ?>
                </div>
            </li>
      <?php } ?> 
    </ul> 
    <ul class="navbar-nav navbar-right">
         <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Signup</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Track my order</a>
         </li>
        </ul> 
   </div>
</nav>