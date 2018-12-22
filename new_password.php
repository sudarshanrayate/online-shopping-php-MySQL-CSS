<!DOCTYPE html>
<html>
<head>
	<title>Set New Password</title>
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">Enter New Password</div>
					<div class="panel-body">
						<form method="post">
							<table>
								<tr>
									<td>Enter New password</td>
									<td><input type="password" name="newpass" class="form-control"></td>
								</tr>
								<tr>
									<td><input type="submit" name="btnuppass" class="btn btn-success"></td>
									<td><a href="index.php" class="btn btn-success btn-xs">Go To Home Page</a></td>
								</tr>
							</table>
						</form>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-4"></div>	
		</div>
	</div>
</body>
</html>
<?php
require_once("db_connection.php");
if (isset($_POST['btnuppass'])) {
	session_start();
	$email = $_SESSION['emailAdd'];
	$newpassward = md5($_POST['newpass']);
	$upDatePass = mysqli_query($con,"UPDATE user_info SET password='$newpassward' WHERE email = '$email' ");
	if ($upDatePass) {
		echo "Password updated";
	}else{
		echo "Password updat failed";
	}
}
?>