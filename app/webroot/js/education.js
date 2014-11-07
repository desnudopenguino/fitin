// call to save new education
$('#createEducationForm').submit(function() {
	$.ajax({
		url: $(this).attr('action'),
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
//$("form[id^='deleteEducation_']").on('submit', function() {
$(document).on('submit',"form[id^='deleteEducation_']", function() {
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
$(document).on('submit',"form[id^='editEducationForm_']", function() {
	var formId = '#'+$(this).attr('id');
	var modalId = '#editEducationModal_'+formId.match(/\d+/g,'');
console.log(formId);
console.log(modalId);
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			$(modalId).modal('hide');
			setTimeout(function() {
				$(formId).closest('tr').replaceWith(result);
			}, 500);
		}
	});
	return false;
});
