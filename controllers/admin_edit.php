<?php
session_start();
require 'connection.php';
$id = $_GET['id'];
$name = mysqli_escape_string($conn, $_POST['prodName']);
$description = mysqli_escape_string($conn, $_POST['prodDesc']);
$price = $_POST['prodPrice'];
$list_price = $_POST['listPrice'];
$sub_category_id = mysqli_escape_string($conn, $_POST['subCategory']);
$has_image = (file_exists($_FILES['prodImage']['tmp_name']) && is_uploaded_file($_FILES['prodImage']['tmp_name']));
if ($has_image) {
	$image = "img/products/".$_FILES['prodImage']['name'];
	move_uploaded_file($_FILES['prodImage']['tmp_name'], "../".$image);
	$sql = "UPDATE products SET
		name = '$name',
		description = '$description',
		price = $price,
		list_price = $list_price,
		image = '$image',
		sub_category_id = $sub_category_id
		WHERE id = $id";
} else {
	$sql = "UPDATE products SET
		name = '$name',
		description = '$description',
		list_price = $list_price,
		price = $price,
		sub_category_id = $sub_category_id
		WHERE id = $id";
}
mysqli_query($conn,$sql) or die(mysqli_error($conn));
// $_SESSION['success_message'] = "$name Added Successfully";
header('location: ../index.php');