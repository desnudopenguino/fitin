//load the mail stuff if inbox button is clicked
$(document).on('click',"#inbox-btn", function() {
	$.ajax({
		url: '../messages/inbox',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#dashboardContent').html(result);
		}});
});

//load the applications stuff if applications button is clicked
$(document).on('click',"#applications-btn", function() {
	$.ajax({
		url: '../applications/index',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#dashboardContent').html(result);
		}});

});
