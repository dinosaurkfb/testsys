<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="pragma" content="no-cache" /> 
<meta http-equiv="Cache-Control" content="no-store, must-revalidate" /> 
<meta http-equiv="expires" content="Wed, 26 Feb 1997 08:21:57 GMT" /> 
<meta http-equiv="expires" content="0" />
<link rel="stylesheet" href="<?php echo base_url('images/admin.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('css/bg.css');?>" />
<script language="javascript" src="<?php echo base_url('js/jquery.js');?>"></script>
<script language="javascript" src="<?php echo base_url('js/admin.js');?>"></script>
<script language="javascript" src="<?php echo base_url('js/biography.js');?>"></script>
<script language="javascript" src="<?php echo base_url('js/jquery.validate.min.js');?>"></script>
<script language="javascript" src="<?php echo base_url('js/bg_validate.js');?>"></script>
<script language="javascript">
	js_funcRegisterComm('');
</script>
</head>

<body>
<div class="container">
	<div id="header">
		<div class="logo">
<!--			<img src="<?php echo base_url('images/logo.gif');?>" />-->
		</div>
		<p>
			<a class='confirm_logout' href="<?php echo site_url('/login/logout');?>"><?php echo lang('Log out')?></a>
           	<span><?php echo lang('Hello')?>! <label class="bold"><?php echo $_SESSION['user']['name'];?></label>，
            <?php echo lang('Authority')?>:<label class="bold"><?php echo $_SESSION['user']['m_authority']>1?lang('admin'):lang('participant');?></label></span>
    	</p>
	</div>
	<div id="admin_right" style='margin:4px 0 0 0px'>
	<div class="headbar">
	<!--<div class="position"><span><?php echo lang('Psychological Test System')?></span><span>&gt;</span><span><?php echo lang('Biography')?></span><span></span></div>-->
  	</div>
<div class="content_box">
	<div style="height: 448px;" class="content form_content">
		<form action="<?php echo site_url('users/test/bg_submit/'.$step);?>" method="post" id="bg_form2">
			<table class="form_table" id='bg_table'>
				<colgroup>
				<col width="150px"></col>
				</colgroup>
				
				<tbody>
				<tr>
					<th>7</th>
					<td colspan="2">
						<?php echo lang("What's your native language?")?>
					</td>
					<td colspan="2">
						<input type='text' name='native_lang'></input>
						<label for="native_lang" class="error" style="display:none;">Please choose one.</label>
					</td>
				</tr>
           		<tr>
					<th>8</th>
					<td colspan="5">
						<?php echo lang('List all other languages and/or dialects that you know. List them in order of most fluent to least fluent.')?>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						1.<input type='text' name='f_lang1' class='f_lang'/>
					</td>
					<td>
						2.<input type='text' name='f_lang2' class='f_lang'/>
					</td>
					<td>
						3.<input type='text' name='f_lang3' class='f_lang'/>
					</td>	
					<td>
						4.<input type='text' name='f_lang4' class='f_lang'/>
					</td>			
				</tr>
				<tr>
					<th>9</th>
					<td colspan=4>
						<?php echo lang('Evaluate your level in each of the above mentioned languages.')?>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<strong id='f_lang1'><?php echo lang('Language or Dialect')?></strong>
					</td>
					<td>
						<input type='radio' name='level_1' value='1'/><?php echo lang('Beginner')?>
					</td>
					<td>
						<input type='radio' name='level_1' value='2'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_1' value='3'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_1' value='4'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_1' value='5'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_1' value='6'/><?php echo lang('Native Speaker')?>
					</td>															
					<td>
						<label for="level_1" class="error" style="display:none;">Please choose one.</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<strong id='f_lang2'><?php echo lang('Language or Dialect')?></strong>
					</td>
					<td>
						<input type='radio' name='level_2' value='1'/><?php echo lang('Beginner')?>
					</td>
					<td>
						<input type='radio' name='level_2' value='2'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_2' value='3'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_2' value='4'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_2' value='5'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_2' value='6'/><?php echo lang('Native Speaker')?>
					</td>
					<td>
						<label for="level_2" class="error" style="display:none;">Please choose one.</label>
					</td>														
				</tr>
				<tr>
					<th></th>
					<td>
						<strong id='f_lang3'><?php echo lang('Language or Dialect')?></strong>
					</td>
					<td>
						<input type='radio' name='level_3' value='1'/><?php echo lang('Beginner')?>
					</td>
					<td>
						<input type='radio' name='level_3' value='2'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_3' value='3'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_3' value='4'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_3' value='5'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_3' value='6'/><?php echo lang('Native Speaker')?>
					</td>
					<td>
						<label for="level_3" class="error" style="display:none;">Please choose one.</label>
					</td>												
				</tr>
				<tr>
					<th></th>
					<td>
						<strong id='f_lang4'><?php echo lang('Language or Dialect')?></strong>
					</td>
					<td>
						<input type='radio' name='level_4' value='1'/><?php echo lang('Beginner')?>
					</td>
					<td>
						<input type='radio' name='level_4' value='2'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_4' value='3'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_4' value='4'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_4' value='5'/><?php echo '->';?>
					</td>
					<td>
						<input type='radio' name='level_4' value='6'/><?php echo lang('Native Speaker')?>
					</td>
					<td>
						<label for="level_4" class="error" style="display:none;">Please choose one.</label>
					</td>											
				</tr>
				<tr>
					<th>10</th>
					<td colspan=4>
						<?php echo lang('At what age did you begin learning each language?')?>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<div><strong id='f_lang1_age'><?php echo lang('Language or Dialect')?></strong></div>
						<input type='text' name='f_lang1_age' />
					</td>
					<td>
						<div><strong id='f_lang2_age'><?php echo lang('Language or Dialect')?></strong></div>
						<input type='text' name='f_lang2_age' />
					</td>
					<td>
						<div><strong id='f_lang3_age'><?php echo lang('Language or Dialect')?></strong></div>
						<input type='text' name='f_lang3_age' />
					</td>	
					<td>
						<div><strong id='f_lang4_age'><?php echo lang('Language or Dialect')?></strong></div>
						<input type='text' name='f_lang4_age' />
					</td>			
				</tr>
				<tr>
					<th></th>
					<td>
						<label for="f_lang1_age" class="error" style="display:none;">Please input the age.</label>
					</td>
					<td>
						<label for="f_lang2_age" class="error" style="display:none;">Please input the age.</label>
					</td>
					<td>
						<label for="f_lang3_age" class="error" style="display:none;">Please input the age.</label>
					</td>	
					<td>
						<label for="f_lang4_age" class="error" style="display:none;">Please input the age.</label>
					</td>			
				</tr>
				<tr>
					<th></th>
					 <td colspan=5 style='text-align:center'>
						<button class="" type="submit"><span><?php echo lang('Next Page')?></span></button>
					</td>
				</tr>
			</tbody>
			</table>
		</form>
        
	</div>
</div>
    </div>
</div>
<!--<script type="text/javascript">-->
<!--	//隔行换色-->
<!--	$(".list_table tr::nth-child(even)").addClass('even');-->
<!--	$(".list_table tr").hover(-->
<!--		function () {-->
<!--			$(this).addClass("sel");-->
<!--		},-->
<!--		function () {-->
<!--			$(this).removeClass("sel");-->
<!--		}-->
<!--	);-->
<!--</script>-->

</body>
</html>