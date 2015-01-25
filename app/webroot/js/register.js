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
		},
		submitHandler: function(form) {
			//form.submit();	
			alert('valid form submitted'); // for demo
            return false; // for demo
		}	
	});
	
});
