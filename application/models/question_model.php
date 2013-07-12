<?php

class Question_model extends CI_Model
{
	function get_questionlist($type_id)
	{
		$table_name = "question_table".$type_id;
		$this->db->from($table_name);
		$this->db->order_by("question_index","asc");
		$query=$this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function filer_visibility_questionlist($type_id, $visibility)
	{
		$table_name = "question_table".$type_id;
		$this->db->from($table_name);
		$this->db->where('visibility', $visibility);
		$this->db->order_by("question_index","asc");
		$query=$this->db->get();
		//$query = $this->db->query("SELECT * FROM $table_name where visibility = '$visibility'");

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function new_question($type_id, $new_question_insert_data)
	{
		$table_name = "question_table".$type_id;
		
		$this->db->insert($table_name, $new_question_insert_data);
		$id = $this->db->insert_id();

		return $id;
	}
	
	function delete_question($type_id, $id)
	{
		$table_name = "question_table".$type_id;
		$this->db->where('id', $id);
		$ret = $this->db->delete($table_name);
		return $ret;
	}

	function search_question($type_id, $id)
	{
		$table_name = "question_table".$type_id;	
		$query = $this->db->query("SELECT * FROM $table_name where id=$id");
		//$this->firephp->info($query->result());
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function search_question_index($type_id, $question_index)
	{
		$table_name = "question_table".$type_id;	
		$query = $this->db->query("SELECT * FROM $table_name where question_index=$question_index");
		//$this->firephp->info($query->result());
		if($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function delete_question_pic($type_id, $id, $image)
	{
		$table_name = "question_table".$type_id;
		$data[$image] = '';
		$query = $this->search_question($type_id, $id);
		switch($image)
		{
			case 'question_pic':
				$data['question_type'] = $query[0]->question_type & 3;
				break;
			case 'a_pic':
				if($query[0]->b_pic == '' && $query[0]->c_pic == '' && $query[0]->d_pic == '' && $query[0]->e_pic == '' && $query[0]->f_pic == '' && $query[0]->g_pic == '' && $query[0]->h_pic == '')
				{
					$data['question_type'] = $query[0]->question_type & 5;
				}
				break;
			case 'b_pic':
				if($query[0]->a_pic == '' && $query[0]->c_pic == '' && $query[0]->d_pic == '' && $query[0]->e_pic == '' && $query[0]->f_pic == '' && $query[0]->g_pic == '' && $query[0]->h_pic == '')
				{
					$data['question_type'] = $query[0]->question_type & 5;
				}
				break;
			case 'c_pic':
				if($query[0]->b_pic == '' && $query[0]->a_pic == '' && $query[0]->d_pic == '' && $query[0]->e_pic == '' && $query[0]->f_pic == '' && $query[0]->g_pic == '' && $query[0]->h_pic == '')
				{
					$data['question_type'] = $query[0]->question_type & 5;
				}
				break;
			case 'd_pic':
				if($query[0]->b_pic == '' && $query[0]->c_pic == '' && $query[0]->a_pic == '' && $query[0]->e_pic == '' && $query[0]->f_pic == '' && $query[0]->g_pic == '' && $query[0]->h_pic == '')
				{
					$data['question_type'] = $query[0]->question_type & 5;
				}
				break;
			case 'e_pic':
				if($query[0]->b_pic == '' && $query[0]->c_pic == '' && $query[0]->d_pic == '' && $query[0]->a_pic == '' && $query[0]->f_pic == '' && $query[0]->g_pic == '' && $query[0]->h_pic == '')
				{
					$data['question_type'] = $query[0]->question_type & 5;
				}
				break;
			case 'f_pic':
				if($query[0]->b_pic == '' && $query[0]->c_pic == '' && $query[0]->d_pic == '' && $query[0]->e_pic == '' && $query[0]->a_pic == '' && $query[0]->g_pic == '' && $query[0]->h_pic == '')
				{
					$data['question_type'] = $query[0]->question_type & 5;
				}
			case 'g_pic':
				if($query[0]->b_pic == '' && $query[0]->c_pic == '' && $query[0]->d_pic == '' && $query[0]->e_pic == '' && $query[0]->a_pic == '' && $query[0]->f_pic == '' && $query[0]->h_pic == '')
				{
					$data['question_type'] = $query[0]->question_type & 5;
				}
			case 'h_pic':
				if($query[0]->b_pic == '' && $query[0]->c_pic == '' && $query[0]->d_pic == '' && $query[0]->e_pic == '' && $query[0]->a_pic == '' && $query[0]->g_pic == '' && $query[0]->f_pic == '')
				{
					$data['question_type'] = $query[0]->question_type & 5;
				}
				break;
		}
		//$this->firephp->info($data);
		$this->db->where('id', $id);
		$ret = $this->db->update($table_name, $data);
		//$this->firephp->info($ret);
		if($ret == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function modify_question($type_id, $id, $new_question_insert_data)
	{
		$query = $this->search_question($type_id, $id);
		$new_question_insert_data['question_type'] |= $query[0]->question_type & 6;
		$table_name = "question_table".$type_id;
		$this->db->where('id', $id);
		$ret = $this->db->update($table_name, $new_question_insert_data);
		//$this->firephp->info($ret);
		if($ret == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
