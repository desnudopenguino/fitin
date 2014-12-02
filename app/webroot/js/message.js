//load the mail stuff if inbox button is clicked
$(document).on('click',".message", function() {
	$($(this).data('target')).toggle('slow');
console.log('show/hide the item');
});
