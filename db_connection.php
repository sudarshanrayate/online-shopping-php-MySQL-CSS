<?php
 $con = mysqli_connect("localhost","root","","shopping-online");
 if (!$con) {
 	die("Connection Failed: ".mysqli_connect_error());
 }
?>