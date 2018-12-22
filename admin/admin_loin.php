<?php
require_once("../db_connection.php");
session_start();
if (isset($_POST['adminLogin'])) {
	$email = mysqli_real_escape_string($con,$_POST['adminEmail']);
	$password = md5($_POST['adminPassword']);
	$adminlogin = mysqli_query($con,"SELECT * FROM admin WHERE admin_email='$email' AND admin_pass='$password'");
	$count = mysqli_num_rows($adminlogin);
	if ($count == 1) {
		$row = mysqli_fetch_array($adminlogin);
		$_SESSION['A_email'] = $row['admin_email'];
		echo "true";
	}
}
?>