<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url('images/admin.css');?>" />
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
		   <a href="<?php echo site_url('/login/logout');?>"><?php echo lang('Log out')?></a>
           <a href="" target="_blank"><?php echo lang('Home Page')?></a>
           <span><?php echo lang('Hello')?>! <label class="bold"><?php echo $this->session->userdata('name');?></label>，
            <?php echo lang('Authority')?>: <label class="bold"><?php echo $this->session->userdata('m_authority')>1?lang('admin'):lang('participant');?></label></span>
    </p>
	</div>
	<div id="admin_right" style='margin:4px 0 0 0px'>
  <div class="headbar">
	<div class="position"><span><?php echo lang('Psychological Test System')?></span><span>&gt;</span><span><?php echo lang('Choose Test Type')?></span><span></span></div>
  </div>
<div class="content_box">
	<div style="height: 448px;" class="content form_content">
		<form action="<?php echo site_url('users/user/rules');?>" method="post">
			<table class="form_table">
				<colgroup>
				<col width="150px"></col>
				</colgroup>
				<tbody>
				<tr>
					<th> <?php echo lang('Test Type')?>:</th>
					<td>
						<select id="filter" class="normal" style="width:200px" name="id">
						  <?php foreach($types as $type) : ?>
							<option value="<?php echo $type->id?>"><?php echo $type->name?></option>
						   <?php endforeach;?>
						</select>
						<label>*<?php echo lang('Please choose a test type')?></label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type="submit"><span><?php echo lang('Next Page')?>!</span></button>
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