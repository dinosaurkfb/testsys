
$(document).ready(function(){
	$('input[type="radio"]').live('click', function(eve){
		
		//eve.preventDefault();
		var url = $("form").attr('action');
		var question_id = $("#question_id").val();
		var answer = $(eve.target).attr('value');
		var step = $('#step').val();
		//alert(step);
		url+='/';
		url+=question_id;
		url+='/';
		url+=answer;
		url+='/';
		url+=step;
		
		$.get(url, function(content){
			if(content == 'expired')
			{
				var url_redirect = new String($("form").attr('action'));
				window.location.href = url_redirect.replace(/change_answer/,'testing');
			}
		});
	});

	$('textarea').live('change', function(eve){
		//eve.preventDefault();
		var url = $("form").attr('action');
		var question_id = $("#question_id").val();
		var answer = $(eve.target).val();
		//alert(question_id);
		//alert(answer);
		var step = $('#step').val();
		//alert(step);
		url+='/';
		url+=question_id;
		url+='/';
		url+=answer;
		url+='/';
		url+=step;
		
		$.get(url, function(content){
			if(content == 'expired')
			{
				var url_redirect = new String($("form").attr('action'));
				window.location.href = url_redirect.replace(/change_answer/,'testing');
			}
		});
	});


	$('a.confirm_logout').click(function(){
		return confirm('Are you sure to logout? If you do this, you will quit from test and all answers of you will lost？');	
	});
});


