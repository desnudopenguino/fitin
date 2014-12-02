function clearActive() {
		$('.dashboard-nav').removeClass('active');
}

//load the mail stuff if inbox button is clicked
$(document).on('click',"#inbox-btn", function() {
	$.ajax({
		url: '../messages/inbox',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#dashboardContent').html(result);
			clearActive();
			$('#inbox-btn').addClass('active');
		}});
});

//load the applications stuff if applications button is clicked
$(document).on('click',"#applications-btn", function() {
	$.ajax({
		url: '../applications/applicant',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#dashboardContent').html(result);
			clearActive();
			$('#applications-btn').addClass('active');
		}});
});

