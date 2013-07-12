<div class="headbar">
	<div class="position"><span>Authority Management</span><span>></span><span>Participants</span><span>></span><span>Edit Account</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo site_url('admin/user/edit').'/'.$user[0]->id;?>"  method="post">
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th> User Name:</th>
					<td><input class="normal" type="text" maxlength="16" name="name" value="<?php echo $user[0]->name?>"/><label>*Please use a Email as your user name.</label><?php echo form_error('name'); ?><?php echo $renamed;?></td>
				</tr>
                <tr>
					<th> Password:</th>
					<td><input class="normal" type="password" maxlength="16" name="password" /><label>*A 6-16 bits password is a must.If you don't want to change the password,leave it with blank.</label><?php echo form_error('password'); ?></td>
				</tr>
                <tr>
					<th> Re-type Password:</th>
					<td><input class="normal" type="password" maxlength="16" name="confirm_password" /><label>*If you don't want to change the password,leave it with blank.</label><?php //echo form_error('confirm_password'); ?></td>
				</tr>

				<tr>
					<th> Right:</th>
					<td><input class="normal" type="text" maxlength="16" name="right" value="<?php echo $user[0]->right?>"/><label>*A number 1-10.</label><?php echo form_error('right'); ?></td>
				</tr>
				
                <tr>
            	    <?php
	                  $options = array(
	                  'active'  => 'active',
	                  'inactive' => 'inactive',
	                  );
	                ?>  
					<th> Activity: </th>
					<td><?php echo form_dropdown('activity',$options,$user[0]->activity); ?><label>*active | inactive.</label><?php //echo form_error('role'); ?></td>
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
