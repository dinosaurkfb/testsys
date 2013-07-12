<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />


<title>题型管理</title>

<link rel="stylesheet", href="<?php echo base_url('css/universal_style.css');?>" />
<link rel="stylesheet", href="<?php echo base_url('css/frame_style.css');?>" />

</head>

<body>

<div id="wrapper">
		<div id="main_logo">
			<img class="m_logo" src= "<?php echo base_url('images/moli2.jpg');?>"alt="crossgate" title="crossgate"/>
		</div>
		<div id="main_form">
			<form action="<?php echo base_url("index.php/type/type_update2/").'/'.$type[0]->id; ?>" method="post">
				试题类型
				<input type="text" value="<?php echo $type[0]->type_name;?>"  name="type_name" id="type_name" />	<br/>
				
				是否可见
				<?php $visible = $type[0]->visible;?>
				<input type="radio" name="visible" value = "可见" checked="<?php if($type[0]->visible == "可见") echo 'checked';?>"/>可见<br/>  
				<input type="radio" name="visible" value = "不可见" checked="<?php if($type[0]->visible == "不可见") echo 'checked';?>" />不可见<br/>

				<input type="submit" id="keyword" value="修改" />
			</form>	
		</div>
</div>
		<div id="wrapper_inner" class="clear">
</div>

</body>

</html>