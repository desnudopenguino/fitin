function clearActive() {
		$('.dashboard-nav').parent().removeClass('active');
}

//load the mail stuff if inbox button is clicked
$(document).on('click',"#inbox-btn", function() {
	$.ajax({
		url: '../messages/load',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#dashboardContent').html(result);
			clearActive();
			$('#inbox-btn').parent().addClass('active');
		}});
});

//load the applications stuff if applications button is clicked
$(document).on('click',"#applications-btn", function() {
	$.ajax({
		url: '../applications/employer',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#dashboardContent').html(result);
			clearActive();
			$('#applications-btn').parent().addClass('active');
		}});

});
