<?php

class M_User
{		
	var $id = 1;
	var $name = 'tester';
	var $password = '';
	var $activity = 'active';
}

class User extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->library('form_validation');
		$this->load->model('user_model');
	}
	
	function _remap($method, $params = array())
	{
	    if($this->_check_authority())
	    {
	    	if (method_exists($this, $method))
	    	{
	       		return call_user_func_array(array($this, $method), $params);
	    	}
	    }
	    else
	    {
	       redirect('/');
	    }
	}
	
	function _check_authority()
	{
		$minimum = 3;
		if(!isset($_SESSION['user']) || $_SESSION['user']['is_logged_in'] != true || $_SESSION['user']['m_authority'] < $minimum)
		{
			return false;
		}
		else
		{
			return true;
		}	
	}

	function view($view_page, $param = '')
	{
		$data['admin_right_content'] = $this->load->view($view_page, $param, true);
		$this->load->view('bd_entry', $data);
	}
	
	function index()
	{
		$query = $this->user_model->get_userlist();
		$data['list'] = $query;
		$data['filter'] = 'all';
		$this->view('user_list', $data);
	}
	
	function view_list($filter)
	{
		/*select all from the participant*/
		//$this->firephp->info($filter);
		if($filter == 'all')
		{
			$this->index();
		}
		else
		{
			$query = $this->user_model->filter_user($filter);
			$data['list'] = $query;
			$data['filter'] = $filter;
			$this->view('user_list', $data);
		}
		$query = $this->user_model->get_userlist();
		$data['list'] = $query;
		$this->view('user_list', $data);
	}
	
	function view_edit($id, $renamed = '')
	{
		/*Get the data from the database where id = $id */
		$query = $this->user_model->search_user($id);
		
		$data['user'] = $query;
		$data['renamed'] = $renamed;
		$this->view('user_edit', $data);
	}
	
	function view_add()
	{
		$this->view('user_add', '');
	}
	
	function add()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[participant.name]|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[16]|matches[confirm_password]');
		$this->form_validation->set_rules('right', 'Right', 'required|greater_than[1]|less_than[10]');
		
		if ($this->form_validation->run() == FALSE)
  		{
			$this->view_add();
		}
		else
		{
			$id = $this->user_model->new_user();
			if($id)
			{
				//echo "添加成功！";
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/user'),
					'type' => 'thanks',
					'msg' => "New user added successfully！"
				);
				$this->load->view('jump_page', $data);
			}
			else
			{
				//echo "添加失败！";
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/user'),
					'type' => 'error',
					'msg' => "New user added failed！"
				);
				$this->load->view('jump_page', $data);
			}
		}
	}
	
	function username_check($id)
	{
		$name = $this->input->post('name');
		$query = $this->db->query("SELECT * FROM participant WHERE name = '$name'");
		//$this->firephp->info($query->row()->id);
		//$this->firephp->info($id);
		if($query->num_rows() == 0)
		{
			return TRUE;
		}
		else
		{
			if($query->row()->id == $id)
			{
				//$this->firephp->info("1");
				return TRUE;
			}
			else
			{
				//$this->form_validation->set_message('username_check', 'this user name is exist!');
				return FALSE;
			}
		}
	}
	
	function edit($id)
	{
		if ($this->username_check($id) == FALSE)
		{
			$renamed = "this user name is exist!";
			$this->view_edit($id, $renamed);
			return;
		}
		/*save data into database*/
		if($this->input->post('password') != '' || $this->input->post('confirm_password') != '')
		{
			$this->form_validation->set_rules('password', 'Password', 'min_length[6]|max_length[16]|matches[confirm_password]');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('right', 'Right', 'required|greater_than[1]|less_than[10]');
		
		if ($this->form_validation->run() == FALSE)
  		{
			$this->view_edit($id);
		}
		else
		{
			$query = $this->user_model->modify_user($id);
		
			if($query == TRUE)
			{
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/user'),
					'type' => 'thanks',
					'msg' => "User modified successfully！"
				);
				$this->load->view('jump_page', $data);
			}
			else
			{
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/user/edit'.$id),
					'type' => 'error',
					'msg' => "User modified failed！"
				);
				$this->load->view('jump_page', $data);
			}
		}
	}
	
	function delete($id)
	{
		/*delete data in database*/
		$ret = $this->user_model->delete_user($id);
		
		if($ret == TRUE)
		{
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/user'),
				'type' => 'thanks',
				'msg' => "User deleted successfully！"
			);
			$this->load->view('jump_page', $data);
		}
		else
		{
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/user'),
				'type' => 'error',
				'msg' => "User deleted failed！"
			);
			$this->load->view('jump_page', $data);
		}
	}
}