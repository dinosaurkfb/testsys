<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>dilicms2----Powered By DiliCMS</title>
<!-- base href="http://localhost/DiliCMSV2.0.0/admincp/default/" -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="images/admin.css">
<script language="javascript" src="images/jquery.js"></script>
<script language="javascript" src="images/admin.js"></script>
</head>
<body>
<div class="container">
	<div id="header">
		<div class="logo">
			<img src="images/logo.gif">
		</div>
		<p>
           <a href="" target="_blank">Home Page</a>
            <span>Hello! <label class="bold">Your guys!</label>，
            Status:<label class="bold">Guest</label></span>
    	</p>
	</div>
	<div id="">
  <div class="headbar">
	<div class="position"><span>Psychological Test System</span><span>&gt;</span><span>Create New Account</span><span></span></div>
  </div>
<div class="content_box">
	<div style="height: 448px;" class="content form_content">
		<form action="http://localhost/DiliCMSV2.0.0/admin/user/add" method="post">
			<table class="form_table">
				<colgroup><col width="150px">
				<col>
				</colgroup><tbody><tr>
					<th> User Name:</th>
					<td><input class="normal" name="username" id="username" style="width: 150px;" autocomplete="off" type="text"><label>*Please use a Email as your user name.</label></td>
				</tr>
                <tr>
					<th> Password:</th>
					<td><input class="normal" maxlength="16" name="password" type="password"><label>*A 6-16 bits password is a must.</label></td>
				</tr>
                <tr>
					<th> Re-type Password:</th>
					<td><input class="normal" maxlength="16" name="confirm_password" type="password"><label></label></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type="submit"><span>Create My Account</span></button>
					</td>
				</tr>
			</tbody></table>
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


</body></html>