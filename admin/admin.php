<?php
session_start();
if(!$_SESSION['A_email']) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title><link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Adminmain.js"></script>
	
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Shopping Admin</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
			</li>
			<li style="width: 300px;left: 10px;top:10px;"><input type="text" class="form-control" id="search-box" name="search-box"></li>
			<li style="left: 20px;top:10px;"><button class="btn btn-primary" id="search_btn" name="search_btn">Search</button></li>
			
		</ul>
		<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php">Log Out</a> </li>
			</ul>
	</div>
</div>
<p><br /></p>
<p><br /></p>
<p><br /></p>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<div class="nav nav-pills nav-stacked">
				<li><a href="add_category.php">Add Category</a></li>
				<li><a href="add_brand.php">Add Brand</a></li>
				<li><a href="add_product.php">Add Product</a></li>
				<li><a href="product_list.php">Product List</a></li>
				<li><a href="">Customer List</a></li>
				<li><a href="order_list.php">Order List</a></li>
			</div>
		</div>
		<div class="cutomerList"></div>
	</div>
</div>
	<div class="col-md-1"></div>
</div>
</body>
</html>