//load the mail stuff if inbox button is clicked
$(document).on('submit',"#searchPositionForm", function() {

	$.ajax({
		url: '../positions/dataCard/'+$('#PositionId').val(),
		type: 'POST',
		async: true,
		success: function(result) {
			$('#position-data').html(result).hide().fadeIn(300);
		}});	

	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			$('#results').html(result).hide().fadeIn(300);
		}});
		
	return false;
});
