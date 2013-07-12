<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />


<title>魔力账号管理</title>

<link rel="stylesheet", href="<?php echo site_url('css/universal_style.css');?>" />
<link rel="stylesheet", href="<?php echo site_url('css/frame_style.css');?>" />

</head>

<body>

<div id="wrapper">
		<div id="main_logo">
			<img class="m_logo" src= "<?php echo site_url('images/moli2.jpg');?>"alt="crossgate" title="crossgate"/>
		</div>
		<div id="main_form">
			<form action="<?php echo site_url('index.php/count/count_new2/'); ?>" method="post">
			
				账号
				<input type="text" value="" name="user" id="user"/><br/>
				
				角色A	
				<input type="text" value="" name="role_a" id="role_a" /><br/>
				角色A的财产
				<textarea name="item_a" id="item_a"></textarea><br/>
				角色B
				<input type="text" value="" name="role_b" id="role_b" /><br/>
				角色B的财产
				<textarea name="item_b" id="item_b"></textarea><br/>
				<input type="submit" id="keyword" value="保存资料" />
			</form>	
		</div>
</div>
		<div id="wrapper_inner" class="clear">
		</div>

</body>

</html>