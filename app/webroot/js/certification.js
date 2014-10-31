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
$("form[id^='deleteCertification_']").on('submit', function( event ) {
	var id = $(this).attr('id');
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
console.log("success deleting");
console.log(id);
			$('#'+id).parent().parent().fadeOut(1000).remove();
		}
	});
	return false;
});
