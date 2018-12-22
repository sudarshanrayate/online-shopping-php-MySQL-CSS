<?php
session_start();
if(!$_SESSION['A_email']) {
	header("location:index.php");
}
require_once("../db_connection.php");
$o = mysqli_query($con,"SELECT * FROM customer_order");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Oder List</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Adminmain.js"></script>
	<script src="js/fancybox.js"></script>

	<!-- Add jQuery basic library -->
	<script type="text/javascript" src="../fancybox/jquery-lib.js"></script>
	
	<!-- Add required fancyBox files -->
	<link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="../fancybox/source/jquery.fancybox.pack.js"></script>

	<!-- Optional, Add fancyBox for media, buttons, thumbs -->
	<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
	<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
	<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-media.js"></script>
	<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
	<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>

	<!-- Optional, Add mousewheel effect -->
	<script type="text/javascript" src="../fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Shopping Admin</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
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
					<li><a href="customer_list.php">Customer List</a></li>
					<li><a href="order_list.php">Order List</a></li>	
				</div>
			</div>	
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading">Order list</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-1">Order Id</div>
							<div class="col-md-2">User Email</div>
							<div class="col-md-3">Shpp Add</div>
							<div class="col-md-2">City</div>
							<div class="col-md-2">amount</div>
							<div class="col-md-1">Status</div>
						</div>
						<?php
						while ($row = mysqli_fetch_array($o)) {
							$oid = $row['order_id'];
							$uid = $row['uid'];
							$shpp_add = $row['shepping_add'];
							$city = $row['city'];
							$state = $row['state'];
							$total = $row['totalamt'];
							$status = $row['status'];
							?>
							<div class="row">
								<div class="col-md-1"><?=$oid?></div>
								<div class="col-md-2"><?=$uid?></div>
								<div class="col-md-3"><?=$shpp_add?></div>
								<div class="col-md-2"><?=$city?></div>
								<div class="col-md-2"><?="Rs. ".$total."/-"?></div>
								<div class="col-md-1"><?=$status?></div>
								<a  class="btn btn-primary various" data-fancybox-type="iframe"  href="cutomer_and_order_details.php?uid=<?=$uid?>">Details</a>
							</div><p><br/></p>
							<?php
						}
						?>
					</div>
					<div class="panel-footer "></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>