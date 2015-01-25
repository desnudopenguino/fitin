$(document).ready(function() {
	$("#EmployerRegisterForm").validate({
		rules: {
			email: {
			required: true, email: true
			},
			confirm_email: { 
				required: true, equalTo: "#email",
			}, 
			password: { 
				required: true,
			}, 
			confirm_password: { 
				required: true, equalTo: "#password",
			}
			
	});
	
});
 -->
