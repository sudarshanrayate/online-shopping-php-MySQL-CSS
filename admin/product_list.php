<?php
session_start();
if(!$_SESSION['A_email']) {
	header("location:index.php");
}
require_once("../db_connection.php");
$r = mysqli_query($con,"SELECT * FROM products");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Product List</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Adminmain.js"></script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Shopping</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php">Log Out</a> </li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
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
			<div class="col-md-9">
				<div class="panel panel-success">
					<div class="panel-heading">Product List</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2"><b>Image</b></div>
							<div class="col-md-1"><b>Name</b></div>
							<div class="col-md-1"><b>Category</b></div>
							<div class="col-md-1"><b>Brand</b></div>
							<div class="col-md-1"><b>Price in Rs.</b></div>
							<div class="col-md-2"><b>Description</b></div>
							<div class="col-md-1"><b>Keyword</b></div>
						</div>
						<div class="productList"></div>
						<?php
							while ($row = mysqli_fetch_array($r)) {
								$pid = $row['product_id'];
								$pname = $row['product_title'];
								$pcat = $row['product_cat'];
								$pbrand = $row['product_brand'];
								$pprice = $row['product_price'];
								$pdescription = $row['product_desc'];
								$pimage = $row['product_image'];
								$pkeyword = $row['product_keyword'];
								?>
						<div class="row">
							<form method="post" enctype="multipart/form-data" class="form-controal">
								<div class="col-md-2"><img src="../uploads/product-images/<?=$pimage?>" height="100px" width="100px"></div>
								<div class="col-md-1"><b><?=$pname?></b></div>
								<div class="col-md-1"><b><?=$pcat?></b></div>
								<div class="col-md-1"><b><?=$pbrand?></b></div>
								<div class="col-md-1"><b><?=$pprice?></b></div>
								<div class="col-md-2"><b><?=$pdescription?></b></div>
								<div class="col-md-1"><b><?=$pkeyword?></b></div>
								<a href="delete_product.php?pid=<?=$pid?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
								<a href="update.php?pid=<?=$pid?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
							</form>
						</div>
						<?php
							}
							?>
					</div>
					<div class="panel-footer">footer</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>
</body>
</html>