<?php
	session_start();
	require "connection.php";
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	$sql = "SELECT * FROM users WHERE
		username = '$username' AND
		password = '$password'";
	$result = mysqli_query($conn,$sql);	


	if(mysqli_num_rows($result) > 0) {
		$_SESSION['logged_in_user'] = $username;
	}else {
		$_SESSION['error_message'] = "Login failed";		
	}
	header('location: ../index.php');


 ?>