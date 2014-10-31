// call to save new certification
$('#createCertificationForm').submit(function( event ) {
	$.ajax({
		url: '/certifications/add',
		type: 'POST',
		async: true,
		dataType: 'html',
		data: $('#createCertificationForm').serialize(),
		success: function(result) {
			$('#createCertificationModal').modal('hide');
			$('#certificationsTable > tbody').append($(result).hide().fadeIn(1000));
		}	
	});
	return false;
});

//call to delete certification
$("form[id^='deleteCertification_']").submit(function( event ) {
	return false;
});

$("form[id^='deleteCertification_'] > input[type='submit']").click(function( event ) {
console.log(this);
console.log(this.form);
console.log($(this).parents('form:first')); // get the form
	return false;
});
