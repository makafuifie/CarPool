function login(){
			//var email = $("#email").val();
			//var password = $("#password").val();
			var data =$("#login_form").serialize();
			// var url="ajaxRequests.php?cmd=1&email="+$email+"&password="+$password;
			// $.ajax(url,{
			// 	async:true, complete:loginComplete,type:'POST'
			// });
			$.ajax({
				type:'POST',
				//url: 'http://52.89.116.249/~makafui.fie/mobile_web_fall_2016/CarPool/login.php',
				url: 'login.php',
				data: data,
				success: function(response){
					
					if(response.trim()=="ok"){
						$("#btn-login").html('<img src="images/ajax-loader.gif" /> &nbsp; Signing Up ...');

						//window.location.href="index.html";
						setTimeout('window.location.href="home.html";', 1000);
					}
					/**
						$("#btn-login").html('<img src="images/ajax-loader.gif" /> &nbsp; Signing In ...');
						setTimeout('window.location.href="home.html";', 1000);
					}*/
					else{
						$("#error").fadeIn(1000, function(){      
							$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
						});
					}


				}

			});
			return false;

					// function loginComplete(xhr, status){
					// 	if(status!="success"){
					// 		alert("Error logging in!");
					// 		return;
					// 	}

				}


function createPool(){
	var destination = ("#destination").val();
	var  dateTime= ("#dateTime").val();
	var  phone= ("#phone").val();
	var  numbPoolers= ("#numbPoolers").val();
	var  cost= ("#cost").val();

	var url = "ajaxRequests.phpcmd=1&destination="+destination+"&dateTime="dateTime+"&phone="+phone+"&numbPoolers="+numbPoolers+"&cost="cost;

	$.ajax(url,{
		async:true, complete: createPoolComplete
	});


}
function createPoolComplete(xhr, status){
	
}
function register(){
			// var email = $("#email").val();
			// var lastName = $("#lastName").val();
			// var lastName = $("#firstName").val();
			// var password = $("#password").val();
			// var phone = $("#phone").val();
			// var url="ajaxRequests.php?cmd=1&email="+email+"lastName="+lastName+"firstName="+firstName+"password="+password+"phone="+phone;
			// $.ajax(url,{
			// 	async: true, complete:registerComplete
			// });

			var data=$("#register-form").serialize();

			$.ajax({
				type : 'POST',
				url  : 'register.php',
				data : data,
				success: function(data){
					if(data==1){
						$("#error").fadeIn(1000, function(){
							$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already taken !</div>');

						});
					}
					else if(data="registered"){
						
						$("#btn-submit").html('<img src="images/ajax-loader.gif" /> &nbsp; Signing Up ...');

						//window.location.href="index.html";
						setTimeout('window.location.href="index.html";', 1000);
					}
					else{
						$("#error").fadeIn(1000, function(){
							$("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

						});
					}
				}
			});
			return false;
		}
		