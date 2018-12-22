<?php
session_start();
require_once("../db_connection.php");
if(!$_SESSION['A_email']) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping Online</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Adminmain.js"></script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Shopping Admin</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li style="width: 300px;left: 10px;top:10px;"><input type="text" class="form-control" id="search-box" name="search-box"></li>
				<li style="left: 20px;top:10px;"><button class="btn btn-primary" id="search_btn" name="search_btn">Search</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php">Log Out</a> </li>
			</ul>
		</div>
	</div>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="nav nav-pills nav-stacked">
					<li><a href="add_category.php">Add Category</a></li>
					<li><a href="add_brand.php">Add Brand</a></li>
					<li><a href="add_product.php">Add Product</a></li>
					<li><a href="product_list.php">Product List</a></li>
					<li><a href="customer_list.php">Customer List</a></li>
					<li><a href="order_list.php">Order List</a></li>	
				</div>
			</div>	
			<div class="col-md-8">
				<div class="panel panel-success">
					<div class="panel-heading">Add Product</div>
					<div class="panel-body">
						<form method="post" id="addProduct_form" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<label for="product_category">Product Category</label>
									<select class="form-control" name="product_category" required>
										<?php $category_list = mysqli_query($con,"SELECT * FROM categories");
										while ($r = mysqli_fetch_array($category_list)) {
											echo "<option value=".$r['cat_id'].">". $r['cat_title'] . "</option>";	
										}
										?>
									</select>	
								</div>		
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="Product_brand">Product Brand</label>
									<select class="form-control" name="product_brand" required>
										<?php $brand_list = mysqli_query($con,"SELECT * FROM brands");
										while ($row = mysqli_fetch_array($brand_list)) {
											echo "<option value=".$row['brand_id'].">". $row['brand_title'] . "</option>";	
										}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="product_name">Product Name</label>
									<input type="text" name="product_name" class="form-control" id="product_name" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="product_price">Product Price</label>
									<input type="product_price" name="product_price" class="form-control" id="product_price" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="product_desc">Product Discription</label>
									<textarea class="form-control" name="product_desc" id="product_desc"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="image">Product Image</label>
									<input type="file" class="form-control" name="file" id="file" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="image">Product Images. <span>Select multipal images</span></label>
									<input type="file" class="form-control" name="multi_files[]" id="file" multiple="true">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="keywords">Product keywords</label>
									<input type="text" name="productkey" class="form-control" id="productkey">
								</div>
							</div>
							<p><br/></p>
							<div class="row">
								<div class="col-md-12">
									<input style="float: right;" value="Add Product" type="submit" name="signup_btn" class="btn btn-success" id="addProduct_btn">
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
</div>
</body>
</html>
<?php
if (isset($_POST['signup_btn'])) {
	$p_cat = $_POST['product_category'];
	$p_brand = $_POST['product_brand'];
	$p_name = $_POST['product_name'];
	$p_price = $_POST['product_price'];
	$p_description = $_POST['product_desc'];
	$key = $_POST['productkey'];
	//File Upload
	$file = $_FILES['file'];
	$file_name = $file['name'];
	$file_type = $file ['type'];
	$file_size = $file ['size'];
	$file_path = $file ['tmp_name'];

	if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=614400)
		if (move_uploaded_file ($file_path,'../uploads/product-images/'.$file_name))
			$product = mysqli_query($con,"INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`,`product_image`, `product_keyword`) VALUES('$p_cat','$p_brand','$p_name','$p_price','$p_description','$file_name','$key')");

		$pid= mysqli_insert_id($con); 
		
		for ($i=0; $i < count($_FILES["multi_files"]["name"]); $i++) { 
			$filetemp = $_FILES["multi_files"]["tmp_name"][$i];
			$filename = $_FILES["multi_files"]["name"][$i];
			$filetype = $_FILES["multi_files"]["type"][$i];
			$filepath = "../uploads/image-gallary/".$filename;
			move_uploaded_file($filetemp,$filepath);
			$images = mysqli_query($con,"INSERT INTO product_image_gallary(p_id,image)VALUES('$pid','$filename')");
		}
	}
	?>