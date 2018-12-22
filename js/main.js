$(document).ready(function(){
	categories();
	brand(); 
	product();
	function categories(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {category:1},
			success : function(data){
				$("#get_cotegory").html(data);
			}
		});
	}
	function brand(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {brand:1},
			success : function(data){
				$("#get_brand").html(data);
			}
		});
	}
	function product(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {getproduct:1},
			success : function(data){
				$("#get_product").html(data);
			}
		});
	}
	$("body").delegate(".category","click",function(event){
		// event.PreventDefault();
		var cid = $(this).attr('cid');
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_selected_category:1,cat_id:cid},
			success : function(data){
				$("#get_product").html(data);
			}
		});
	});
	$("body").delegate(".select_brand","click",function(event){
		// event.PreventDefault();
		var bid = $(this).attr('bid');
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {select_brand:1,brand_id:bid},
			success : function(data){
				$("#get_product").html(data);
			}
		});
	});
	$("#search_btn").on('click',function(){
		var keyword = $("#search-box").val();
		if(keyword !=""){
			$.ajax({
				url : "action.php",
				method : "POST",
				data : {search:1,keyword:keyword},
				success : function(data){
					$("#get_product").html(data);
				}
			});
		}
	});
	$("#signup_btn").on('click',function(event){
		// event.PreventDefault();
		var data = $("form#customer_registration").serialize();
		$.ajax({
			url 	: "register.php",
			method 	: "POST",
			data 	: data,
			success : function(data){
				$("#signup_msg").html(data);
			}
		});
	});
	$("#login").click(function(event){
		// event.PreventDefault();
		var email = $("#email").val();
		var password = $("#password").val();
		$.ajax({
			url 	: "login.php",
			method 	: "POST",
			data 	: {userLogin:1, userEmail:email, userPassword:password},
			success : function(data){
				if (data == "true") {
					window.location.href ="profile.php";
				}
				if (data == "false"){
					alert("invalid credentials. please enter valid credentials");
				}
			}
		});
	});
	cart_count();
	$("body").delegate("#product",'click',function(event){
		//event.PreventDefault();
		var p_id = $(this).attr('pid');
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {addToProduct:1,proId:p_id},
			success : function(data){
				$("#product_msg").html(data);
				cart_count();
			}
		});
	});
	cart_container();
	function cart_container(){
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {get_cart_product:1},
			success : function(data){
				$("#cart_product").html(data);
			}
		});

	};
	function cart_count(){
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {cart_count:1},
			success : function(data){
				$(".badge").html(data);
			}
		});
	}
	
	cart_checkout();
	function cart_checkout(){
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data	: {cart_checkout:1},
			success	: function(data){
				$("#cart_checkout").html(data);
			}
		});
	}
	$("body").delegate(".qty",'keyup',function(event){
		var pid = $(this).attr('pid');
		var qty = $("#qty-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = qty * price;
		$("#total-"+pid).val(total);
	});
	$("body").delegate(".remove","click",function(event){
		//event.PreventDefault();

		var pid = $(this).attr("remove_id");
		//alert(pid);
		$.ajax({
			url  	: "action.php",
			method 	: "POST",
			
			data 	: {removeFromCart:1,removeId:pid},
			success : function(data){
				// alert(data);
				$("#cart_msg").html(data);
				cart_checkout();
			}
		});
	});
	$("body").delegate(".update","click",function(event){
		//event.PreventDefault();
		//event.stopImmediatePropagation();	
		var pid = $(this).attr("update_id");
		var qty = $("#qty-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = $("#total-"+pid).val();
		$.ajax({
			url 	: "action.php",
			method 	: "POST",

			data 	: {updateProduct:1,updateId:pid,qty:qty,price:price,total:total},
			success : function(data){
				// alert(data);
				$("#cart_msg").html(data);
				cart_checkout();
			}
		});
	});
	page();
	function page(){
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {page:1},
			success : function(data){
				
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(){
		var pageno = $(this).attr("page");
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {getproduct:1,setPage:1, pageNumber:pageno},
			success : function(data){
				$("#get_product").html(data);
			}
		})
	})
	$("#btnchangepass").on('click',function(){
		var sEmail = $('#changepassemail').val();
		if ($.trim(sEmail).length == 0) {
			alert('Please enter valid email address');
		}
		if (validateEmail(sEmail)) {
			$.ajax({
				url 	: "action.php",
				method 	: "POST",
				data 	: {btnchangepass:1,email:sEmail},
				success : function(data){
					if(data == "true") {
						window.location.href ="new_password.php";
					}
				}
			})
		}else {
			alert('Invalid Email Address');
		}
	});
	function validateEmail(sEmail){
		var filter = /^[_a-z0-9]+(\.[_a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,3})$/;
		if (filter.test(sEmail)) {
			return true;
		}else{
			return false;
		}
	}
});
