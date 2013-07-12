<?php

class Count_model extends CI_Model
{
	function get_countlist()
	{		
		$query = $this->db->query("SELECT * FROM count");
		return $query->result();
	}

	function search_count()
	{
		$keyword = '%'.$this->input->post('keyword').'%';
		$query = $this->db->query("SELECT * FROM count where role_a like '$keyword' or role_b like '$keyword' or item_a like '$keyword' or item_b like '$keyword' or user like '$keyword'");
		//$this->firephp->info($query->result());
		return $query->result();
	}
	
	function validate_username()
	{
		$username = $this->input->post('user');
		$query = $this->db->query("SELECT * FROM count WHERE user = '$username'");
		if($query->num_rows() == 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function new_count()
	{
		$new_count_insert_data = array(
			'user' => $this->input->post('user'),
			'password' => "保密",
			'role_a' => $this->input->post('role_a'),
			'role_b' => $this->input->post('role_b'),
			'item_a' => $this->input->post('item_a'),
			'item_b' => $this->input->post('item_b')
		);
		
		$insert = $this->db->insert('count', $new_count_insert_data);
		return $insert;
	}

	function search_countid($count_id)
	{		
		$query = $this->db->query("SELECT * FROM count where count_id=$count_id");
		//$this->firephp->info($query->result());
		return $query->result();
	}
	
	function modify_count($count_id)
	{
		$role_a = $this->input->post('role_a');
		$role_b = $this->input->post('role_b');
		$item_a = $this->input->post('item_a');
		$item_b = $this->input->post('item_b');
		//$this->firephp->info($this->input->post('role_a'));
		$query = $this->db->query("UPDATE count SET role_a = '$role_a',
			role_b = '$role_b',
			item_a = '$item_a',
			item_b = '$item_b'
			WHERE  count_id=$count_id");
		//$this->firephp->info($query);
		if($query == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
		
	function delete_count($count_id)
	{
		$query = $this->db->query("DELETE FROM count WHERE count_id=$count_id");
		//$this->firephp->info($query);
		return $query;
	}
}