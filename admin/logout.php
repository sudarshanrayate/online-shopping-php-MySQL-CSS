<?php
session_start();
unset($_SESSION['A_email']);
header("location:index.php")
?>