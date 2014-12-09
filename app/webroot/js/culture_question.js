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

function updateStats(next) {
	//1st get the stats
	var match = parseInt($('#match').text());
	var total = parseInt($('#total').text());
	var percent = parseInt($('#percent').text);
	//if match < total add to match, update percent
	if (match < total && next) {
		match ++;
	} else if(!next) {
		match --;
	}
	percent = Math.round(match/total * 100);
	$('#match').html(match);
	$('#percent').html(percent);
}

//call to load culture question 
$(document).on('click',"#cultureQuestions", function() {
	loadRandomCultureQuestion();
	return false;
});

$(document).on('click',"#skipCultureQuestion", function() {
	loadRandomCultureQuestion();
	return false;
});

$(document).on('click',"#undoCultureQuestion", function() {
	$.ajax({
		url: '../culture_questions/undo',
		type: 'POST',
		async: true,
		success: function(result) {
			$('#cultureContent').html(result);
			updateStats(false);
		}
	});
	return false;
});

$(document).on('click','.culture-choice', function() {
	$('#answer').val($(this).attr('value'));
});

$(document).on('submit','#saveUserCultureAnswerForm', function(e) {
	$('.form-button').attr('disabled', true);
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		async: true,
		data: $(this).serialize(),
		success: function(result) {
			loadRandomCultureQuestion();
			updateStats(true);
		}
	});
	return false;	
});
