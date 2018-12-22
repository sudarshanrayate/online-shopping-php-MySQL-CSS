<?php
session_start();
if(!$_SESSION['A_email']) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add  category</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
				<li><a href=""><span class="glyphicon glyphicon-home"></span>Home</a></li>
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
<div class="container-fliued">
	<div class="row">
		<div class="col-md-2">
			<div class="nav nav-pills nav-stacked">
					<li><a href="add_category.php">Add Category</a></li>
					<li><a href="add_brand.php">Add Brand</a></li>
					<li><a href="add_product.php">Add Product</a></li>
					<li><a href="product_list.php">Product List</a></li>
					<li><a href="customer_list.php">Customer List</a></li>
					<li><a href="order_list.php">Order List</a></li>	
				</div>
		</div>
		<div class="col-md-8">
		<div id="addBrand"></div> 
		<div class="panel panel-info">
			<div class="panel panel-heading">Add Brand</div>
			<div class="panel panel-body">
				<input type="text" class="form-control" name="" id="add_brand" placeholder="Enter Brand Name" required><p><br/></p>
				<input type="submit" class="btn btn-success" name="" id="btn_add_brand">
			</div>
			<div class="panel panel-footer"></div>
		</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</body>
</html>
