$(document).ready(function() {
	$("#EmployerRegisterForm").validate({
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
			form.submit();
		}	
	});
	$("#ApplicantRegisterForm").validate({
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
			form.submit();
		}	
	});
	
});
