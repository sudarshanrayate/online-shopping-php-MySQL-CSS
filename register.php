
<?php
$con = mysqli_connect("localhost","root","","shopping-online");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = md5($_POST['password']);
$cpass = md5($_POST['confirmPass']);
$mobile = $_POST['mobile'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];

$insert = mysqli_query($con,"INSERT INTO `user_info`( `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES('$fname','$lname','$email','$pass','$mobile','$address1','$address2') ");
if ($insert) {
	echo "inserted Success";
}

