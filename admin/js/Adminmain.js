$(document).ready(function(){
//product_list();
// product_listl();
		$("#adminlogin").click(function(event){
		// event.PreventDefault();
		var email = $("#adminemail").val();
		var password = $("#adminpassword").val();
		$.ajax({
			url 	: "admin_loin.php",
			method 	: "POST",
			data 	: {adminLogin:1, adminEmail:email, adminPassword:password},
			success : function(data){
				if (data == "true") {
					window.location.href ="admin.php";
				}else{
					alert("Please enter valid email and password");
				}
			 }
		});
	});
	$("#btn_add_category").on('click',function(){
		var catName = $("#add_category").val();
		if(catName=="") {
			alert("Please enter category name");
		}else{
			$.ajax({
			url : "Adminaction.php",
			method : "POST",
			data : {addCategory:1,cat:catName},
			success : function(data){
				//window.location.href ="index.php";
				$("#addCat").html(data);
			}
		});
		}
		
	})
	$("#btn_add_brand").on('click',function(){
		var brandName = $("#add_brand").val();
		if (brandName=="") {
			alert("Please Enter Brand Name");
		}else{
			$.ajax({
			url : "Adminaction.php",
			method : "POST",
			data : {addBrand:1,brand:brandName},
			success : function(data){
				//window.location.href ="index.php";
				$("#addBrand").html(data);
			}
		});
		}
	});
	$(".clist").on('click',function(){
		$.ajax({
			url : "Adminaction.php",
			method : "POST",
			data : {custlist:1},
			success : function(text){
				alert(text);
				$(".cutomerList").html(text);
			}
		})
	}) 
	
	// function product_list(){
	// 	$.ajax({
	// 		url 	: "Adminaction.php",
	// 		method 	: "POST",
	// 		data 	: {productlist:1},
	// 		success : function(data){
	// 			$(".productList").html(data);
	// 		}
	// 	})
	// }
	function product_listl(){
		$.ajax({
			url 	: "Adminaction.php",
			method 	: "POST",
			data 	: {productlistl:1},
			success : function(data){
				$(".pro").html(data);
			}
		})
	}
});