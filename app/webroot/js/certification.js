// call to save new certification
$('#create-certification').submit(function( event ) {
	$.ajax({
		url: '/certifications/add',
		data: $('#create-certification').serialize(),
		success: function(result) {
			alert(result);
		}
});
