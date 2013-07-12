<div class="headbar">
	<div class="position"><span>Test Management</span><span>></span><span>Test Type</span><span>></span><span>Edit Type</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo site_url('admin/type/edit').'/'.$types[0]->id;;?>" method="post">
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th> Type Name:</th>
					<td><input class="normal" type="text" maxlength="100" name="name" value="<?php echo $types[0]->name; ?>"/><label>*Please enter the type name.</label><?php echo form_error('name'); ?><?php echo $renamed;?></td>
				</tr>
                <tr>
					<th> Number Of Questions:</th>
					<td><input class="normal" type="text" maxlength="100" name="upper_limit" value="<?php echo $types[0]->upper_limit; ?>"/><label>*The upper limit is 999.</label><?php echo form_error('upper_limit'); ?></td>
				</tr>
      
                <tr>
	                <?php 
	                  $options = array(
	                  'visible'  => 'visible',
	                  'invisible' => 'invisible',
	                  );
	                ?>                
					<th> visibility: </th>
					<td><?php echo form_dropdown('visibility',$options, $types[0]->visibility);?><label>*active | inactive.</label><?php echo form_error('visibility'); ?></td>
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
