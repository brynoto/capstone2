<?php 

require "connection.php";

$username = $_POST['username'];
$password = sha1($_POST['password']);


$sql = "INSERT INTO users (username,password)
	VALUES ('$username', '$password')";

if(mysqli_query($conn, $sql)) {
	echo "success";
} else {
	echo mysqli_error($conn);
}


 ?>