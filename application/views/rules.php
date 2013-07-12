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
<script language="javascript" src="<?php echo base_url('js/admin.js');?>"></script>
</head>

<body>
<div class="container">
	<div id="header">
		<div class="logo">
			<img src="<?php echo base_url('images/logo.gif');?>" />
		</div>
		<p>
			<a class='confirm_logout' href="<?php echo site_url('/login/logout');?>"><?php echo lang('Log out')?></a>
            <span><?php echo lang('Hello')?>! <label class="bold"><?php echo $this->session->userdata('name');?></label>，
            <?php echo lang('Authority')?>:<label class="bold"><?php echo $this->session->userdata('m_authority')>1?lang('admin'):lang('participant');?></label></span>
    	</p>
	</div>
	<div id="admin_right" style='margin:4px 0 0 0px'>
	<div class="headbar">
	<div class="position"><span><?php echo lang('Psychological Test System')?></span><span>&gt;</span><span><?php echo lang('User')?></span><span>&gt;</span><span><?php echo lang('Rules')?></span></div>
  	</div>
	<div class="content_box">
	<div style="height: 448px;" class="content form_content">
		<form action="<?php echo site_url('/users/test/testing');?>" method="post">
			<table class="form_table">
				<colgroup>
				<col width="150px"></col>
				</colgroup>
				
				<tbody>
				<tr>
					<th><strong><?php echo lang('Rules In Test')?></strong></th>
				</tr>			
           		<tr>
					<th>No.1</th>
					<td>
					<?php echo lang('rule1')?>
					</td>
				</tr>
				<tr>
					<th>No.2</th>
					<td>
					<?php echo lang('rule2')?>
					</td>
				</tr>	
				<tr>
					<th>No.3</th>
					<td>
					<?php echo lang('rule3')?>
					</td>
				</tr>	
				<tr>
					<th>No.4</th>
					<td>
					<?php echo lang('rule4')?>
					</td>
				</tr>	
				<tr>
					<th>No.5</th>
					<td>
					<?php echo lang('rule5')?>
					</td>
				</tr>	
				<tr>
					<th>No.6</th>
					<td>
					<?php echo lang('rule6')?>
					</td>
				</tr>
				<tr>
					<th>No.6</th>
					<td>
					<?php echo lang('rule6')?>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<input type="hidden" id="step" name="id" value="<?php echo $type_id;?>" />
						<button class="submit" type="submit"><span><?php echo lang('Start test')?>!</span></button>
					</td>
				</tr>
			</tbody>
			</table>
		</form>
	</div>
	</div>
    </div>
</div>

<script type="text/javascript">
	//隔行换色
	$(".list_table tr::nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);
</script>

</body>
</html>