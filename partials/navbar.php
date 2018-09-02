<nav class="navbar sticky-top navbar-dark grey darken-4 justify-content-between">
     <a class="navbar-brand px-lg-3 mr-0" href="index.php">
     <img src="img/logo3.png" id="logo">
   </a>

<form class="form-inline my-1">


<ul class="navbar-nav right hide-on-med-and-down">
      <?php if (!isset($logged_in) || (isset($logged_in) && $logged_in['role_id'] != 1)): ?>
        <li class="nav-item"><a  class="nav-link text-white" href="cart.php">Cart<span id="badge-items">

        <?php 
        if (isset($_SESSION['cart'])) {
          $count = array_sum($_SESSION['cart']); ?>
          <span class="new badge" data-badge-caption=<?php echo $count == 1 ? "item" : "items"; ?>><?php echo $count; ?></span><?php
        } ?></span></a></li>

        <?php else: ?>
        <li><a href="orders.php">Orders</a></li>
        <?php endif ?>
        </ul> 
       
 <?php
  if (isset($_SESSION['logged_in_user'])) {
       echo  '<li class="nav-item"> 
                <a class="nav-link text-white" href="partials/logout.php">Log Out</a>      
              </li>
              ';          
      } else { ?> 
      <a class="nav-link waves-light text-white" href="register.php" mdbWavesEffect>Register</a>
     
     <?php } ?>        
 </form>
</nav>