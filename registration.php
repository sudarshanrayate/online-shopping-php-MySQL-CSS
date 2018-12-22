<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/jquery2.js"></script>
	<script src="js/validation1.js"></script>
	<style type="text/css">
		.Requried{
			color: red;
		}
		.error{
	color: red;
}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<div class="panel panel-success">
					<div class="panel-heading">User Registration Form</div>
					<div class="panel-body">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="row">
							<span style="color: red">* Requried field</span><p><br/></p>
							</div>
							<div class="row">
								<span class="Requried">*</span>
								<span>Enter First Name</span>
								<input type="text" name="FNAME" id="FNAME" class="form-control" placeholder="First Name">
								<span id="erorrFName" class="error"></span><p><br/></p>
							</div>
							<div class="row">
								<span class="Requried">*</span>
								<span>Enter Last Name</span>
								<input type="text" name="LNAME" id="LNAME" class="form-control" placeholder="Last Name">
								<span id="erorrLName" class="error"></span><p><br/></p>
							</div>
							<div class="row">
								<span class="Requried">*</span>
								<span>Enter Email Address</span>
								<input type="email" name="EMAIL" id="EMAIL" class="form-control" placeholder="Email Address">
								<span id="erorrEmail" class="error"></span><p><br/></p>
							</div>
							<div class="row">
								<span class="Requried">*</span>
								<span>Enter Password</span>
								<input type="password" name="PASSWORD" id="PASSWORD" class="form-control" placeholder="Password">
								<span id="erorrPassword" class="error"></span><p><br/></p>
							</div>
							<div class="row">
								<span class="Requried">*</span>
								<span>Enter Confirm Password</span>
								<input type="password" name="CONFIRMPASSWORD" id="CONFIRMPASSWORD" class="form-control" placeholder="Confirm Password">
								<span id="erorrConfirmPassword" class="error"></span><p><br/></p>
							</div>
							<div class="row">
								<span class="Requried">*</span>
								<span>Enter Mobile No</span>
								<input type="text" name="mobile" id="MOBILE" class="form-control" placeholder="Mobile No">
								<span id="erorrmobile" class="error"></span><p><br/></p>
							</div>
							<div class="row">
								<span class="Requried">*</span>
								<span>Parmanant address</span>
								<textarea name="ADDRESS1" id="ADDRESS1" placeholder="Enter Parmanant address" class="form-control"></textarea>
								<span id="errorAddress" class="error"></span><p><br/></p>
							</div>
							<div class="row">
								<span>Shipping address</span>
								<textarea name="ADDRESS2" id="ADDRESS2" placeholder="Enter Shipping address" class="form-control"></textarea><p><br/></p>
							</div>
							<div class="row">
								<input type="button" name="btnRegister" value="Submit" class="btn btn-success btn-sm" id="btnRegister" style="float: right;">
							</div>
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping Online</title>
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
				<li><a href="product.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer SinUp Form</div>
					<div class="panel-body">
						<form method="post" id="customer_registration">
							<div class="row">
								<div class="col-md-6">
									<label for="first_name">First Name</label>
									<input type="text" name="f_name" class="form-control" id="f_name">
								</div>
								<div class="col-md-6">
									<label for="first_name">Last Name</label>
									<input type="text" name="l_name" class="form-control" id="l_name">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" name="email" class="form-control" id="email">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control" id="password">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="repassword">Re-Password</label>
									<input type="password" name="repassword" class="form-control" id="repassword">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="mobile">Mobile Number</label>
									<input type="text" name="mobile" class="form-control" id="mobile">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="address1">Address1</label>
									<input type="text" name="address1" class="form-control" id="address1">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="address2">Address2</label>
									<input type="text" name="address2" class="form-control" id="address2">
								</div>
							</div>
							<p><br/></p>
							<div class="row">
								<div class="col-md-12">
									<input style="float: right;" value="SignUp" type="button" name="signup_btn" class="btn btn-success btn-lg" id="signup_btn">
								</div>
							</div>			
						</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html> -->