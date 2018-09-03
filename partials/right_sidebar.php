<div class="col">
<div class="container-fluid">
<?php 
if(isset($_SESSION['error_message'])) {
	echo "<span class='error_message'>".$_SESSION['error_message']."</span>";
	unset($_SESSION['error_message']);
}
 ?>

<?php  
if (isset($_SESSION['logged_in_user']['id'])) {
      echo '<blockquote class="blockquote bq-success"><h1 class="bq-title">Hello '.$_SESSION['logged_in_user']['username'].'<br></h1></blockquote><img src="img/side-pic.png" id="side_pic">';
	} else { ?>
	<p>Welcome Guest</p>
		<form action="controllers/authenticate.php" method="POST" class="text-center border border-light p-5">
			<p class="h4 mb-4">Sign in</p>

    <!-- Email -->
    <input type="text" id="username" name="username" class="form-control mb-4" placeholder="Username">

    <!-- Password -->
    <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

    <!-- Register -->
    <p>Not a member?
        <a href="register.php">Register</a>
    </p>

			<button class="btn btn-primary" name="submit">Login</button>
		</form>
		<?php 
    if(isset($_SESSION['error_message'])) {
      echo "<span class='error_message'>".$_SESSION['error_message']."</span>";
      unset($_SESSION['error_message']);
    }
     ?>
<?php }	?>
		
</div>
</div>

























