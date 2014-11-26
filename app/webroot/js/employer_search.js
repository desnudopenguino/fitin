//load the mail stuff if inbox button is clicked
$(document).on('submit',"#searchPositionForm", function() {
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			$('#results').html(result).hide().fadeIn(300);
		}});
console.log($(this).serialize());
		
	return false;
});
