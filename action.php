<?php
session_start();
require_once("db_connection.php");
 //selection of categories
if (isset($_POST['category'])) {
	$category_qry = mysqli_query($con,"SELECT * FROM categories");
	echo "
	<div class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#''><h6>Categories</h6></a></li>
		";
		if (mysqli_num_rows($category_qry)>0) {
			while ($row = mysqli_fetch_array($category_qry)) {
				$cid = $row['cat_id'];
				$cat_name = $row['cat_title'];
				echo "
				<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
				";
			}
			echo "</div>";
		}
	}
	//Selection of Brands
	if (isset($_POST['brand'])) {
		$brand_qry = mysqli_query($con,"SELECT * FROM brands");
		echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#' ><h6>Brands</h6></a></li>
			";
			if (mysqli_num_rows($brand_qry)>0) {
				while ($row = mysqli_fetch_array($brand_qry)) {
					$bid = $row['brand_id'];
					$brand_name = $row['brand_title'];
					echo "
					<li><a href='#' class='select_brand' bid='$bid'>$brand_name</a></li>
					";
				}
				echo "</div>";
			}
		}
		if (isset($_POST['page'])) {
			$result = mysqli_query($con,"SELECT * FROM products");
			$count = mysqli_num_rows($result);
			$pageno = ceil($count/9);
			for ($i=1; $i <= $pageno; $i++) { 
				echo "
				<li><a href='#' page='$i' id='page'>$i</a></li>
				";
			}
		}
		if (isset($_POST['getproduct'])) {
			$limit = 9;
			if (isset($_POST['setPage'])) {
				$pageno = $_POST['pageNumber'];
				$start = ($pageno * $limit) - $limit;
			}else{
				$start = 0;
			}
			$peoduct_qry = mysqli_query($con,"SELECT * FROM products ORDER BY RAND() LIMIT $start,$limit");
			if (mysqli_num_rows($peoduct_qry)>0) {
				while ($row = mysqli_fetch_array($peoduct_qry)) {
					$pro_id = $row['product_id'];
					$pro_cat = $row['product_cat'];
					$pro_brand = $row['product_brand'];
					$pro_title = $row['product_title'];
					$pro_price = $row['product_price'];
					$pro_image = $row['product_image'];
					echo "
					<div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$pro_title</div>
							<div class='panel-body'>
								<img src='uploads/product-images/$pro_image' style='width: 160px; height: 200px;'' />
							</div>
							<div class='panel-heading'>Rs.$pro_price/-
								
							</div>
							<div class='panel-heading'>
								<a href='p_details.php?did=$pro_id' class='btn btn-success btn-xs'>Details</a>
								<button pid='$pro_id' style='float: right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
							</div>
						</div>
					</div>
					";
				}
			}
		}
		if (isset($_POST['get_selected_category']) || isset($_POST['select_brand']) || isset($_POST['search'])) {
			if (isset($_POST['get_selected_category'])) {
				$id = $_POST['cat_id'];
				$sql = mysqli_query($con,"SELECT * FROM products WHERE product_cat = '$id'");
			}else if(isset($_POST['select_brand'])){
				$id = $_POST['brand_id'];
				$sql = mysqli_query($con,"SELECT * FROM products WHERE product_brand = '$id'");
			}else{
				$keyword = $_POST['keyword'];
				$sql = mysqli_query($con,"SELECT * FROM products WHERE product_keyword LIKE '%$keyword%' ");
			}
			
			while ($row = mysqli_fetch_array($sql)) {
				$pro_id = $row['product_id'];
				$pro_cat = $row['product_cat'];
				$pro_brand = $row['product_brand'];
				$pro_title = $row['product_title'];
				$pro_price = $row['product_price'];
				$pro_image = $row['product_image'];
				echo "
				<div class='col-md-4'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$pro_title</div>
						<div class='panel-body'>
							<img src='uploads/product-images/$pro_image' style='width: 160px; height: 200px;'' />
						</div>
						<div class='panel-heading'>Rs.$pro_price/-
						</div>
						<div class='panel-heading'>
							<a href='p_details.php?did=$pro_id' class='btn btn-success btn-xs'>Details</a>
							<button pid='$pro_id' style='float: right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
						</div>
					</div>
				</div>
				";
			}
		}
		if (isset($_POST['addToProduct'])) {
			$p_id = $_POST['proId'];
			$user_email= $_SESSION['email'];
			$cart = mysqli_query($con,"SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_email' ");
			$count = mysqli_num_rows($cart);
			if ($count > 0) {
				echo "Product is already added into the cart Continue Shopping...!";
			}else{
				$selected_product = mysqli_query($con,"SELECT * FROM products WHERE product_id = '$p_id' ");
				$row = mysqli_fetch_array($selected_product);
				$p_id = $row['product_id'];
				$pro_name = $row['product_title'];
				$pro_image = $row['product_image'];
				$pro_price = $row['product_price'];

				$addToCart = mysqli_query($con,"INSERT INTO `cart`(`p_id`,`user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) VALUES('$p_id','$user_email','$pro_name','$pro_image','1','$pro_price','$pro_price')");
				if ($addToCart) {
					echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' area-label='close'>&times;</a>
						<b>Product is added..!</b>
					</div>
					";
				}
			}
		}
		if (isset($_POST['get_cart_product']) || isset($_POST['cart_checkout'])) {
			$email_session = $_SESSION['email'];
			$cart = mysqli_query($con,"SELECT * FROM cart WHERE flag='0' AND user_id='$email_session'");
			$count = mysqli_num_rows($cart);
			if ($count > 0 ) {
				$number = 1;
				$sub_total = 0;
				while ($row = mysqli_fetch_array($cart)) {
					$id = $row['id'];
					$p_id = $row['p_id'];
					$pro_name = $row['product_title'];
					$pro_image = $row['product_image'];
					$qty = $row['qty'];
					$pro_price = $row['price'];
					$total = $row['total_amount'];
					$price_array = array($total);
					$total_sum = array_sum($price_array);
					$sub_total = $sub_total + $total_sum; 
					if (isset($_POST['get_cart_product'])) {
						echo "
						<div class='row'>
							<div class='col-md-3'>$number</div>
							<div class='col-md-3'><img src='uploads/product-images/$pro_image' width='60px' height='50px' ></div>
							<div class='col-md-3'>$pro_name</div>
							<div class='col-md-3'>Rs.$pro_price/-</div>
						</div>
						";
						$number++;
					}else{
						echo "
						<div class='row'>
							<div class='col-md-2'><img src='uploads/product-images/$pro_image' width='60px' height='50px' ></div>
							<div class='col-md-2'>$pro_name</div>
							<div class='col-md-2'><input type='text' class='form-control qty' pid='$p_id' id='qty-$p_id' value='$qty'  name=''></div>
							<div class='col-md-2'><input type='text' class='form-control price' pid='$p_id' id='price-$p_id' value='$pro_price' disabled name=''></div>
							<div class='col-md-2'><input type='text' class='form-control total' pid='$p_id' value='$total' id='total-$p_id' disabled	 name=''></div>
							<div class='col-md-2'>
								<div class='btn-group'>
									<a href='' remove_id='$p_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-remove'></span></a>
									<a href='' update_id='$p_id' class='btn btn-primary update'><span class='glyphicon glyphicon-plus-sign'></span></a>
								</div>
							</div>
						</div>
						";
					}
					
				}
				if(isset($_POST['cart_checkout'])){
					echo "
					<div class='row'>
						<div class='col-md-8'></div>
						<div class='col-md-4'>
							<b>Sub Total :</b>Rs.$sub_total/-
						</div>
						<div class=col-md-2>
							<a href='order.php?totalBill=$sub_total' class='btn btn-success' style='float:left;'>Make Order</a>
						</div>
					</div>
					";
				}
			}
		}
		if (isset($_POST['cart_count'])) {
			$email_session = $_SESSION['email'];
			$cart = mysqli_query($con,"SELECT * FROM cart WHERE user_id='$email_session' AND flag='0'");
			echo $count = mysqli_num_rows($cart);
		}
		if (isset($_POST['removeFromCart'])) {
			$ppid = $_POST['removeId'];
			$user_email = $_SESSION['email'];
			$res = mysqli_query($con,"DELETE FROM cart WHERE user_id='$user_email' AND p_id='$ppid'");
			if($res){
				echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' area-label='close'>&times;</a>
					<b>Product is deleted from cart Cntinue Shopping..!</b>
				</div>
				";
			}
		}
		if (isset($_POST['updateProduct'])) {
			$pid = $_POST['updateId'];
			$qty = $_POST['qty'];
			$price = $_POST['price'];
			$total = $_POST['total'];
			$user_email = $_SESSION['email'];

			$update_cart = mysqli_query($con,"UPDATE cart SET qty ='$qty', price = '$price', total_amount= '$total' WHERE user_id = '$user_email' AND p_id = '$pid' ");
			if($update_cart){
				echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' area-label='close'>&times;</a>
					<b>Product Quntity is Updated from cart Cntinue Shopping..!</b>
				</div>
				";
			}
		}
		if (isset($_POST['btnchangepass'])) {
			$email = $_POST['email'];
			$chgpass = mysqli_query($con,"SELECT * FROM user_info where email='$email'");
			if (!$chgpass) {
				echo "Email is Invalid";	
			}else{
				while ($d=mysqli_fetch_array($chgpass)) {
					$e= $d['email'];
					$_SESSION['emailAdd'] = $d['email'];
					echo "true";
				}
			}	
		}
		?>