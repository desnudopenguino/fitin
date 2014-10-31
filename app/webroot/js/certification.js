// call to save new certification
$('#create-certification').submit(function( event ) {
	alert("submitted the form!");
	$.ajax({
		url: '/certifications/add',
		method: 'POST',
		data: $('#create-certification').serialize(),
		contentType: 'application/json',
		success: function(result) {
			alert(result);
		}	
	});
	return false;
});
