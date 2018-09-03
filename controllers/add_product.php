<?php 
session_start();
require "connection.php";

$prodName = $_POST['prodName'];
$prodPrice = $_POST['prodPrice'];
$listPrice = $_POST['listPrice'];
$prodDesc = $_POST['prodDesc'];
$subCategory = $_POST['subCategory'];
$prodImage = $_FILES['prodImage']['name'];
$prodImageUrl = "/capstone2/img/products/".$_FILES['prodImage']['name'];


move_uploaded_file($_FILES['prodImage']['tmp_name'], "../img/products/".$prodImage);



$sql= "INSERT INTO products (
 name, 
 description,
 price, 
 list_price,
 image,
 sub_category_id
 ) 
 VALUES (
'$prodName', 
'$prodDesc',
'$prodPrice', 
'$listPrice', 
'$prodImageUrl', 
'$subCategory')";

$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));	

$_SESSION['success_add_product'] = "Product added successfully!";
header ('location: ../index.php');




 ?>








