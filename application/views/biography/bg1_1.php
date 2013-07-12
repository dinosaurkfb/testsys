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
		<form action="<?php echo site_url('users/test/bg_submit/'.$step);?>" method="post" id='bg_form1'>
			<table class="form_table" id='bg_table'>
				<colgroup>
				<col width="150px"></col>
				</colgroup>
				<tbody>
				<tr>
					<th>1</th>
					<td colspan="3">
						<?php echo lang('Age')?>
						<input type='text' name='age' id='age' style="margin-left:40px"></input>
					</td>
				</tr>

				<tr>
					<th>2</th>
					<td colspan="3">
						<input type='radio' name='sex' value='male' /><?php echo lang('Male')?>
						<input type='radio' name='sex' value='female'/><?php echo lang('Female')?>
						<label for="sex" class="error" style="display:none;">Please choose one.</label>
					</td>
				</tr>
           		<tr>
					<th>3</th>
					<td colspan="2">
						<?php echo lang('How much formal education have you had?')?>
						<label for="edu_level" class="error" style="display:none;">Please choose one.</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<div><input type='radio' name='edu_level' value='Less than high school'/><?php echo lang('Less than high school')?></div>
						<div><input type='radio' name='edu_level' value='High school'/><?php echo lang('High school')?></div>
						<div><input type='radio' name='edu_level' value='Professional training'/><?php echo lang('Professional training')?></div>
					</td>
					<td>
						<div><input type='radio' name='edu_level' value='Some university'/><?php echo lang('Some university')?></div>
						<div><input type='radio' name='edu_level' value='Some master'/><?php echo lang('Some master')?></div>
						<div><input type='radio' name='edu_level' value='Some PhD'/><?php echo lang('Some PhD')?></div>	
					</td>
					<td>
						<div><input type='radio' name='edu_level' value='University'/><?php echo lang('University')?></div>
						<div><input type='radio' name='edu_level' value='Master'/><?php echo lang('Master')?></div>
						<div><input type='radio' name='edu_level' value='PhD'/><?php echo lang('PhD')?></div>
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>4</th>
					<td colspan="2">
						<?php echo lang('Which is your dominant hand?')?>
						<label for="dominant_hand" class="error" style="display:none;">Please choose one.</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<input type='radio' name='dominant_hand' value='right'/><?php echo lang('Right hand')?>
					</td>
					<td>
						<input type='radio' name='dominant_hand' value='left'/><?php echo lang('Left hand')?>
					</td>
				</tr>
				<tr>
					<th>5</th>
					<td colspan="2">
						<?php echo lang('Have you had any of the following?')?>
						<label for="defect" class="error" style="display:none;">Please choose one.</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<div><input type='checkbox' name='defect0' value='vision problems'/><?php echo lang('Vision problems')?></div>	
					</td>
					<td>
						<div><input type='checkbox' name='defect1' value='language disability'/><?php echo lang('Language disability')?></div>
					</td>
					<td>
						<div><input type='checkbox' name='defect2' value='hearing impairment'/><?php echo lang('Hearing impairment')?></div>
					</td>
					<td>
						<div><input type='checkbox' name='defect3' value='learning disability'/><?php echo lang('Learning disability')?></div>
					</td>
				</tr>
				<tr>
					<th>6</th>
					<td>
						<?php echo lang('If so, please explan:')?>
					</td>
					<td>
						<textarea name="reason" rows="2"></textarea>
					</td>
				</tr>
				<tr>
					<th></th>
					 <td colspan=2 style='text-align:right;'>
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
</body>
</html>