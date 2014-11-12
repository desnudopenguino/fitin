//call to load culture question 
$(document).on('click',"#cultureQuestions", function() {
	$.ajax({
		url: '../culture_questions/random',
		type: 'POST',
		async: true,
		success: function(result) {
console.log("Load the culture question!");
			$('#cultureContent').replace(result);
		}
	});
	return false;
});
