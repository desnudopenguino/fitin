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
			$('#createCertificationForm').get(0).reset();
		}	
	});
	return false;
});

//call to delete certification
$(document).on('submit',"form[id^='deleteCertification_']", function() {
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

//call to update certification
$(document).on('submit',"form[id^='editCertificationForm_']", function() {
	var formId = '#'+$(this).attr('id');
	var modalId = '#editCertificationModal_'.id.match(/\d+/g,'');
console.log(formId);
console.log(modalId);
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			$(modalId).modal('hide');
			$(formId).parent().parent().replaceWith(result);
			$(formId).get(0).reset();
		}
	});
	return false;
});
