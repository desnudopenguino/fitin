// call to save new education
$('#createEducationForm').submit(function() {
	$.ajax({
		url: '/educations/add',
		type: 'POST',
		async: true,
		dataType: 'html',
		data: $('#createEducationForm').serialize(),
		success: function(result) {
			$('#createEducationModal').modal('hide');
			$('#educationsTable > tbody').append($(result).hide().fadeIn(1000));
			$('#createEducationForm').get(0).reset();
		}	
	});
	return false;
});

//call to delete education
$("form[id^='deleteEducation_']").on('submit', function() {
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
