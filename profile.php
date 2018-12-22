<?php
session_start();
if (!$_SESSION['email']) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping Online</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/fancybox.js"></script>
	<!-- Add jQuery basic library -->
	<script type="text/javascript" src="fancybox/jquery-lib.js"></script>
	
	<!-- Add required fancyBox files -->
	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>

	<!-- Optional, Add fancyBox for media, buttons, thumbs -->
	<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js"></script>
	<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>

	<!-- Optional, Add mousewheel effect -->
	<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Shopping</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href=""><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href=""><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
				<li style="width: 300px;left: 10px;top:10px;"><input type="text" class="form-control" id="search-box" name="search-box"></li>
				<li style="left: 20px;top:10px;"><button class="btn btn-primary" id="search_btn" name="search_btn">Search</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in Rs. </div>
								</div>
							</div>
	 						<div class="panel-body">
	 						<div id="cart_product">
	 							<!-- <div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in Rs. </div>
								</div> -->
								</div>
	 						</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "<b>Hello</b><br/>" . $_SESSION['email']; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration: none;color: blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</span></a></li>
						<li class="divider"></li>
						<li><a href="change_password.php" class="various" data-fancybox-type="iframe" style="text-decoration: none;color: blue;">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration: none;color: blue;">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
			<div id="get_cotegory">
				
			</div>
				<!-- <div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h6>Categories</h6></a></li>
					<li><a href="#">Electronics</a></li>
					<li><a href="">Mens Wear</a></li>
					<li><a href="">Laids Wears</a></li>
					<li><a href="">Kids Wear</a></li>
					<li><a href="">Furnitures</a></li>
					<li><a href="">Home Applians</a></li>
					<li><a href="">Electronics Gadgets</a></li>
				</div> -->
				<div id="get_brand">
				
			</div>
				<!-- <div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h6>Brands</h6></a></li>
					<li><a href="#">Hp</a></li>
					<li><a href="">Samsang</a></li>
					<li><a href="">Apple</a></li>
					<li><a href="">Sony</a></li>
					<li><a href="">LG</a></li>
					<li><a href="">Cloth Brands</a></li>
				</div> -->
			</div>
			<div class="col-md-8">
			<div class="row">
			<div class="col-md-12" id="product_msg"></div>	
			</div>
				<div class="panel panel-info">
					<div class="panel-heading">Product's</div>
					<div class="panel-body">
					<div id="get_product">
						<!-- Here we get product using jquery ajax call -->
					</div>
						<!-- <div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsang Galaxy</div>
								<div class="panel-body">
									<img src="product-images/half-sleve-jaket.jpg" style="width: 60%; height: 100%;" />
								</div>
								<div class="panel-heading">$ 500.00
									<button style="float: right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
					<div class="panel-footer">&copy; 2018</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<!-- <li><a href="">1</a></li> -->
					</ul>
				</center>
			</div>
		</div>
	</div>
</body>
</html>