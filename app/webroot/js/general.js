
$( function() { 
	//attempt to keep modal focus while using datepicker.
	var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;
	$.fn.modal.Constructor.prototype.enforceFocus = function() {};

	// autofocus on first visible field in modal
	$('.modal').on('shown.bs.modal', function () {
  	lastfocus = $(this);
  	$(this).find('input[type!=hidden],select').filter(':first').focus();
	});
});

//on focus on a date input, load date picker
$(document).on('focus',"input[name*='date']", function() {
	$(this).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'
	});
});
