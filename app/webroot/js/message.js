function clearActiveMail() {
		$('.mail-nav').removeClass('active');
}
//load the mail stuff if inbox button is clicked
$(document).on('click',".message", function() {
	$($(this).data('target')).toggle('slow');
console.log('show/hide the item');
});

$(document).on('click','#btn_sent', function() {
console.log("view sent messages");
	$.ajax({
		url: '../messages/sent',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#mail_content').html(result);
			clearActiveMail();
			$('#inbox-btn').addClass('active');
		}});
	
});

$(document).on('click','#btn_archive', function() {
console.log("view archived messages");
	$.ajax({
		url: '../messages/archive',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#mail_content').html(result);
			clearActiveMail();
			$('#inbox-btn').addClass('active');
		}});

});

$(document).on('click','#btn_inbox', function() {
console.log("view inbox messages");
	$.ajax({
		url: '../messages/inbox',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#mail_content').html(result);
			clearActiveMail();
			$('#inbox-btn').addClass('active');
		}});
});
