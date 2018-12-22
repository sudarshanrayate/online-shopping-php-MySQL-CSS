<?php
session_start();
if (!$_SESSION['email']) {
	header("location:index.php");
}
require_once("db_connection.php");
$total = $_GET['totalBill'];
$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Shopping</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
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
							<div class="col-md-6">
								<form method="post" enctype="multipart/form-data">
									<div class="row">
										Email
										<input type="text" class="form-control" name="" value="<?=$email?>">
									</div>
									<div class="row">
										Shepping Address:
										<textarea class="form-control" name="shepaddress" id="shepaddress"></textarea>
									</div>
									<div class="row">
										City
										<input type="text" name="city" id="city" class="form-control">
									</div>
									<div class="row">
										State
										<input type="text" name="state" id="state" class="form-control">
									</div>
									<div class="row">
										<h4>Total: Rs.<span><b><?php echo $total;?></b>/-</span></h4>
									</div>
									<div class="row">
										<input type="submit" class="btn btn-success btn-md" name="confirmorder" >
									</div>
								</form>
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
<?php
if (isset($_POST['confirmorder'])) {
	$sadd = $_POST['shepaddress'];
	$ucity = $_POST['city'];
	$ustate = $_POST['state'];
	$order = mysqli_query($con,"INSERT INTO customer_order(uid,shepping_add,city,state,totalamt,status)VALUES('$email','$sadd','$ucity','$ustate','$total','pendding')");
	if ($order) {
	$cartUp = mysqli_query($con,"UPDATE cart SET flag='1' WHERE user_id='$email'");
	}
	
header("location:payment.php");
}
	
?>