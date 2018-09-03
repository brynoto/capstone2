<?php
require 'connection.php';
$id = $_POST['id'];
$sql = "DELETE FROM products WHERE id = $id";
mysqli_query($conn, $sql);