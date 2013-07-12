<div class="headbar">
	<div class="position"><span>Authority Management</span><span>></span><span>Participants</span><span>></span><span>Create New Account</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo site_url('admin/user/add'); ?>"  method="post">
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th> User Name:</th>
					<td><input class="normal" type="text" maxlength="16" name="name" /><label>*Please use a  5-10 bits name as user name.</label><?php echo form_error('name'); ?></td>
				</tr>
                <tr>
					<th> Password:</th>
					<td><input class="normal" type="password" maxlength="16" name="password" /><label>*A 6-16 bits password is a must.</label><?php echo form_error('password'); ?></td>
				</tr>
                <tr>
					<th> Re-type Password:</th>
					<td><input class="normal" type="password" maxlength="16" name="confirm_password" /><label></label><?php //echo form_error('confirm_password'); ?></td>
				</tr>
				
				<tr>
					<th> Right:</th>
					<td><input class="normal" type="text" maxlength="16" name="right" /><label>*A number 1-10.</label><?php echo form_error('right'); ?></td>
				</tr>
         
            	<tr>
            	    <?php
	                  $options = array(
	                  'active'  => 'active',
	                  'inactive' => 'inactive',
	                  );
	                ?>                
					<th> Activity：</th>
					<td><?php echo form_dropdown('activity',$options, 'active');?><label>*active | inactive.</label><?php // echo form_error('Activity：'); ?></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>Create New Account </span></button>
					</td>
				</tr>
			</table>
		</form>
        
	</div>
</div>
