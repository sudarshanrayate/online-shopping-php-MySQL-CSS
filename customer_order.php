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
	<style type="text/css">
		table tr td{
			padding: 10px 10px;
		}
	</style>
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
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
					<div class="panel-body">
						<h2>Customer Order Details</h2>
						<hr/>
						<div class="row">
							<div class="col-md-6">
								<img src="uploads/product-images/headphone.jpg" style="height: 200px; width: 200px; float: right;" class="img-thumbnail">
							</div>
							<div class="col-md-6">
								<table>
									<tr><td>Product Name</td><td><b>Headphone</b></td></tr>
									<tr><td>Product Price</td><td><b>1000</b></td></tr>
									<tr><td>Quantity</td><td><b>3</b></td></tr>
									<tr><td>Payment</td><td><b>Completed</b></td></tr>
									<tr><td>Transction Id</td><td><b>RSDE012452BDHBX121</b></td></tr>
								</table>
							</div>
						</div>
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