// call to save new certification
$('#createCertificationForm').submit(function( event ) {
	alert("submitted the form!");
	$.ajax({
		url: '/certifications/add',
		type: 'POST',
		async: true,
		dataType: 'html',
		data: $('#createCertificationForm').serialize(),
		success: function(result) {
			$('#createCertificationModal').modal('hide');
			$('#certificationsTabel > tbody').append($(result).hide().fadeIn(1000));
			alert(result);
		}	
	});
	return false;
});
