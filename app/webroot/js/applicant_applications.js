//load the mail stuff if inbox button is clicked
$(document).on('click',".cancel", function(e) {

var id = '#'+$(this).attr('id');
console.log(id);
	$.ajax({
		url: $(this).attr('href'),
		type: 'POST',
		async: true,
		success: function() {
console.log('cancelled to '+ $(this).attr('href'));
		}});
	return false;
});

