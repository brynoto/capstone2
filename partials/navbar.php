<nav class="navbar navbar-dark grey darken-4 justify-content-between">
     <a class="navbar-brand px-lg-3 mr-0" href="index.php">
     <img src="img/logo3.png" width="100" height="100" alt="">
   </a>

<form class="form-inline my-1">
  <?php 

  if (isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role_id'] == 1) {
      echo ' <a class="nav-link waves-light text-white" href="order.php" mdbWavesEffect>Orders</a>';
  } else {
    echo '<a class="nav-link waves-light text-white" href="cart.php" mdbWavesEffect><i class="fa fa-shopping-cart"></i> Cart</a>';
  }
   ?>
   
       
   <?php


  if (isset($_SESSION['logged_in_user'])) {
       echo  '<li class="nav-item" style="list-style: none; "> 
                <a class="nav-link text-white" href="partials/logout.php">Log Out</a>      
              </li>
              ';          
      } else { ?> 
      <a class="nav-link waves-light text-white" href="register.php" mdbWavesEffect>Register</a>
      
     <?php } ?>        
 </form>
</nav>