<?php
session_start();
if(!$_SESSION['A_email']) {
	header("location:index.php");
}
require_once("../db_connection.php");
$pid = $_GET['pid'];
$p = mysqli_query($con,"SELECT * FROM products WHERE product_id ='$pid'");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Product</title>
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
			</li>
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
<div class="container-fliued">
	<div class="row">
		<div class="col-md-1"></div>
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
		<?php
			while($row = mysqli_fetch_array($p)){
				$pId = $row['product_id'];
				$pImage = $row['product_image'];
				$pName = $row['product_title'];
				$pCat = $row['product_cat'];
				$pBrand = $row['product_brand'];
				$pPrice = $row['product_price'];
				$pDesc = $row['product_desc'];
				$pKey = $row['product_keyword'];
		?>
			<div class="panel panel-primary">
					<div class="panel-heading">Update Product</div>
					<div class="panel-body">
						<form method="post" id="addProduct_form" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<label for="product_category">Product Category</label>
									<select class="form-control" name="product_category">
										<?php $category_list = mysqli_query($con,"SELECT * FROM categories");
										while ($s = mysqli_fetch_array($category_list)) {
											echo "<option value=".$s['cat_id'].">". $s['cat_title'] . "</option>";	
										}
										?>
									</select>	
								</div>		
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="Product_brand">Product Brand</label>
									<select class="form-control" name="product_brand">
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
									<input type="text" name="product_name" class="form-control" id="product_name" value="<?=$pName?>" required >
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="product_price">Product Price</label>
									<input type="product_price" name="product_price" class="form-control" id="product_price" value="<?=$pPrice?>" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="product_desc">Product Discription</label>
									<textarea class="form-control" name="product_desc" id="product_desc" ><?=$pDesc?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="image">Product Image</label>
									<input type="file" class="form-control" name="file" id="file" required>
									<img src="../uploads/product-images/<?=$pImage?>" style="height: 100px;width: 100px;">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="keywords">Product keywords</label>
									<input type="text" name="productkey" class="form-control" id="productkey" value="<?=$pKey?>" required>
								</div>
							</div>
							<p><br/></p>
							<div class="row">
								<div class="col-md-12">
									<input style="float: right;" value="Update" type="submit" name="btnUpdate" class="btn btn-success" id="btnUpdate">
								</div>
							</div>			
						</div>
					</form>
					<div class="panel-footer"></div>
				</div>
		</div>
		<?php } ?>
		<div class="col-md-1"></div>
	</div>
</div>
</body>
</html>
<?php
if (isset($_POST['btnUpdate'])) {
	$pname = $_POST['product_name'];
	$cat_name = $_POST['product_category'];
	$brand = $_POST['product_brand'];
	$Price = $_POST['product_price'];
	$desc = $_POST['product_desc'];
	$key = $_POST['productkey'];
	//File Upload
	$file = $_FILES['file'];
	$file_name = $file['name'];
	$file_type = $file ['type'];
	$file_size = $file ['size'];
	$file_path = $file ['tmp_name'];
	if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=614400)
		if (move_uploaded_file ($file_path,'../product-images/'.$file_name))

	$u = mysqli_query($con,"UPDATE products SET product_title='$pname',product_cat='$cat_name',product_brand='$brand',product_price='$Price',product_desc='$desc',product_image='$file_name',product_keyword='$key' WHERE product_id = '$pid'");
	header("location:index.php");
}
?>