<?php

class User_model extends CI_Model
{
	function get_userlist()
	{		
		$query = $this->db->query("SELECT * FROM participant");
		//$this->firephp->info($query->result());
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function filter_user($activity)
	{
		$query = $this->db->query("SELECT * FROM participant where activity='$activity'");
		//$this->firephp->info($query->result());
		return $query->result();
	}
	
	function new_user()
	{
		$new_user_insert_data = array(
			'name' => $this->input->post('name'),
			'password' => md5($this->input->post('password')),
			'right' => $this->input->post('right'),
			'activity' => $this->input->post('activity')
		);
		
		$insert = $this->db->insert('participant', $new_user_insert_data);
		$id = $this->db->insert_id();
		return $id;
	}
	
	function search_user($id)
	{		
		$query = $this->db->query("SELECT * FROM participant where id=$id");
		//$this->firephp->info($query->result());
		return $query->result();
	}
	
	function search_user_from_name($name)
	{		
		$query = $this->db->query("SELECT * FROM participant where name='$name'");
		//$this->firephp->info($query->result());
		if ($query->num_rows() > 0)
		{
			return $query->row(); 
		}
		else
		{
			return false;
		}
		
	}
	
	function modify_user_pwd($id)
	{
		$data['password'] = md5($this->input->post('password'));
		$this->db->where('id', $id);
		$query = $this->db->update('participant', $data);
		//$query = $this->db->query("UPDATE participant SET name = '$name', password = '$password', right = $right, activity = '$activity' WHERE  id=$id");
		
		if($query == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function modify_user($id)
	{
		if($this->input->post('password') != '')
		{
			$data = array(
				'name' => $this->input->post('name'),
				'password' => md5($this->input->post('password')),
				'right' => $this->input->post('right'),
				'activity' => $this->input->post('activity')
            );
		}
		else
		{
			$data = array(
				'name' => $this->input->post('name'),
				'right' => $this->input->post('right'),
				'activity' => $this->input->post('activity')
            );
		}

		$this->db->where('id', $id);
		$query = $this->db->update('participant', $data);
		//$this->firephp->info($query);
		//$query = $this->db->query("UPDATE participant SET name = '$name', password = '$password', right = $right, activity = '$activity' WHERE  id=$id");
		
		if($query == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
		
	function delete_user($id)
	{
		$query = $this->db->query("DELETE FROM participant WHERE id=$id");
		//$this->firephp->info($query);
		return $query;
	}

}