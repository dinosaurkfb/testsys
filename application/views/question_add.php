<div class="headbar">
	<div class="position"><span>Test Management</span><span>></span><span>Question Bank</span><span>></span><span>Add New Question</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
	<?php echo $error;?>
		<form action="<?php echo site_url('admin/question/add'); ?>"  method="post" enctype="multipart/form-data">
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th> ID:</th>
					<td><input class="normal" type="text" maxlength="1000" name="question_index" value="<?php echo $table == '' ? '': $table['question_index'];?>"/><label>*Please enter the question id.</label><?php echo form_error('question_index'); ?></td>
				</tr>
				<tr>
					<th> Instruction:</th>
					<td><input class="normal" type="text" maxlength="1000" name="instruction"  value="<?php echo $table == '' ? '': $table['instruction'];?>"/></td>
				</tr>
				<tr>
					<th> Question:</th>
					<td><input class="normal" type="text" maxlength="1000" name="question"  value="<?php echo $table == '' ? '': $table['question'];?>"/><label>*Please enter the question.</label><?php echo form_error('question'); ?></td>
					<td><input class="" type="file" name="question_pic" value='question_pic' /><label>*Please choose the picture.</label></td>
				</tr>
                <tr>
					<th> Answer A:</th>
					<td><input class="normal" type="text" maxlength="500" name="a"  value="<?php echo $table == '' ? '': $table['a'];?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('a'); ?></td>
					<td><input class="" type="file" name="a_pic" /><label>*Please choose the picture.</label></td>
				</tr>
        	 	<tr>
					<th> Answer B:</th>
					<td><input class="normal" type="text" maxlength="500" name="b"  value="<?php echo $table == '' ? '': $table['b'];?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('b'); ?></td>
					<td><input class="" type="file" name="b_pic" /><label>*Please choose the picture.</label></td>
				</tr>
				 <tr>
					<th> Answer C:</th>
					<td><input class="normal" type="text" maxlength="500" name="c"  value="<?php echo $table == '' ? '': $table['c'];?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('c'); ?></td>
					<td><input class="" type="file" name="c_pic" /><label>*Please choose the picture.</label></td>
				</tr>
				 <tr>
					<th> Answer D:</th>
					<td><input class="normal" type="text" maxlength="500" name="d"  value="<?php echo $table == '' ? '': $table['d'];?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('d'); ?></td>
					<td><input class="" type="file" name="d_pic" /><label>*Please choose the picture.</label></td>
				</tr>
				 <tr>
					<th> Answer E:</th>
					<td><input class="normal" type="text" maxlength="500" name="e"  value="<?php echo $table == '' ? '': $table['e'];?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('e'); ?></td>
					<td><input class="" type="file" name="e_pic" /><label>*Please choose the picture.</label></td>
				</tr>
				 <tr>
					<th> Answer F:</th>
					<td><input class="normal" type="text" maxlength="500" name="f"  value="<?php echo $table == '' ? '': $table['f'];?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('f'); ?></td>
					<td><input class="" type="file" name="f_pic" /><label>*Please choose the picture.</label></td>
				</tr>
				<tr>
					<th> Answer G:</th>
					<td><input class="normal" type="text" maxlength="500" name="g"  value="<?php echo $table == '' ? '': $table['g'];?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('g'); ?></td>
					<td><input class="" type="file" name="g_pic" /><label>*Please choose the picture.</label></td>
				</tr>
				<tr>
					<th> Answer H:</th>
					<td><input class="normal" type="text" maxlength="500" name="h"  value="<?php echo $table == '' ? '': $table['h'];?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('h'); ?></td>
					<td><input class="" type="file" name="h_pic" /><label>*Please choose the picture.</label></td>
				</tr>
				<tr>
					<th> Type:</th>
					
					<td><select name="type">
					<?php foreach($types as $type) {?>
					<option value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
					<?php } ?>
					</select>
					<label>*choose the test type of this question.</label><?php //echo form_error('visibility'); ?></td>
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
				<th>Copy</th>
					<td><input type='checkbox' name='copy' value='copy'/></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type="submit"><span>Add New Question</span></button>
					</td>
				</tr>
			</table>
		</form>
        
	</div>
</div>
