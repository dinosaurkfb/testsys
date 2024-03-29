<div class="headbar">
	<div class="position"><span>Authority Management</span><span>></span><span>Participants</span><span>></span><span>Add Participants</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo backend_url('role/add'); ?>"  method="post">
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th> 用户组名称：</th>
					<td><?php $this->form->show('name','input',''); ?><label>*3-20位用户组标识</label><?php echo form_error('name'); ?></td>
				</tr>
                <tr>
					<th> 允许的权限：</th>
					<td>
                    	<ul class="attr_list">
							<?php foreach($rights as $key=>$v): ?>
                            <li><label class="attr"><input type="checkbox" value="<?php echo $key; ?>" name="right[]"><?php echo $v; ?></label></li>
							<?php endforeach; ?>
                        </ul>
                    </td>
				</tr>
                <tr>
					<th> 允许的内容模型：</th>
					<td>
                    	<ul class="attr_list">
							<?php foreach($models as $key=>$v): ?>
                            <li><label class="attr"><input type="checkbox" value="<?php echo $key; ?>" name="model[]"><?php echo $v; ?></label></li>
							<?php endforeach; ?>
                        </ul>
                    </td>
				</tr>
                <tr>
					<th> 允许的分类模型：</th>
					<td>
                    	<ul class="attr_list">
							<?php foreach($category_models as $key=>$v): ?>
                            <li><label class="attr"><input type="checkbox" value="<?php echo $key; ?>" name="category_model[]"><?php echo $v; ?></label></li>
							<?php endforeach; ?>
                        </ul>
                    </td>
				</tr>
                <tr>
					<th> 允许的插件：</th>
					<td>
                    	<ul class="attr_list">
							<?php foreach($plugins as $key=>$v): ?>
                            <li><label class="attr"><input type="checkbox" value="<?php echo $key; ?>" name="plugin[]"><?php echo $v; ?></label></li>
							<?php endforeach; ?>
                        </ul>
                    </td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>添加用户组</span></button>
					</td>
				</tr>
			</table>
		</form>
        
	</div>
</div>