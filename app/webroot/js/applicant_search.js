//load the mail stuff if inbox button is clicked
$(document).on('click',".apply", function(e) {

console.log('Applied to '+ $(this).attr('href'));
e.preventDefault();
var id = '#'+$(this).attr('id');
console.log(id);
	$.ajax({
		url: $(this).attr('href'),
		type: 'POST',
		async: true,
		success: function() {
			$(id).addClass('disabled');
			$(id).text('Applied');
			
		}});
	return false;
});

