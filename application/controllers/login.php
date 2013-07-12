<?php


class Login extends CI_Controller
{		
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->model('login_model');
		if(isset($_SESSION['language']))
		{
			$this->lang->load('ui',$_SESSION['language']);
		}
		else
		{
			$this->lang->load('ui','english');
		}
	}
	
	function choose_language($language)
	{
		if($language == 'English')
		{
			$_SESSION['language'] = 'english';
		}
		else if($language == 'Chinese')
		{
			$_SESSION['language'] = 'chinese';
		}
		else
		{
			$_SESSION['language'] = 'english';
		}
		redirect('/login/index/'.$_SESSION['language']);
	}
	
	function index($language = 'english')
	{
		$data['language'] = $language;
		$this->load->view('login.php', $data);
	}
	
	function login_validate()
	{
		$query = $this->login_model->user_login();
		
		if($query != FALSE) // if the user's credentials validated...
		{
			$data = array(
				'name' => $this->input->post('name'),
				'm_authority' => $query,
				'is_logged_in' => true
			);

			$_SESSION['user'] = $data;

			if($_SESSION['user']['m_authority'] > 1)//admin
			{
				redirect('/admin/status/');
			}
			else	//user
			{
				redirect('/users/user/');
			}
		}
		else // incorrect username or password
		{
			$this->index();
		}
	}
	
	function logout()
	{
		//$this->session->sess_destroy();
		//session_destroy();
		if(isset($_SESSION['user']))
		{
			unset($_SESSION['user']);
		}
		if(isset($_SESSION['test']))
		{
			unset($_SESSION['test']);
		}
		if(isset($_SESSION['language']))
		{
			unset($_SESSION['language']);
		}

		$this->index();
	}
}