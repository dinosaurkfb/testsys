<?php

$path=dirname(__FILE__);

include $path.'/../common/type_def.php';

class User extends CI_Controller 
{	
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('type_model');
		$language = $this->session->userdata('language');
		if(isset($_SESSION['language']))
		{
			$this->lang->load('ui',$_SESSION['language']);
		}
		else
		{
			$this->lang->load('ui','english');
		}
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
		$minimum = 1;

		if(!isset($_SESSION['user']) || $_SESSION['user']['is_logged_in'] != true || $_SESSION['user']['m_authority'] < $minimum)
		{
			return false;
		}
		else
		{
			return true;
		}	
	}
	
	function _view($view_page, $param = '')
	{
		$this->load->view($view_page, $param);
	}
	
	function index()
	{
		$visibility = 'visible';
		$data['types'] = $this->type_model->filter_type($visibility);
		$this->_view('type_choose', $data);
	}
	
	function type_choose()
	{
		$visibility = 'visible';
		$data['types'] = $this->type_model->filter_type($visibility);
		$this->_view('type_choose', $data);
	}
	
	function rules()
	{
		$type_id = $this->input->post('id');
		$data['type_id'] =  $type_id;
		$this->_view('rules',$data);
	}
	
	function test()
	{
		$this->_view('2.php');
	}
}