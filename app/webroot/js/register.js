$(document).ready(function() {
	$("#EmployerRegisterForm").validate({
		rules: {
			"data[User][email]": {
			required: true, email: true
			},
			"data[User][email_confirmation]": { 
				required: true, equalTo: "#data[User][email]",
			}, 
			"data[User][password]": { 
				required: true,
			}, 
			"data[User][password_confirmation]": { 
				required: true, equalTo: "#data[User][password]",
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
				required: true, equalTo: "#data[User][email]",
			}, 
			"data[User][password]": { 
				required: true,
			}, 
			"data[User][password_confirmation]": { 
				required: true, equalTo: "#data[User][password]",
			}
		},
		submitHandler: function(form) {
			form.submit();
		}	
	});
	
});
