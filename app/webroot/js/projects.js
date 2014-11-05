// call to save new project
$('#createProjectForm').submit(function() {
	$.ajax({
		url: '/projects/add',
		type: 'POST',
		async: true,
		dataType: 'html',
		data: $('#createProjectForm').serialize(),
		success: function(result) {
			$('#createProjectModal').modal('hide');
			$('#projectsTable > tbody').append($(result).hide().fadeIn(400));
			$('#createProjectForm').get(0).reset();
		}	
	});
	return false;
});

//call to delete project
$(document).on('submit',"form[id^='deleteProject_']", function() {
	var id = $(this).attr('id');
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			$('#'+id).parent().parent().fadeOut(300, function() { $(this).remove(); });
		}
	});
	return false;
});

//call to update project
$(document).on('submit',"form[id^='editProjectForm_']", function() {
	var formId = '#'+$(this).attr('id');
	var modalId = '#editProjectModal_'+formId.match(/\d+/g,'');
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
