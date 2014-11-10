// call to save new project
$('#createProjectForm').submit(function() {
$(this).find('#ProjecnIndustry1IndustryId').is(':hidden').remove();
$(this).find('#ProjecnIndustry2IndustryId').is(':hidden').remove();
	$.ajax({
		url: $(this).attr('action'),
		type: 'POST',
		async: true,
		dataType: 'html',
		data: $('#createProjectForm').serialize(),
		success: function(result) {
			$('#createProjectModal').modal('hide');
			$('#projects').append($(result).hide().fadeIn(400));
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
console.log(id + ' deleted');
			$('#'+id).closest('.panel').fadeOut(300, function() { $(this).remove(); });
console.log(id + ' removed');
		}
	});
	return false;
});

//call to update project
$(document).on('submit',"form[id^='editProjectForm_']", function() {
	var formId = '#'+$(this).attr('id');
	var id = formId.match(/\d+/g,'');
	var modalId = '#editProjectModal_'+id;
	var blockId = '#project_'+id;

	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			$(modalId).modal('hide');
			setTimeout(function() {
				$(blockId).replaceWith(result);
			}, 500);
		}
	});
	return false;
});

//call to add item to industries
var industry_counter = 1;
$(document).on('click','.addProjectIndustry', function() {
console.log("add project industry");
	$('#ProjectIndustry'+industry_counter+'IndustryId').show();
	industry_counter++;
});
