//load the mail stuff if inbox button is clicked
$(document).on('click',".apply", function(e) {

console.log('Applied to '+ $(this).attr('href'));
e.preventDefault();
	$.ajax({
		url: $(this).attr('href'),
		type: 'POST',
		async: true,
		success: function() {
			
		}});
	return false;
});

