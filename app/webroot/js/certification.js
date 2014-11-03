// call to save new certification
$('#createCertificationForm').submit(function() {
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
	$('#createCertificationForm').get(0).reset();
	return false;
});

//call to delete certification
$("form[id^='deleteCertification_']").on('submit', function() {
	var id = $(this).attr('id');
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			$('#'+id).parent().parent().fadeOut(1000, function() { $(this).remove(); });
		}
	});
	return false;
});
