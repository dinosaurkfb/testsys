<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel=stylesheet href="<?php echo base_url('css/jp.css');?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
<?php if($jump){?>
<meta http-equiv="refresh" content="2;url=<?php echo $url;?>" />
<?php }?>

<title>$type</title>

</head>
<?php 
switch($type)
{
	case 'ok':
		$img = base_url('images/Big Smile.png');
		break;
		
	case 'warning':
		$img = base_url('images/Surprise.png');
		break;
		
	case 'error':
		$img = base_url('images/Sad.png');
		break;
		
	case 'thanks':
		$img = base_url('images/Biggest Smile.png');
		break;
		
	default:
		$img = base_url('images/Smile.png');
		break;
}

;?>
<body>
<div class="container clear">
<img class="icon" src="<?php echo $img?>" />
<div class="msg"><?php echo $msg?></div>
</div>

</body>

</html>