function loadRandomCultureQuestion() {
	$.ajax({
		url: '../culture_questions/random',
		type: 'POST',
		async: true,
		success: function(result) {
			$('#cultureContent').html(result);
		}
	});

}
//call to load culture question 
$(document).on('click',"#cultureQuestions", function() {
loadRandomCultureQuestion();
	return false;
});

$(document).on('click','.culture-choice', function() {
	$('#answer').val($(this).attr('value'));
});

$(document).on('submit','#saveUserCultureAnswerForm', function() {
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			loadRandomCultureQuestion();
		}
	});
	return false;	
});
