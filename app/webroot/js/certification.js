// call to save new certification
$('#create-certification').submit(function( event ) {
	alert("submitted the form!");
	$.ajax({
		url: '/certifications/add',
		type: 'POST',
		async: true,
		dataType: 'html',
		data: $('#create-certification').serialize(),
		success: function(result) {
			alert(result);
		}	
	});
	return false;
});
