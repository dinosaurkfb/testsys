<?php
class Status extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		session_start();
	}

	function view($view_page)
	{
		$data['admin_right_content'] = $this->load->view($view_page, '', true);
		$this->load->view('bd_entry', $data);
	}
	
	function index()
	{
		//$this->firephp->info('#3');
		$data['admin_right_content'] = $this->load->view('status', '', true);
		$this->load->view('bd_entry', $data);
	}
	
}