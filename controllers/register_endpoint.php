<?php 

require "connection.php";

$username = $_POST['username'];
$password = sha1($_POST['password']);
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$contact_number = $_POST['contact_number'];


$sql = "INSERT INTO users (username,password)
	VALUES ('$username', '$password')";

$result = mysqli_query($conn, $sql);
	if($result) {
		echo "Success";

	$sql = "SELECT * FROM users WHERE username = '$username' ";
		$result = mysqli_query($conn, $sql);
		$getinfo = mysqli_fetch_array($result);	

	if($result)	
	{
		$users_id = $getinfo['id'];

		$sql = "INSERT INTO user_details VALUES (null,'$email','$first_name','$last_name','$address','$contact_number','$users_id')";

		$result = mysqli_query($conn, $sql);
	}	

}
	?>

