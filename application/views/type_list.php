<div class="headbar">
	<div class="position"><span>Test Management</span><span></span><span>Test Type</span><span>></span><span>Type List</span></div>
	<div class="operating">
		<a class="hack_ie" href="<?php echo site_url('admin/type/view_add');?>"><button class="operating_btn" type="button"><span class="addition">Create New Type</span></button></a>
     <div class="search f_r">
		<form name="searchtype" action="" method="get">
			<select id="filter" class="normal" style="width:auto" name="filter" onchange="location='<?php echo site_url('admin/type/view_list');?>/'+this.value;">
				<option value="all" <?php echo $filter=='all' ? 'selected="selected"' : ''?>>all</option>
				<option value="visible" <?php echo $filter=='visible' ? 'selected="selected"' : ''?>>visible</option>
				<option value="invisible" <?php echo $filter=='invisible' ? 'selected="selected"' : ''?>>invisible</option>
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
					<th>Upper Limit</th>
					<th>Visibility</th>
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
                    <td><?php echo $v->upper_limit;?></td>
                    <td><?php echo $v->visibility; ?></td>
                    <td>
                    	<a href="<?php echo site_url('admin/type/view_edit').'/'.$v->id;?>"><img class="operator" src="<?php echo base_url('images/icon_edit.gif');?>" alt="Edit" title="Edit"></a>
                        <a class="confirm_delete" href="<?php echo site_url('admin/type/delete').'/'.$v->id;?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>
                        <a href="<?php echo site_url('admin/type/export').'/'.$v->id;?>"><img class="operator" src="<?php echo base_url('images/icon_export.gif');?>" alt="Export" title="Export"></a>
                    </td>
                </tr>
            <?php endforeach;?>
			</tbody>
		</table>
</div>

<script language="javascript">
	$('a.confirm_delete').click(function(eve){

		eve.preventDefault();
		
		var href = '';
		
		if($(eve.target).parent().hasClass('confirm_delete'))
		{
			href = $(eve.target).parent().attr('href');
		}
		else
		{
			href = $(eve.target).attr('href');
		}
		
		var ret = confirm('Are you sure to delete this test type?');	

		if(ret == true)
		{
			href += '/';
			href += $('#filter option:selected').val();
			window.location.href = href;		
		}
	});
</script>