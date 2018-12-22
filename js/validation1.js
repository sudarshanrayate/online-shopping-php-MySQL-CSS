$(document).ready(function(){
	$("#btnRegister").on('click',function(){
		
		var fName = $("#FNAME").val();
		var lName = $("#LNAME").val();
		var Email = $("#EMAIL").val();
		var pass = $("#PASSWORD").val();
		var confirmPass = $("#CONFIRMPASSWORD").val();
		var mobile = $("#MOBILE").val();
		var address1 = $("#ADDRESS1").val();
		var address2 = $("#ADDRESS2").val();
		CheckIsEmptyElement($("#FNAME"));
		CheckIsEmptyElement($("#LNAME"));
		CheckIsEmptyElement($("#EMAIL"));
		CheckIsEmptyElement($("#PASSWORD"));
		CheckIsEmptyElement($("#CONFIRMPASSWORD"));
		CheckIsEmptyElement($("#ADDRESS1"));

		if (firstName(fName)) {
			if (lastName(lName)) {
				if (validEmail(Email)) {
					if (password(pass)) {
						if (confirmPassword(confirmPass,pass)) {
							if (mobileno(mobile)) {
								if (address(address1)) {
									$.ajax({
										url 	: "register.php",
										type 	: "POST",
										data	: {btnRegister:1,fname:fName,lname:lName,email:Email,password:pass,confirmPass:confirmPass,mobile:mobile,address1:address1,address2:address2},
										success : function(data){
											alert(data);
											window.location.href ="index.php";
										}
									})
								}
							}
						}
					}
				}
			}
		}

		function CheckIsEmptyElement(element)
		{ 
			var errorElement = element.parent().parent().find(".error");

			if(element.val()=="")
			{
				$(errorElement).text("Please fill this field");
			}
			else{
				$(errorElement).text("");
			}
		}

		$("#FNAME").keyup(function(){
			var res = CheckIsEmptyElement($(this));
			if(res == 0)
			{
				firstName($(this));
			}
		})
		$("#LNAME").keyup(function(){
			var res = CheckIsEmptyElement($(this));
			if(res == 0)
			{
				lastName($(this));
			}
		})
		$("#EMAIL").keyup(function(){
			var res = CheckIsEmptyElement($(this));
			if(res == 0)
			{
				validEmail($(this));
			}
		})
		$("#PASSWORD").keyup(function(){
			var res = CheckIsEmptyElement($(this));
			if(res == 0)
			{
				password($(this));
			}
		})
		$("#confirmPassword").keyup(function(){
			var res = CheckIsEmptyElement($(this));
			if(res == 0)
			{
				confirmPassword($(this));
			}
		})
		$("#MOBILE").keyup(function(){
			var res = CheckIsEmptyElement($(this));
			if(res == 0)
			{
				mobileno($(this));
			}
		})
		$("#ADDRESS1").keyup(function(){
			var res = CheckIsEmptyElement($(this));
			if(res == 0)
			{

				ADDRESS1($(this));
			}
		})
		function firstName(fName){
			var letters = /^[a-zA-Z]+$/;
			if (letters.test(fName)) {
				return true;
				$("#erorrFName").hide();  
			}else{
				$("#erorrFName").text("Please Enter First Name");
				return false;
			}
		}
		function lastName(lName){
			var letters = /^[a-zA-Z]+$/;
			if (letters.test(lName)) {
				return true;
				$("#erorrLName").hide();  
			}else{
				$("#erorrLName").text("Please Enter last Name");
				return false;
			}
		}
		function validEmail(Email){
			var letters = /^[_a-z0-9]+(\.[_a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,3})$/;
			if (letters.test(Email)) {
				return true;
				$("#erorrEmail").hide();  
			}else{
				$("#erorrEmail").text("Please Enter Valid Email");
				return false;
			}
		}
		function password(pass)  
		{  
			var p = /^[a-zA-Z0-9 ]+$/;
			var passlen = $("#PASSWORD").val().length; 
			if (passlen>8) {
				if (p.test(pass))  
				{  
					return true;
					$("#erorrPassword").hide();
				}else{
					$("#erorrPassword").text("Please Enter Strong Password containig Capital letter or Small letter and having minimum 8 characters");
					return false; 
				} 
			}else{
				$("#erorrPassword").text("Please Enter Strong Password containig Capital letter or Small letter and having minimum 8 characters");
				return false; 
			} 
		}  
		function confirmPassword(confirmPass,pass)  
		{  
			if (confirmPass == pass) 
			{
				return true;
				$("#erorrConfirmPassword").hide();
			}
			$("#erorrConfirmPassword").text("Check Password");
			return false;
		}  
		function mobileno(mobile){
			var letters = /^[0-9]+$/;
			var numLegth = $("#MOBILE").val().length;
			if(numLegth<=9 || numLegth>=11){
				$("#erorrmobile").text("Please Enter 10 Digit Number only");
				return false;
			}else{
				if (letters.test(mobile)) {
					return true;
					$("#erorrmobile").hide();  
				}else{
					$("#erorrmobile").text("Please Enter Digit only");
					return false;
				}
			}
		}
		function address(address1){
			var letters = /^[a-zA-Z ]+$/;
			if (letters.test(address1)) {
				return true;
				$("#errorAddress").hide();  
			}else{
				$("#errorAddress").text("Please Enter Address");
				return false;
			}
		}
	});
});