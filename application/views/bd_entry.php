<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title></title>
<meta content="text/html; charset=utf-8" http-equiv=Content-Type />
<link rel=stylesheet href="<?php echo base_url('images/admin.css');?>" />
<script language=javascript src="<?php echo base_url('js/jquery.js');?>"></script>
<script language=javascript src="<?php echo base_url('js/admin.js');?>"></script>
<script language=javascript src="<?php echo base_url('js/common.js');?>"></script>
<meta name=GENERATOR content="MSHTML 8.00.7600.17006">
</head>

<body>
<div class=container>
<div id=header>
	<div class=logo><img src="<?php echo base_url('images/logo.gif');?>"> </div>
	<div id=menu></div>
	<p>
	<a href="<?php echo site_url('/login/logout');?>">logout</a>
	<a href="<?php echo site_url('/users/user/type_choose/')?>" target=>home</a>
	<span>hello! <label class=bold><?php echo $_SESSION['user']['name'];?></label>,
	 authority:<label class=bold><?php echo $_SESSION['user']['m_authority']>1?'admin':'participant';?></label></span> 
	</p>
</div>
<div id=info_bar><span class=nav_sec></span></div>
<div id=admin_left>
	<ul class=submenu>
	  <li><span>status</span> 
	  <ul name="menu">
	    <li><a href="<?php echo site_url('admin/status/view/status');?>">Database</a></li></ul>
	   </li>
	   
	  <li><span>Configuration</span> 
	  <ul name="menu">
	    <li><a href="<?php echo site_url('admin/config');?>">Change Password</a></li></ul>
	   </li>
	  <li><span>Test Management</span>
	  <ul name="menu">
	    <li><a href="<?php echo site_url('admin/type');?>">Test Type</a></li>
	    <li><a href="<?php echo site_url('admin/question');?>">Question Bank</a></li></ul></li>
	    	
	  <li><span>Authority Management</span> 
	  <ul name="menu">
	    <li><a href="<?php echo site_url('admin/user');?>">User Account</a></li></ul></li></ul>
</div>

<div id=admin_right>
<?php echo $admin_right_content;?>
</div>

<div id=separator></div>

</div>

<script type=text/javascript>
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
</body></html>
