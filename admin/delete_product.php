<?php
require_once("../db_connection.php");
$pid = $_GET['pid'];
$d = mysqli_query($con,"DELETE FROM products where product_id = '$pid'");
unlink("../product-images/".$row['product_image']);
header("location:index.php");
?>