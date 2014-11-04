
$( function() { 
	//use datepicker on any input that has date in the name
	$('input[name*="date"]').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'
	});

	//attempt to keep modal focus while using datepicker.
	var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;
	$.fn.modal.Constructor.prototype.enforceFocus = function() {};

	// autofocus on first visible field in modal
	$('.modal').on('shown.bs.modal', function () {
  	lastfocus = $(this);
  	$(this).find('input[type!=hidden],select').filter(':first').focus();
	});
});


