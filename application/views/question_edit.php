<div class="headbar">
	<div class="position"><span>Test Management</span><span>></span><span>Test Type</span><span>></span><span>Edit Question</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo site_url('admin/question/edit').'/'.$type_id.'/'.$question->id;?>"  method="post" enctype="multipart/form-data">
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th> Type:</th>
					<td>
						<input class="normal" type="text" name="type_id" value="<?php echo $type_id;?>" readonly="readonly" disabled="disabled" />
					</td>
				</tr>
				<tr>
					<th> ID:</th>
					<td><input class="normal" type="text" maxlength="1000" name="question_index" value="<?php echo $question->question_index;?>" /><label>*Please enter the question id.</label><?php echo form_error('question_index'); ?><?php echo $renamed;?></td>
				</tr>
				<tr>
					<th> Instruction:</th>
					<td><input class="normal" type="text" maxlength="1000" name="instruction" value="<?php echo $question->instruction;?>"/></td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<?php echo $question->question_pic==''?'':'<td class="td_q"><img src="'.base_url($question->question_pic).'"/></td>';?>
				</tr>
				<tr>
					<th> Question:</th>
					<td><input class="normal" type="text" maxlength="1000" name="question" value="<?php echo $question->question;?>" /><label>*Please enter the question.</label><?php echo form_error('question'); ?></td>
					<td>
					<input class="" type="file" name="question_pic" />
					<a class="confirm_delete" href="<?php echo site_url('admin/question/delete_pic').'/'.$type_id.'/'.$question->id.'/'.'question_pic';?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<?php echo $question->a_pic==''?'':'<td class="td_q"><img src="'.base_url($question->a_pic).'"/></td>';?>
				</tr>
                <tr>
					<th> Answer A:</th>
					
					<td><input class="normal" type="text" maxlength="500" name="a" value="<?php echo $question->a;?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('a'); ?></td>
					<td><input class="" type="file" name="a_pic" />
					<a class="confirm_delete" href="<?php echo site_url('admin/question/delete_pic').'/'.$type_id.'/'.$question->id.'/'.'a_pic';?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<?php echo $question->b_pic==''?'':'<td class="td_q"><img src="'.base_url($question->b_pic).'"/></td>';?>
				</tr>
        	 	<tr>
					<th> Answer B:</th>
					<td><input class="normal" type="text" maxlength="500" name="b" value="<?php echo $question->b;?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('b'); ?></td>
					<td>
					<input class="" type="file" name="b_pic" />
					<a class="confirm_delete" href="<?php echo site_url('admin/question/delete_pic').'/'.$type_id.'/'.$question->id.'/'.'b_pic';?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<?php echo $question->c_pic==''?'':'<td class="td_q"><img src="'.base_url($question->c_pic).'"/></td>';?>
				</tr>
				 <tr>
					<th> Answer C:</th>
					<td><input class="normal" type="text" maxlength="500" name="c" value="<?php echo $question->c;?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('c'); ?></td>
					<td>
					<input class="" type="file" name="c_pic" />
					<a class="confirm_delete" href="<?php echo site_url('admin/question/delete_pic').'/'.$type_id.'/'.$question->id.'/'.'c_pic';?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<?php echo $question->d_pic==''?'':'<td class="td_q"><img src="'.base_url($question->d_pic).'"/></td>';?>
				</tr>
				 <tr>
					<th> Answer D:</th>
					<td><input class="normal" type="text" maxlength="500" name="d" value="<?php echo $question->d;?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('d'); ?></td>
					<td>
					<input class="" type="file" name="d_pic" />
					<a class="confirm_delete" href="<?php echo site_url('admin/question/delete_pic').'/'.$type_id.'/'.$question->id.'/'.'d_pic';?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<?php echo $question->e_pic==''?'':'<td class="td_q"><img src="'.base_url($question->e_pic).'"/></td>';?>
				</tr>
				 <tr>
					<th> Answer E:</th>
					<td><input class="normal" type="text" maxlength="500" name="e" value="<?php echo $question->e;?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('e'); ?></td>
					<td>
					<input class="" type="file" name="e_pic" />
					<a class="confirm_delete" href="<?php echo site_url('admin/question/delete_pic').'/'.$type_id.'/'.$question->id.'/'.'e_pic';?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>		
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<?php echo $question->f_pic==''?'':'<td class="td_q"><img src="'.base_url($question->f_pic).'"/></td>';?>
				</tr>
				 <tr>
					<th> Answer F:</th>
					<td><input class="normal" type="text" maxlength="500" name="f" value="<?php echo $question->f;?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('f'); ?></td>
					<td><input class="" type="file" name="f_pic" />
					<a class="confirm_delete" href="<?php echo site_url('admin/question/delete_pic').'/'.$type_id.'/'.$question->id.'/'.'f_pic';?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>	
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<?php echo $question->g_pic==''?'':'<td class="td_q"><img src="'.base_url($question->g_pic).'"/></td>';?>
				</tr>
				 <tr>
					<th> Answer G:</th>
					<td><input class="normal" type="text" maxlength="500" name="g" value="<?php echo $question->g;?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('g'); ?></td>
					<td><input class="" type="file" name="g_pic" />
					<a class="confirm_delete" href="<?php echo site_url('admin/question/delete_pic').'/'.$type_id.'/'.$question->id.'/'.'g_pic';?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>	
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<?php echo $question->h_pic==''?'':'<td class="td_q"><img src="'.base_url($question->h_pic).'"/></td>';?>
				</tr>
				 <tr>
					<th> Answer H:</th>
					<td><input class="normal" type="text" maxlength="500" name="h" value="<?php echo $question->h;?>"/><label>*The upper limit is 100 words.</label><?php echo form_error('h'); ?></td>
					<td><input class="" type="file" name="h_pic" />
					<a class="confirm_delete" href="<?php echo site_url('admin/question/delete_pic').'/'.$type_id.'/'.$question->id.'/'.'h_pic';?>"><img class="operator" src="<?php echo base_url('images/icon_del.gif');?>" alt="Delete" title="Delete"></a>	
					</td>
				</tr>
			
            	<tr>
                <?php 
                  $options = array(
                  'visible'  => 'visible',
                  'invisible' => 'invisible',
                  );
                ?>
					<th> visibility:</th>
					<td><?php echo form_dropdown('visibility',$options, 'visible');?><label>*visible | invisible.</label><?php //echo form_error('visibility'); ?></td>
				</tr>
				
				<tr>
					<th></th>
					<td>
						<button class="submit" type="submit"><span>Save Question</span></button>
					</td>
				</tr>
			</table>
		</form>
        
	</div>
</div>
