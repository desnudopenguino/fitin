function loadRandomCultureQuestion() {
	$.ajax({
		url: '../culture_questions/random',
		type: 'POST',
		async: true,
		success: function(result) {
console.log("Load the culture question!");
			$('#cultureContent').html(result);
		}
	});

}
//call to load culture question 
$(document).on('click',"#cultureQuestions", function() {
/*	$.ajax({
		url: '../culture_questions/random',
		type: 'POST',
		async: true,
		success: function(result) {
console.log("Load the culture question!");
			$('#cultureContent').html(result);
		}
	});*/
loadRandomCultureQuestion();
	return false;
});

$(document).on('click','.culture-choice', function() {
	$('#answer').val($(this).attr('value'));
console.log($(this) + " has been clicked");
});

$(document).on('submit','#saveUserCultureAnswerForm', function() {
console.log("form submitting!");
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
console.log("form success!");
			loadRandomCultureQuestion();
		}
	});
	return false;	
});
