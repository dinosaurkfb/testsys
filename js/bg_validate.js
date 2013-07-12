function js_funcRegisterComm(url){
	$(document).ready(function() {	
		
	    $('form')[0].reset();
		$('.f_lang').live('change', function(eve){
			var answer = $(eve.target).attr('value');
			if(answer=='')
				answer = 'unknown';
			var id = '#' + $(eve.target).attr('name');
			$(id).text(answer);
			id = '#' + $(eve.target).attr('name') + '_age';
			$(id).text(answer);
		});
		
		function levelcheck1(val){
			
			var val_sel = $("input[name='level_1']:checked").val();
			
			if(typeof(val_sel)=="undefined" && $("input[name='f_lang1']").val()!="")
			{
				//alert('false');
				return false;
			}
			else
			{
				
				return true;
			}
		}
		
		function levelcheck2(val){
			
			var val_sel = $("input[name='level_2']:checked").val();
			if(typeof(val_sel)=="undefined" && $("input[name='f_lang2']").val()!="")
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		function levelcheck3(val){
			
			var val_sel = $("input[name='level_3']:checked").val();
			if(typeof(val_sel)=="undefined" && $("input[name='f_lang3']").val()!="")
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		function levelcheck4(val){
			
			var val_sel = $("input[name='level_4']:checked").val();
			if(typeof(val_sel)=="undefined" && $("input[name='f_lang4']").val()!="")
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		function agecheck1(val){
			
			var val = $("input[name='f_lang1_age']").val();
			if(val=="" && $("input[name='f_lang1']").val()!="")
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		function agecheck2(val){
			
			var val = $("input[name='f_lang2_age']").val();
			if(val=='' && $("input[name='f_lang2']").val()!="")
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		function agecheck3(val){
			
			var val = $("input[name='f_lang3_age']").val();
			if(val=='' && $("input[name='f_lang3']").val()!="")
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		function agecheck4(val){
			
			var val = $("input[name='f_lang4_age']").val();
			if(val=='' && $("input[name='f_lang4']").val()!="")
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		/* check form */
		jQuery.validator.addMethod('levelcheck1', levelcheck1);
		jQuery.validator.addMethod('levelcheck2', levelcheck2);
		jQuery.validator.addMethod('levelcheck3', levelcheck3);
		jQuery.validator.addMethod('levelcheck4', levelcheck4);
		jQuery.validator.addMethod('agecheck1', agecheck1);
		jQuery.validator.addMethod('agecheck2', agecheck2);
		jQuery.validator.addMethod('agecheck3', agecheck3);
		jQuery.validator.addMethod('agecheck4', agecheck4);
		
		$("#bg_form1").validate({
			debug: false,
			rules:{
				age:{ required: true, digits:true, range:[0,100]},
				sex:{ required: true},
				occupation:{ required: true}, 
				edu_level:{ required: true},
				dominant_hand:{	required: true},
				//defect:{ required: false},
				//reason:{ required: false, minlength:10}
			},
			/* error messages set */
			messages:{
			}
		});
		
		$("#bg_form2").validate({
			debug: false,
			rules:{
				native_lang:{ required: true},
				level_1:{ levelcheck1: true},
				level_2:{ levelcheck2: true}, 
				level_3:{ levelcheck3: true},
				level_4:{ levelcheck4: true},
				f_lang1_age:{ agecheck1: true},
				f_lang2_age:{ agecheck2: true}, 
				f_lang3_age:{ agecheck3: true},
				f_lang4_age:{ agecheck4: true}
			},
			/* error messages set */
			messages:{
			}
		});
	});
}