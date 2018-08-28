<nav class="navbar navbar-dark grey darken-4 justify-content-between">
     <a class="navbar-brand px-lg-3 mr-0" href="index.php">
     <img src="img/logo3.png" width="100" height="100" alt="">
   </a>
    <form class="form-inline my-1">
       <a class="nav-link waves-light text-white" href="login.php" mdbWavesEffect>Login</a>
        <a class="nav-link waves-light text-white" href="register.php" mdbWavesEffect>Register</a>  <a class="nav-link waves-light text-white" href="cart.php" mdbWavesEffect>Cart</a>
       
             <?php
           if (isset($_SESSION['logged_in_user'])) {
           echo  '<li class="nav-item"> 
                <a class="nav-link" href="partials/logout.php">Log Out</a>      
              </li>';
             } 
            ?>

        
    </form>
</nav>