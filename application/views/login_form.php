<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />

<link rel="stylesheet", href="<?php echo base_url('css/universal_style.css');?>" />
<link rel="stylesheet", href="<?php echo base_url('css/frame_style.css');?>" />


<title>测试</title>

</head>
<body>
<div id="wrapper">
		<div id="main_logo">
			<img class="m_logo" src= "<?php echo site_url('images/moli3.png');?>"alt="crossgate" title="crossgate"/>
		</div>
		<h1>请登录</h1>
		<fieldset>
		<legend>登录</legend>
		<div id="main_form">
			<form id="login_form" name="login_form" action="<?php echo site_url('index.php/login/login_validate/'); ?>" method="post">
		
			<ul>
			
			<li id="username_field" class="field">
			<div class="input">
			<label for="email">邮箱</label>
			<input class="field-text" name="email" value="" id="email" type="text" tabindex="2" />
			</div>
			</li>
			
			<li id="password_field" class="field">
			<div class="input">
			<label for="password">密码</label>
			<input class="field-text" name="password" value="" id="password" type="password" tabindex="2" />
			</div>
			</li>
		
			</ul>
			
			<input class="field-text" name="submit" value="登录" id="submit" type="submit"/>
			</form>
		</div>
</fieldset>
</div>
</body>

</html>