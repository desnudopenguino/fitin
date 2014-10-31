// call to save new certification
$('#createCertificationForm').submit(function( event ) {
	$.ajax({
		url: '/certifications/add',
		type: 'POST',
		async: true,
		dataType: 'html',
		data: $('#createCertificationForm').serialize(),
		success: function(result) {
			$('#createCertificationModal').modal('hide');
			$('#certificationsTable > tbody').append($(result).hide().fadeIn(1000));
		}	
	});
	return false;
});

//call to delete certification
$('form[id^"deleteCertification"]').submit(function() {
	alert($this);
	return false;
});
