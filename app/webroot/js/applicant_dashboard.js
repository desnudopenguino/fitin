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
		url: '../applications/applicant',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#dashboardContent').html(result);
			clearActive();
			$('#applications-btn').parent().addClass('active');
		}});
});

//load settings stuff
$(document).on('click',"#settings-btn", function() {
	$.ajax({
		url: '../settings',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#dashboardContent').html(result);
			clearActive();
			$('#settings-btn').parent().addClass('active');
		}});
});

//load settings stuff
$(document).on('click',"#services-btn", function() {
	$.ajax({
		url: '../applicants/checkout',
		type: 'GET',
		async: true,
		success: function(result) {
			$('#dashboardContent').html(result);
			clearActive();
			$('#services-btn').parent().addClass('active');
		}});
});


$(document).on('submit',"#searchApplicantForm", function() {
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			$('#settings-search').prepend(result);
		}});
	return false;
});

