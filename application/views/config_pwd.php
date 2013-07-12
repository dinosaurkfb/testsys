<div class="headbar">
	<div class="position"><span>Configuration</span><span>></span><span>Change Password</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo site_url('admin/config/modify_pwd'); ?>"  method="post">
			<table class="form_table">
				<col width="150px" />
				<col />
					<th> Password:</th>
					<td><input class="normal" type="password" maxlength="16" name="password" /><label>*A 6-16 bits password is a must.If you don't want to change the password,leave it with blank.</label><?php echo form_error('password'); ?></td>
				</tr>
                <tr>
					<th> Re-type Password:</th>
					<td><input class="normal" type="password" maxlength="16" name="confirm_password" /><label>*If you don't want to change the password,leave it with blank.</label><?php //echo form_error('confirm_password'); ?></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>Save Changes</span></button>
					</td>
				</tr>
			</table>
		</form>
        
	</div>
</div>
