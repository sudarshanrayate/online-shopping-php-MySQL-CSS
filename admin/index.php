<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin LogIn</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Adminmain.js"></script>
</head>
<body>	
<p><br/></p>
<p><br/></p>
<p><br /></p>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-primary">
			<div class="panel-heading" style="text-align: center;"><h4> Admin Login</h4></div>
				<div class="panel-heading">
					<label for="adminemail">Email</label>
					<input type="email" class="form-control" id="adminemail" name="" required />
					<label for="adminemail">Password</label>
					<input type="password" class="form-control" id="adminpassword" name="" required />
					<p><br/></p>
					<a href="" style="color: white;list-style: none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float: right;" id="adminlogin" value="Login" name="">
				</div>
				<div class="panel-footer" id="e_msg"></div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
</body>
</html>