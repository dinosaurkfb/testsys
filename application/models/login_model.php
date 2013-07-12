<?php

class Login_model extends CI_Model
{
	function user_login()
	{		
		$this->db->where('name', $this->input->post('name'));
		$this->db->where('password', md5($this->input->post('password')));

		$query = $this->db->get('participant');
		
		//$this->firephp->info($query);
		
		if($query->num_rows() == 1)
		{
			$rs = $query->result();
			return $rs[0]->right;
		}
		else
		{
			//$this->firephp->info('error!');
			return FALSE;
		}
	}
}