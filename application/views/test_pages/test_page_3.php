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
<link rel="stylesheet" href="<?php echo base_url('css/test_page_style.css');?>" />
<script language="javascript" src="<?php echo base_url('js/jquery.js');?>"></script>
<script language="javascript" src="<?php echo base_url('js/jquery.validate.min.js');?>"></script>
<script language="javascript" src="<?php echo base_url('js/admin.js');?>"></script>
<script language="javascript" src="<?php echo base_url('js/test_validate.js');?>"></script>

<script language="javascript">
	js_funcRegisterComm('<?php echo site_url('users/test/next_step/'.$step);?>');
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
	<!--<div class="position"><span><?php echo lang('Psychological Test System')?></span><span>&gt;</span><span><?php echo lang('Test')?></span><span></span></div>-->
  	</div>
<div class="content_box">
	<div style="height: 448px;" class="content form_content">
		<form action="<?php echo site_url('/users/test/change_answer');?>" method="post" id="test_form">
			<table class="form_table">
				<colgroup>
				<col width="150px"></col>
				</colgroup>
				
				<tbody>
				<tr>
					<th>Q<?php echo "  ".$NO;?></th>
					<td colspan=6>
						<?php echo $question->instruction;?>
					</td>				
				</tr>
				<tr>
					<th></th>
					<td id="td_question" colspan="6">
					<input type="hidden" name="question_id" id="question_id" value="<?php echo $question->question_index;?>"/>
						<?php echo $question->question;?>
						<?php if($_SESSION['user']['m_authority']>1) {?>
						<label><strong>(</strong><strong><?php echo $question->question_index;?></strong><strong>)</strong></label>
						<?php }?>
					</td>
				</tr>
				<tr>
					<th></th>
				<td>
					<?php echo $question->question_pic==''?'':'<td class="td_q"><img src="'.base_url($question->question_pic).'"/></td>';?>
				</td>
				</tr>
				<tr>
					<th></th>
					<?php echo $question->a_pic==''?'':'<td class="td_q"><img src="'.base_url($question->a_pic).'"/></td>';?>
					<?php echo $question->b_pic==''?'':'<td class="td_q"><img src="'.base_url($question->b_pic).'"/></td>';?>
					<?php echo $question->c_pic==''?'':'<td class="td_q"><img src="'.base_url($question->c_pic).'"/></td>';?>
					<?php echo $question->d_pic==''?'':'<td class="td_q"><img src="'.base_url($question->d_pic).'"/></td>';?>
				</tr>
				<tr>
					<th></th>
					<?php echo ($question->a&&$question->a_pic=='')?'':'<td class="td_q"><input type="radio" name="answer" value="a" '
					.'/>'.($question->a==''?'a':$question->a.'</td>');?>
					<?php echo ($question->b==''&&$question->b_pic=='')?'':'<td class="td_q"><input type="radio" name="answer" value="b" '
					.'/>'.($question->b==''?'b':$question->b.'</td>');?>
					<?php echo ($question->c==''&&$question->c_pic=='')?'':'<td class="td_q"><input type="radio" name="answer" value="c" '
					.'/>'.($question->c==''?'c':$question->c.'</td>');?>
					<?php echo($question->d==''&&$question->d_pic=='')?'':'<td class="td_q"><input type="radio" name="answer" value="d" '
					.'/>'.($question->d==''?'d':$question->d.'</td>');?>
				</tr>
				<tr>
					<th></th>
					<?php echo $question->e_pic==''?'':'<td class="td_q"><img src="'.base_url($question->e_pic).'"/></td>';?>
					<?php echo $question->f_pic==''?'':'<td class="td_q"><img src="'.base_url($question->f_pic).'"/></td>';?>
					<?php echo $question->g_pic==''?'':'<td class="td_q"><img src="'.base_url($question->g_pic).'"/></td>';?>
					<?php echo $question->h_pic==''?'':'<td class="td_q"><img src="'.base_url($question->h_pic).'"/></td>';?>			
				</tr>
				<tr>
					<th></th>
					<?php echo ($question->e==''&&$question->e_pic=='')?'':'<td class="td_q"><input type="radio" name="answer" value="e" '
					.'/>'.($question->e==''?'e':$question->e.'</td>');?>
					<?php echo ($question->f==''&&$question->f_pic=='')?'':'<td class="td_q"><input type="radio" name="answer" value="f" '
					.'/>'.($question->f==''?'f':$question->f.'</td>');?>
					<?php echo($question->g==''&&$question->g_pic=='')?'':'<td class="td_q"><input type="radio" name="answer" value="g" '
					.'/>'.($question->g==''?'g':$question->g.'</td>');?>
					<?php echo ($question->h==''&&$question->h_pic=='')?'':'<td class="td_q"><input type="radio" name="answer" value="h" '
					.'/>'.($question->h==''?'h':$question->h.'</td>');?>
				</tr>

				<tr>
					<th></th>
					<td>
						<label for="answer" class="error" style="display:none;">Please choose one answer.</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td colspan="3" style='text-align:center'>
						<input type="hidden" name="step" id="step" value="<?php echo $step;?>"/>
					<?php
						echo 
						'<button id="next" class="" type="button"><span>'.lang('Next Page').'</span></button>'
					?>
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