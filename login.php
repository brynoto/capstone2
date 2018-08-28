<?php 

function get_title() {
	'Add Product';
}

function get_content() {
	global $conn;  ?>


<div class="container-fluid">
<?php 
if(isset($_SESSION['error_message'])) {
	echo "<span class='error_message'>".$_SESSION['error_message']."</span>";
	unset($_SESSION['error_message']);
}  ?>

<?php  
if (isset($_SESSION['logged_in_user'])) {
	echo "Hello ".$_SESSION['logged_in_user']."<br>";
	} else { ?>
	<p>Welcome Guest</p>
	<form action="controllers/authenticate.php" method="POST">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
		</div>
		<button class="btn btn-primary" name="submit">Login</button>

	</form>

<?php } ?>
</div>
<?php require_once "template.php"; ?>


