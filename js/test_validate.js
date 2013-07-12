function js_funcRegisterComm(url_next){
	$(document).ready(function() {
		function checkbox_submit(url_next){
			
			var url = $("form").attr('action');
			var question_id = $("#question_id").val();
			var step = $('#step').val();
			var answer = new Array();
			
			$("input[name='answer']:checked").each(function(){
				answer.push($(this).val());
			}) 
			
			var data = {
				question_id: question_id,
				answer: answer,
				step: step
			};
			
			$.post(url, data)
				.success(function(content) { 
					if(content == 'expired')
					{
						var url_redirect = new String($("form").attr('action'));
						window.location.href = url_redirect.replace(/change_answer/,'testing');
					}
					else
					{
						window.location.href = url_next;
					}
				})
					
				.error(function() { 
					alert("Net error! Please click button again to resent your answer.");
				});
		}
		
		function radio_submit(url_next){
			
			var url = $("form").attr('action');
			var question_id = $("#question_id").val();
			
			var answer = $("input[name='answer']:checked").val();
			//var answer = $(eve.target).attr('value');
			var step = $('#step').val();
			//alert(answer);
			var data = {
				question_id: question_id,
				answer: answer,
				step: step
			};
			
			$.post(url, data)
				.success(function(content) { 
					if(content == 'expired')
					{
						var url_redirect = new String($("form").attr('action'));
						window.location.href = url_redirect.replace(/change_answer/,'testing');
					}
					else
					{
						window.location.href = url_next;
					}
				})
					
				.error(function() { 
					alert("Net error! Please click button again to resent your answer.");
				});
		}
		
		
		function textarea_submit(url_next){
			
			var url = $("form").attr('action');
			var question_id = $("#question_id").val();
			var answer = $("textarea[name='answer']").val();
			var step = $('#step').val();
			//alert(answer);
			var data = {
				question_id: question_id,
				answer: answer,
				step: step
			};
			
			$.post(url, data)
				.success(function(content) { 
					if(content == 'expired')
					{
						var url_redirect = new String($("form").attr('action'));
						window.location.href = url_redirect.replace(/change_answer/,'testing');
					}
					else
					{
						window.location.href = url_next;
					}
				})
					
				.error(function() { 
					alert("Net error! Please click button again to resent your answer.");
				});
		}

		$('a.confirm_logout').click(function(){
			return confirm('Are you sure to logout? If you do this, you will quit from test and all answers of you will lost？');	
		});
		
		
		$("#next").live('click',function(eve)
		{
			var flag = false;
			
			var type= $("input[name=answer]").attr("type");
			
			if(type=='radio')
			{
				$("input[name=answer]").each(function(){
					
					if($(this).attr("checked") == "checked")
					{
						flag = true;
						return false;
					}
				});
				
				if(flag == false)
				{
					$("label[for=answer]").attr("style", "");
				}
				else
				{
					radio_submit(url_next);
				}
				
			}
			else if(type=='checkbox')
			{
				if($("input[name='answer']:checked").length == 0)
				{
					$("label[for=answer]").attr("style", "");
				}
				else
				{
					checkbox_submit(url_next);
				}
			}
			else
			{
				if($("textarea[name=answer]").val() != "")
				{
//					//alert('2j')
//					if($("textarea[name=answer]").val().length <=1)
//					{
//						$("label[for=answer]").text("Answer should contain at least 3 characters!");
//						$("label[for=answer]").attr("style", "");
//					}
//					else
//					{
						textarea_submit(url_next);
//					}
				
					
				}
				else
				{
					$("label[for=answer]").attr("style", "");
				}
			}
		});
	});
}