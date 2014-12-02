//load the mail stuff if inbox button is clicked
$(document).on('click',".message", function() {
	var target = $(this).attr('data-target');
	$('#'+target).toggle('slow');
console.log('show/hide the item');
});
