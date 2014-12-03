//load the mail stuff if inbox button is clicked
$(document).on('click',".message", function() {
	$($(this).data('target')).toggle('slow');
console.log('show/hide the item');
});

$(document).on('click','#sent', function() {

});

$(document).on('click','#archive', function() {

});

$(document).on('click','#inbox', function() {

});
