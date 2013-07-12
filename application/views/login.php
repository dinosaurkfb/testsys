<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<!-- base href="http://localhost/DiliCMSV2.0.0/admincp/default/" -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<link rel="stylesheet" href="<?php echo base_url('images/admin.css');?>" />
</head>
<body id="login">
	<div class="container">
		<div id="header">
			<div class="logo">
				<img src="<?php echo base_url('images/logo.gif');?>" />
				<p>
           		<a href="" target="_blank"><?php echo lang('Home Page')?></a>
	            <select id="filter" class="normal" style="width:auto" name="language" onchange="location='<?php echo site_url('/login/choose_language')?>/'+this.value;">
					<option value="English" <?php echo $language == 'english' ? 'selected = "selected"' : ''?> >English</option>
					<option value="Chinese" <?php echo $language == 'chinese' ? 'selected = "selected"' : ''?> >中文</option>
				</select>
    			</p>
			</div>
		</div>
		<div id="wrapper" class="clearfix">
			<div class="login_box">
				<div class="login_title"><?php echo lang('Sign In')?></div>
				<div class="login_cont">
					<b></b>
         			 <form action="<?php echo site_url('login/login_validate'); ?>" method="post">
						<table class="form_table">
							<colgroup>
							<col width="90px">
							</col>
							</colgroup>
							<tbody>
							<tr>
								<th><?php echo lang('User Name')?></th><td><input class="normal" name="name" alt="Please enter your user name." type="text" /></td>
							</tr>
							<tr>
								<th><?php echo lang('Password')?></th><td><input class="normal" name="password" alt="Please enter your password." type="password" /></td>
							</tr>
							<tr>
								<th></th>
								<td>
								<input class="submit" value="<?php echo lang('Sign In')?>" type="submit" />
								<input class="submit" value="<?php echo lang('Cancel')?>" type="reset" />
								</td>
							</tr>
						</tbody></table>
					</form>
                    
				</div>
			</div>
		</div>
		<div id="footer">Powered by <a href=""></a> <b>Wen Qiyuan Wang Xue</b> Copyright © 2011
        </div>
	</div>


</body></html>