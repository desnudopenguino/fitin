//load the mail stuff if inbox button is clicked
$(document).on('click',".cancel", function(e) {
var id = $(this).attr('href').match(/\d+/g,'');
	$.ajax({
		url: $(this).attr('href'),
		type: 'POST',
		async: true,
		success: function() {
			$('#application_'+id).fadeOut(200, function() ( $(this).remove(); });
		}});
	return false;
});

