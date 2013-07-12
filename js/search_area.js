
$(document).ready(function(){
	$('#del').live('click', function(eve){
		
		eve.preventDefault();
		if(confirm("确定永久删除该题型及题库吗？"))
		{
			window.location.href=$(eve.target).attr('href');
			return false;
		}
		else
		{
			return false;
		}
	});
});
