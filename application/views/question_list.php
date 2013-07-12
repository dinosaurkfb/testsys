<div class="headbar">
	<div class="position"><span>Test Management</span><span>></span><span>Question Bank</span><span>></span><span>Question List</span></div>
	<div class="operating">
		<a class="hack_ie" href="<?php echo site_url('admin/question/view_add');?>"><button class="operating_btn" type="button"><span class="addition">Create New Question</span></button></a>
    <div class="search f_r">
		<form name="serachuser" action="" method="get">
			<select  id="filter" class="normal" style="width:auto" name="role" onchange="location='<?php echo site_url('/admin/question/view_list');?>/'+this.value;">
				<?php foreach($types as $type) { ?>
                <option <?php echo $type->id == $type_id ? 'selected="selected"' : '' ?> value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
                <?php }?>
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
					<th colspan="8">Question</th>
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
			<?php if($list != FALSE) { ?>
            <?php foreach($list as $v) : ?>
            	<tr>
                	<td></td>
                	<td><?php echo $v->question_index; ?></td>
                	<td colspan="8"><?php echo $v->question; ?></td>
                	
                    <td>
                    	<a href="<?php echo site_url('admin/question/view_edit/'.$type_id.'/'.$v->id); ?>"><img class="operator" src="<?php echo base_url('images/icon_edit.gif');?>" alt="Edit" title="Edit"></a>
                        <a class="confirm_delete" href="<?php echo site_url('admin/question/delete/'.$type_id.'/'.$v->id); ?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>
                    </td>
                </tr>
            <?php endforeach;?>
            <?php }?>
			</tbody>
		</table>
</div>
<script language="javascript">
	$('a.confirm_delete').click(function(){
		return confirm('Are you sure to delete this test type？');	
	});
</script>