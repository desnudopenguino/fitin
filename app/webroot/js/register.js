$(document).ready(function() {
	$("#EmployerRegisterForm").validate({
		rules: {
			"data[User][email]": {
			required: true, email: true
			},
			"data[User][email_confirmation]": { 
				required: true, equalTo: "#UserEmail",
			}, 
			"data[User][password]": { 
				required: true,
			}, 
			"data[User][password_confirmation]": { 
				required: true, equalTo: "#UserPassword",
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
				required: true, equalTo: "#UserEmail",
			}, 
			"data[User][password]": { 
				required: true,
			}, 
			"data[User][password_confirmation]": { 
				required: true, equalTo: "#UserPassword",
			}
		},
		submitHandler: function(form) {
			form.submit();
		}	
	});
	
});
