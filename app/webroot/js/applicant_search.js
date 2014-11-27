//load the mail stuff if inbox button is clicked
$(document).on('click',".apply", function() {
console.log('Applied to '+ $(this).attr('href'));
	$.ajax({
		url: $(this).attr('href'),
		type: 'POST',
		async: true,
		success: function() {
			
		}});
	return false;
});

