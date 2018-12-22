<?php
session_start();
if(!$_SESSION['A_email']) {
	header("location:index.php");
}
require_once("../db_connection.php");
$uid = $_GET['uid'];
$o = mysqli_query($con,"SELECT * FROM cart WHERE user_id='$uid' ");
$subotal= 0;
$d = mysqli_query($con,"SELECT * FROM customer_order WHERE uid='$uid' ");
$uname = mysqli_query($con,"SELECT * FROM user_info WHERE email='$uid' ");
while ($u= mysqli_fetch_array($uname)) {
	$fname = $u['first_name'];
	$lname = $u['last_name'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Adminmain.js"></script>
	<style type="text/css">
		body{
			margin-left: 5%;
			margin-right: 5%;
			margin-top: 2%;
			margin-bottom: 2%;
		}
		#product_list  td{
			padding: 10px 10px;
			border: 1px solid black;
		}
		#product_list{
			margin-top: 1%;
		}
		.user_details td{
			padding: 10px 10px;
			
		}
		
	</style>
	
</head>
<body>
	<?php
	while ($r = mysqli_fetch_array($d)) {
		$oid = $r['order_id'];
		$email = $r['uid'];
		$address = $r['shepping_add'];
		$status = $r['status'];
		?>
		<form method="post">
			<table class="user_details">
				<th>Order Id : <?=$oid?></th>
				<tr>
					<td>Name</td>
					<td><span><b><?=$fname." ".$lname?></b></span></td>
					<td>Email</td>
					<td><span><b><?=$email?></b></span></td>
				</tr>
				<tr>
					<td>Adress</td>
					<td><b><?=$address?></b></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><b><?=$status?></b></td>
				</tr>
				<tr>
					<td>Update Status</td>
					<td>
						<select name="status">
							<option>--Select--</option>
							<option value="pending">Pending</option>
							<option value="deley">Deley</option>
							<option value="success">Success</option>
						</select>
					</td>
					<td><input type="submit" name="updatestatus" class="btn btn-success btn-sm"></td>
				</tr>

			</table>
		</form>
		<?php
	} ?>
	<table id="product_list">
		<tr>
			<td>product Id</td>
			<td>Product image</td>
			<td>Name</td>
			<td>Price</td>
			<td>qty</td>
			<td>Total Amt</td>
		</tr>
		<?php
		while ($row = mysqli_fetch_array($o)) {
			$pid = $row['p_id'];
			$uid = $row['user_id'];
			$pname = $row['product_title'];
			$pimage = $row['product_image'];
			$qty = $row['qty'];
			$price = $row['price'];
			$total = $row['total_amount'];
			$subotal = $subotal+ $total;
			?>

			<tr>
				<td><?=$pid?></td>
				<td><img src="../uploads/product-images/<?=$pimage?>" height="60px" width="60px"></td>
				<td><?=$pname?></td>
				<td><?=$price?></td>
				<td><?=$qty?></td>
				<td><?=$total?></td>

			</tr>
			<?php 

		} ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>
				Sub Total: Rs.<b><?=$subotal?></b>/-
			</td>
		</tr>
	</table>


</body>
</html>
<?php
if (isset($_POST['updatestatus'])) {
	$status=  $_POST['status'];
	mysqli_query($con,"UPDATE customer_order SET status='$status' WHERE uid='$uid'");
}
?>