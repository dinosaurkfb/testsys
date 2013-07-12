<?php
class Config extends CI_Controller 
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
		$this->view('config_pwd');
	}
	
	function modify_pwd()
	{
		if($this->input->post('password') == '' && $this->input->post('confirm_password') == '')
		{
			$this->index();
			return;
		}
		$this->form_validation->set_rules('password', 'Password', 'min_length[6]|max_length[16]|matches[confirm_password]');
		//$this->form_validation->set_rules('confirm_password', 'Confirm_password', 'matches[password]');
		
		if ($this->form_validation->run() == FALSE)
  		{
			$this->index();
			return;
		}
		$user_name = $_SESSION['user']['name'];
		$user_info = $this->user_model->search_user_from_name($user_name);
		$ret = $this->user_model->modify_user_pwd($user_info->id);
			if($ret == TRUE)
			{
				$data = array(
					'jump' => true,
					'url' => site_url('/login'),
					'type' => 'thanks',
					'msg' => "Password modified successfully！Please log in again!"
				);
				$this->load->view('jump_page', $data);
			}
			else
			{
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/config'),
					'type' => 'error',
					'msg' => "Password modified failed！"
				);
				$this->load->view('jump_page', $data);
			}
	}
}