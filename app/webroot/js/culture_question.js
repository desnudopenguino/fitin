//call to load culture question 
$(document).on('click',"#cultureQuestions", function() {
	$.ajax({
		url: '../culture_questions/random',
		type: 'POST',
		async: true,
		success: function(result) {
console.log("Load the culture question!");
			$('#cultureContent').html(result);
		}
	});
	return false;
});

$(document).on('submit','#saveUserCultureAnswerForm', function(event) {
console.log(event.target.id);
	return false;	
});

$(document).on('click','.culture-choice', function() {
console.log($(this).attr('value'));
});
