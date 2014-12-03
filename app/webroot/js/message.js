//load the mail stuff if inbox button is clicked
$(document).on('click',".message", function() {
	$($(this).data('target')).toggle('slow');
console.log('show/hide the item');
});

$(document).on('click','#btn_sent', function() {
console.log("view sent messages");
});

$(document).on('click','#btn_archive', function() {
console.log("view archived messages");

});

$(document).on('click','#btn_inbox', function() {
console.log("view inbox messages");
});
