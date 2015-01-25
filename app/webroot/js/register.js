$(document).ready(function() {
	$("#EmployerRegisterForm").validate({
		debug: true,
		rules: {
			"data[User][email]": {
			required: true, email: true
			},
			"data[User][email_confirmation]": { 
				required: true, equalTo: "#email",
			}, 
			"data[User][password]": { 
				required: true,
			}, 
			"data[User][password_confirmation]": { 
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
