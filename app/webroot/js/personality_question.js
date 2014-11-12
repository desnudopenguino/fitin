function loadRandomPersonalityQuestion() {
	$.ajax({
		url: '../personality_questions/random',
		type: 'POST',
		async: true,
		success: function(result) {
			$('#cultureContent').html(result);
		}
	});
}
//call to load personality question 
$(document).on('click',"#personalityQuestions", function() {
loadRandomPersonalityQuestion();
	return false;
});

$(document).on('click','.personality-choice', function() {
	$('#answer').val($(this).attr('value'));
});

$(document).on('submit','#saveApplicantPersonalityAnswerForm', function() {
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			loadRandomPersonalityQuestion();
		}
	});
	return false;	
});
