// autofocus on first visible field in modal
$('.modal').on('shown.bs.modal', function () {
  lastfocus = $(this);
  $(this).find('input[type!=hidden],select').filter(':first').focus();
})

$( function() { 
	$('input[name*="date"]').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'
	});
});
