<?php
session_start();
if(!$_SESSION['A_email']) {
	header("location:index.php");
}
require_once("../db_connection.php");
$uid = $_GET['urid'];
$cust = mysqli_query($con,"SELECT * FROM user_info WHERE user_id= '$uid'");
while ($row= mysqli_fetch_array($cust)) {
	$uid = $row['user_id'];
	$fname = $row['first_name'];
	$lname = $row['last_name'];
	$email = $row['email'];
	$mobile = $row['mobile'];
	$address1 = $row['address1'];
	$address2 = $row['address2'];
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
		<div class="col-md-8">
			<div class="row">
				<div class="panel panel-success">
					<div class="panel-heading">Customer Id : <span><?=$uid?></span></div>
					<div class="panel-body">
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<div class="row">
								<span class="form-control">Customer Name</span><p><br/></p>
							</div>
							<div class="row">
								<span class="form-control">Email</span><p><br/></p>
							</div>
							<div class="row">
								<span class="form-control">Mobile No</span><p><br/></p>
							</div>
							<div class="row">
								<span class="form-control">Address1</span><p><br/></p>
							</div>
							<div class="row">
								<span class="form-control">Address2</span><p><br/></p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="row">
								<span class="form-control"><?=$fname ." " .$lname?></span><p><br/></p>
							</div>
							<div class="row">
								<span class="form-control"><?=$email?></span><p><br/></p>
							</div>
							<div class="row">
								<span class="form-control"><?=$mobile?></span><p><br/></p>
							</div>
							<div class="row">
								<span class="form-control"><?=$address1?></span><p><br/></p>
							</div>
							<div class="row">
								<span class="form-control"><?=$address2?></span><p><br/></p>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</body>
</html>
