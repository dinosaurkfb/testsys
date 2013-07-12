<div class="headbar">
	<div class="position"><span>Test Management</span><span></span><span>Test Type</span><span></span><span>Create New Type</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo site_url('admin/type/add'); ?>"  method="post">
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th> Type Name:</th>
					<td><input class="normal" type="text" maxlength="100" name="name" value="<?php echo set_value('name'); ?>" /><label>*Please enter the type name.</label><?php echo form_error('name'); ?></td>
				</tr>
                <tr>
					<th> Number Of Questions:</th>
					<td><input class="normal" type="text" maxlength="3" name="upper_limit" value="<?php echo set_value('upper_limit'); ?>" /><label>*The upper limit is 999.</label><?php echo form_error('upper_limit'); ?></td>
				</tr>
                <tr>
                <?php 
                  $options = array(
                  'visible'  => 'visible',
                  'invisible' => 'invisible',
                  );
                ?>
					<th> Visibility:</th>
					<td><?php echo form_dropdown('visibility',$options, 'visible');?><label>*visible | invisible.</label><?php //echo form_error('visibility'); ?></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>Create New Type</span></button>
					</td>
				</tr>
			</table>
		</form>
        
	</div>
</div>
