// call to save new position
$('#createPositionForm').submit(function() {
	$.ajax({
		url: $(this).attr('action'),
		type: 'POST',
		async: true,
		dataType: 'html',
		data: $('#createPositionForm').serialize(),
		success: function(result) {
			$('#createPositionModal').modal('hide');
			$('#positions').append($(result).hide().fadeIn(400));
			$('#createPositionForm').get(0).reset();
		}	
	});
	return false;
});

//call to delete position
$(document).on('submit',"form[id^='deletePosition_']", function() {
	if(confirm('Are you sure?')) {
	var id = $(this).attr('id');
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			$('#'+id).closest('.panel').fadeOut(300, function() { $(this).remove(); });
		}
	});
	}
	return false;
});

//call to update position
$(document).on('submit',"form[id^='editPositionForm_']", function() {
	var formId = '#'+$(this).attr('id');
	var id = formId.match(/\d+/g,'');
	var modalId = '#editPositionModal_'+id;
	var blockId = '#position_'+id;

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
$(document).on('click','.addPositionIndustry', function() {
	$('#PositionIndustry'+industry_counter+'IndustryId').show();
	industry_counter++;
});

//call to add item to functions
var function_counter = 1;
$(document).on('click','.addPositionFunction', function() {
	$('#PositionFunction'+function_counter+'WorkFunctionId').show();
	function_counter++;
});
