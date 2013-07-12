<div class="headbar">
	<div class="position"><span>Authority Management</span><span>></span><span>Participants</span><span>></span><span>Account List</span></div>
	<div class="operating">
		<a class="hack_ie" href="<?php echo site_url('admin/user/view/user_add');?>"><button class="operating_btn" type="button"><span class="addition">Create New Account</span></button></a>
    <div class="search f_r">
		<form name="serachuser" action="" method="get">
			<select id="filter" class="normal" style="width:auto" name="filter" onchange="location='<?php echo site_url('admin/user/view_list');?>/'+this.value;">
				<option value="all" <?php echo $filter=='all' ? 'selected="selected"' : ''?>>ALL</option>
				<option value="active" <?php echo $filter=='active' ? 'selected="selected"' : ''?>>Active</option>
				<option value="inactive" <?php echo $filter=='inactive' ? 'selected="selected"' : ''?>>Not Active</option>
			</select>
		</form>	
	</div>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<col />
			<thead>
				<tr>
					<th></th>
                	<th>ID</th>
					<th>Name</th>
					<th>Right</th>
                    <th>Activity</th>
                    <th>Operations</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<div class="content">
		<table id="list_table" class="list_table">
			<col width="40px" />
			<col />
			<tbody>
			
            <?php foreach($list as $v) : ?>
            	<tr>
                	<td></td>
                	<td><?php echo $v->id; ?></td>
                	<td><?php echo $v->name; ?></td>
                	<td><?php echo $v->right; ?></td>
                    <td><?php echo $v->activity; ?></td>
                    
                    <td>
                    	<a href="<?php echo site_url('admin/user/view_edit').'/'.$v->id;?>"><img class="operator" src="<?php echo base_url('images/icon_edit.gif');?>" alt="Edit" title="Edit"></a>
                        <a class="confirm_delete" href="<?php echo site_url('admin/user/delete').'/'.$v->id;?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
			</tbody>
		</table>
</div>
<script language="javascript">
	$('a.confirm_delete').click(function(){
		return confirm('Are you sure to delete this account？');	
	});
</script>