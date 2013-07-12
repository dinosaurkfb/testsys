$(document).ready(function(){
	
	$('.f_lang').live('change', function(eve){
		//清空level单选
		var name = new String($(eve.target).attr('name'));
		var no = name.charAt(name.length-1);
		var level = 'level_' + no;
		var attr = "input[name=" + level + "]";
		
		$(attr).each(function(){
			$(this).click();
			$(this).removeAttr("checked");
		});
		
		//$("label[for="+level+"]").attr("style", "display:none");
		
		//清空age输入
		attr = $(eve.target).attr('name') + '_age';
		var attr1 = "input[name=" + attr + "]";
		//alert("label[for="+attr+"]");
		$(attr1).focusout();
		$(attr1).val("");
		//$("label[for="+attr+"]").attr("style", "display:none");

		
		//语言名显示
		var answer = $(eve.target).attr('value');
		if(answer=='')
			answer = 'unknown';

		var id = '#' + $(eve.target).attr('name');
		$(id).text(answer);
		id = '#' + $(eve.target).attr('name') + '_age';
		$(id).text(answer);
		

	});
	
	$('a.confirm_logout').click(function(){
		return confirm('Are you sure to logout? If you do this, you will quit from test and all answers of you will lost？');	
	});
});