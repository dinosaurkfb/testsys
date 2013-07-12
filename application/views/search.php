<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />


<title>魔力账号管理</title>

<link rel="stylesheet", href="<?php echo base_url('css/universal_style.css');?>" />
<link rel="stylesheet", href="<?php echo base_url('css/frame_style.css');?>" />

<script type="text/javascript" src="<?php echo base_url('js/jquery-1.7.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/search_area.js');?>"></script>

</head>

<body>

<div id="wrapper">
		<div id="main_logo">
			<img class="m_logo" src= "<?php echo site_url('images/moli1.png');?>"alt="crossgate" title="crossgate"/>
		</div>
		<div id="main_search">
			<form action="<?php echo base_url('index.php/count/count_search/'); ?>" method="post">
			<a href="<?php echo base_url('index.php/count/count_all/'); ?>">全部浏览</a>
				<a href="<?php echo base_url('index.php/count/count_new/'); ?>">添加账户</a>
				<input type="text" name="keyword" id="keyword" />	
				<input type="submit" id="keyword" value="魔力搜索" />					
			</form>	
			<table>
				<tr class="head">
				<td class="td1" bgcolor="#ffff99">账号</td>
				<td class="td2" bgcolor="#ffff99">密码</td>
				<td class="td3" bgcolor="#ffff99">角色A</td>
				<td class="td4" bgcolor="#ffff99">角色A的财产</td>
				<td class="td5" bgcolor="#ffff99">角色B</td>
				<td class="td6" bgcolor="#ffff99">角色B的财产</td>
				<td class="td7" bgcolor="#ffff99">操作</td>
				</tr>
			<?php if(isset($counts)){?>
			<?php foreach($counts as $count):?>
				<tr>
				<td class="td1"><?php echo $count->user;?></td>
				<td class="td2"><?php echo $count->password;?></td>
				<td class="td3"><?php echo $count->role_a;?></td>
				<td class="td4"><?php echo $count->item_a;?></td>
				<td class="td5"><?php echo $count->role_b;?></td>
				<td class="td6"><?php echo $count->item_b;?></td>
				<td class="td7"><a href="<?php echo base_url("index.php/count/count_update/$count->count_id"); ?>">修改</a>
					<a id = "del" href="<?php echo base_url("index.php/count/count_delete/$count->count_id"); ?>">删除</a>
				</td>
				</tr>
			<?php endforeach;?>
			<?php }?>
			</table>
		</div>

		<div id="wrapper_inner" class="clear">
		</div>
</div>

</body>

</html>