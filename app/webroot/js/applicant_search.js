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
			$(id).html('<i class="glyphicon glyphicon-send"></i> Applied');
			$(id).parent().parent().parent().parent().parent().parent().parent().prepend('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success!</strong> You have applied to this position.</div>');
		}});
	return false;
});


$(document).on('submit',"#searchApplicantForm", function() {

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
