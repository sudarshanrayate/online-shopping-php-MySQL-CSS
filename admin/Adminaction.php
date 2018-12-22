<?php
require_once("../db_connection.php");
// if (isset($_POST['adminLogin'])) {
// 	$email = mysqli_real_escape_string($con,$_POST['adminEmail']);
// 	$password = md5($_POST['adminPassword']);
// 	$adminlogin = mysqli_query($con,"SELECT * FROM admin WHERE admin_email='$email' AND admin_pass='$password'");
// 	$count = mysqli_num_rows($adminlogin);
// 	if ($count == 1) {
// 		$row = mysqli_fetch_array($adminlogin);
// 		$_SESSION['adminEmail'] = $row['admin_email'];
// 		echo "true";
// 	}
// }

if (isset($_POST['addCategory'])) {
	$catName = $_POST['cat'];
	$addCategory = mysqli_query($con,"INSERT INTO categories(cat_title)values('$catName')");
	if ($addCategory) {
		echo "
		<div class='alert alert-success'>
			<a href='#' class='close' data-dismiss='alert' area-label='close'>&times;</a>
			<b>Category Added Successfully..!</b>
		</div>
	";
	}
}
if (isset($_POST['addBrand'])) {
	$brandName = $_POST['brand'];
	$addBrand = mysqli_query($con,"INSERT INTO brands(brand_title)values('$brandName')");
	if ($addBrand) {
		echo "
		<div class='alert alert-success'>
			<a href='#' class='close' data-dismiss='alert' area-label='close'>&times;</a>
			<b>Brands Added Successfully..!</b>
		</div>
	";
	}
}
if (isset($_POST['custlist'])) {
	$cust = mysqli_query($con,"SELECT * FROM user_info");

	while ($row = mysqli_fetch_array($cust)) {
		$uid = $row['user_id'];
		$fname = $row['first_name'];
		$lname = $row['last_name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$address1 = $row['address1'];
		$address2 = $row['address2'];
		// echo "how are you....!";
		echo "
			
					<div class='row'>
						<div class='col-md-2'>$uid</div>
						<div class='col-md-3'>$fname $lname</div>
						<div class='col-md-3'>$email</div>
						<div class='col-md-2'>$mobile</div>
					</div>
				
		";
	}
}
// if (isset($_POST['productlist'])) {
// 	$poductList = mysqli_query($con,"SELECT * FROM products");
// 	while ($row = mysqli_fetch_array($poductList)) {

// 		$pId = $row['product_id'];
// 		$pImage = $row['product_image'];
// 		$pName = $row['product_title'];
// 		$pCat = $row['product_cat'];
// 		$pBrand = $row['product_brand'];
// 		$pPrice = $row['product_price'];
// 		$pDesc = $row['product_desc'];
// 		$pKey = $row['product_keyword'];
		
// 		echo "
// 			<div class='row'>
// 					<div class='col-md-2'><img src='../product-images/$pImage' height='50px' width='60px'></div>
// 					<div class='col-md-2'>$pName</div>
// 					<div class='col-md-2'>$pCat</div>
// 					<div class='col-md-2'>$pBrand</div>
// 					<div class='col-md-2'>$pPrice</div>
// 					<a href='delete_product.php?pid=$pId' class='btn btn-danger deleteProduct' delete_pid='$pId' id='btndelete' ><span class='glyphicon glyphicon-remove'></span></a>
// 					<a href='update_product.php?pid=$pId' class='btn btn-primary editProduct' edit_pid='$pId' id='btnedit'><span class='glyphicon glyphicon-pencil'></span></a>
// 			</div>
// 		";
// 	}
// }
if (isset($_POST['productlistl'])) {
	$poductList = mysqli_query($con,"SELECT * FROM products");
	while ($row = mysqli_fetch_array($poductList)) {

		$pId = $row['product_id'];
		$pImage = $row['product_image'];
		$pName = $row['product_title'];
		$pCat = $row['product_cat'];
		$pBrand = $row['product_brand'];
		$pPrice = $row['product_price'];
		$pDesc = $row['product_desc'];
		$pKey = $row['product_keyword'];
		
		echo "
			<div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$pName</div>
							<div class='panel-body'>
								<img src='../product-images/$pImage' style='width: 150px; height: 150px;'/>
								<div class='panel-heading'>Rs.$pPrice/-</div>
							</div>
							<div class='panel-heading'>
								<a href='update.php?pid=$pId' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a>
								<a href='delete_product.php?pid=$pId' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a>
							</div>
						</div>
					</div>
		";
	}
}

?>