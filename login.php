<?php
require_once("db_connection.php");
session_start();
if (isset($_POST['userLogin'])) {
	$email = mysqli_real_escape_string($con,$_POST['userEmail']);
	$password = md5($_POST['userPassword']);
	$login = mysqli_query($con,"SELECT * FROM user_info WHERE email='$email' AND password='$password'");
	$count = mysqli_num_rows($login);
	if ($count == 1) {
		$row = mysqli_fetch_array($login);
		$_SESSION['uid'] = $row['user_id'];
		$_SESSION['email'] = $row['email'];
		echo "true";	
	}else{
		echo "false";
	}
}
?>