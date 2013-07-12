<?php

$path=dirname(__FILE__);

include $path.'/../common/type_def.php';

class Test extends CI_Controller 
{	
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->library('pagination');
		$this->load->model('type_model');
		$this->load->model('question_model');
		$this->load->model('answer_model');
		if(isset($_SESSION['language']))
		{
			$this->lang->load('ui',$_SESSION['language']);
			$this->lang->load('bg',$_SESSION['language']);
		}
		else
		{
			$this->lang->load('ui','english');
			$this->lang->load('bg','english');
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
	
	function _no_cache()
	{
		$this->output->set_header("HTTP/1.0 200 OK");
		$this->output->set_header("HTTP/1.1 200 OK");
		$this->output->set_header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
		$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
	}
	
	function _view($view_page, $param = '')
	{
		$this->_no_cache();
		$this->load->view($view_page, $param);
	}

	function _bg_invest()
	{
		$test = $_SESSION['test'];
		$step = $test['step'];
		
		switch($step)
		{
			case 1:
			{
				$view = 'biography/bg1_1';
				$data['step'] = $step;
				$this->_view($view, $data);
				break;
			}	
			case 2:
			{
				$view = 'biography/bg1_2';
				$data['step'] = $step;
				$this->_view($view, $data);
				break;
			}	
				
			default:
			{
				$this->error();
				break;
			}
		}
	}
	
	function _test_paper()
	{
		$test = $_SESSION['test'];
		$type = $test['type'];
		
		$questions = $this->question_model->get_questionlist($type->id);
		$answers = array();
		
		//$this->firephp->info($questions);
		
		$count = count($questions);
		
		$count = $count < $type->upper_limit? $count : $type->upper_limit;
		
		if($count > 1)
		{
			//get random questions in this testtype
			$questions_r = array_rand($questions, $count);
			
			//$this->firephp->info($questions_r);
			
			array_flip($questions_r);
			$questions = array_intersect_key($questions, $questions_r);
			shuffle($questions);
		}

		//$test = $_SESSION['test'];
		$test['questions'] = $questions;

		$_SESSION['test'] = $test;
	}
	
	function _test_page()
	{
		$test = $_SESSION['test'];
		$type = $test['type'];
		$index = $test['step'] - 2;
		$data['NO'] = $index;
		
		if(($index - 1) == count($test['questions']))
		{
			$this->_save();
			return;
		}
		
		$data['question'] = $test['questions'][$index - 1];
		//$this->firephp->info($data['question']);
		$question_id = $data['question']->question_index;
		$question_type = $data['question']->question_type;
		
		$data['step'] = $test['step'];
		
		switch($question_type)
		{
			//essay question
			case 0:
			case 4:
				$this->_view('/test_pages/test_page_0', $data);
				break;
			//choice question
			case 1:	//pure text choice question
			case 5:
				$this->_view('/test_pages/test_page_1', $data);
				break;
			case 2:
			case 3:
			case 6:
			case 7:
				$count = 0;
				if($data['question']->a_pic != '')
					$count++;
				if($data['question']->b_pic != '')
					$count++;
				if($data['question']->c_pic != '')
					$count++;
				if($data['question']->d_pic != '')
					$count++;
				if($data['question']->e_pic != '')
					$count++;
				if($data['question']->f_pic != '')
					$count++;
				if($data['question']->g_pic != '')
					$count++;
				if($data['question']->h_pic != '')
					$count++;
				if($count <= 6)
					$this->_view('/test_pages/test_page_2', $data);
				else
					$this->_view('/test_pages/test_page_3', $data);
				break;
			default:
				$this->_view('/test_pages/test_page_1', $data);
				break;
		}
	}
	
	function _save()
	{
		$test = $_SESSION['test'];
		$questions = $test['questions'];
		$order = '';
		foreach($questions as $question)
		{
			$order = $order.$question->question_index.',';
		}
		$data['participant_name'] = $_SESSION['user']['name'];
		//$this->firephp->info($test['bg_rs']);
		$data['survey_info'] = $this->answer_model->array_to_string($test['bg_rs']);
		$data['answer_info'] = $this->answer_model->array_to_string($test['answers']);
		$data['answer_info'] = $data['answer_info'].'|order*'.$order;
		//$this->firephp->info($test['answers']);
		$type_id = $test['type']->id;
		$this->answer_model->new_answer($type_id, $data);
		unset($_SESSION['test']);
		$this->_thanks();
	}
	
	function _thanks()
	{
		$data['jump'] = true;
		$data['url'] = site_url('/login/logout');
		$data['type'] = 'thanks';
		$data['msg'] = 'Test is finished. Thank you!';
		$this->_view('jump_page', $data);
	}
	
	function bg_submit($page_step)
	{
		$test = $_SESSION['test'];
		$step = $test['step'];
		//$this->firephp->info('bg_submit');
		
		if($page_step < $step)
		{
			//expired
			//$this->firephp->info('#expired');
			redirect('/users/test/testing/');
			//$this->firephp->info('#after_redirect');
			return;
		}
			
		switch($step)
		{
			case 1:
			{
				$defect = '';
				
				$bg_rs = $test['bg_rs'];
				
				//$defect_obs = $_POST['defect'];
				for($i = 0; $i < 4; $i++)
				{
					if($this->input->post('defect'.$i) != '')
						$defect = $defect.$this->input->post('defect'.$i)."/";
				}

				$bg_rs['age'] = $this->input->post('age');
				$bg_rs['occupation'] = $this->input->post('occupation');
				$bg_rs['sex'] = $this->input->post('sex');
				$bg_rs['edu_level'] = $this->input->post('edu_level');
				$bg_rs['dominant_hand'] = $this->input->post('dominant_hand');
				$bg_rs['defect'] = $defect;
				$bg_rs["reason"] = $this->input->post('reason');
				//$this->firephp->info('*********'.$this->input->post('age'));
				$test['bg_rs'] = $bg_rs;
				$test['step']++;
				$_SESSION['test'] = $test;
				//$this->firephp->info('redirect1');


				redirect('/users/test/testing/');
				break;
			}
			case 2:		
			{	
				$bg_rs = $test['bg_rs'];
				
				$bg_rs['native_lang'] = $this->input->post('native_lang');
				$bg_rs['f_lang_1'] = $this->input->post('f_lang1');
				$bg_rs['f_lang_2'] = $this->input->post('f_lang2');
				$bg_rs['f_lang_3'] = $this->input->post('f_lang3');
				$bg_rs['f_lang_4'] = $this->input->post('f_lang4');
				$bg_rs['level_1'] = $this->input->post('level_1');
				$bg_rs['level_2'] = $this->input->post('level_2');
				$bg_rs['level_3'] = $this->input->post('level_3');
				$bg_rs['level_4'] = $this->input->post('level_4');
				$bg_rs['f_lang_age1'] = $this->input->post('f_lang1_age');
				$bg_rs['f_lang_age2'] = $this->input->post('f_lang2_age');
				$bg_rs['f_lang_age3'] = $this->input->post('f_lang3_age');
				$bg_rs['f_lang_age4'] = $this->input->post('f_lang4_age');
				
				$test['bg_rs'] = $bg_rs;
				$test['step']++;
				$_SESSION['test'] = $test;
				//$this->firephp->info('redirect2');
				redirect('/users/test/testing/');
				break;
			}
			
			default:
				//$this->firephp->info('error!');
				show_error('error step!');
				break;
		}
	}
	
	function next_step($page_step)
	{
		$test = $_SESSION['test'];
		if($page_step < $test['step'])
		{
			redirect('/users/test/testing/');
		}
		else
		{
			$type = $test['type'];
			$test['step']++;
			$_SESSION['test'] = $test;
			redirect('/users/test/testing/');
		}
	}
	
	function change_answer()
	{
		$question_id = $this->input->post('question_id');
		$answers = $this->input->post('answer');
		$page_step = $this->input->post('step');
		$ans_info = '';
		//$answer = urldecode($answer);
		//$this->firephp->info($question_id);
		//$this->firephp->info($answers);
		//$this->firephp->info($page_step);
		
		if(is_array($answers))
		{
			$i = 0;
			foreach($answers as $answer)
			{
				if($i == 0)
				{
					$ans_info = $answer;
				}
				else
				{
					$ans_info .= ','.$answer;
				}
				$i++;
			}
		}
		else
		{
			$ans_info = $answers;
		}

		$test = $_SESSION['test'];
		
		//$this->firephp->info($test['step']);
		
		if($page_step < $test['step'])
		{
			//$this->firephp->info('#expired');
			echo 'expired';
		}
		else
		{
			//$this->firephp->info($question_id);
			$test['answers'][$question_id] = $ans_info;
			$_SESSION['test'] = $test;
			//$this->firephp->info($_SESSION['test']['answers']);
			echo 'ok';
		}
	}
	
	function testing()
	{
		$type_id = $this->input->post('id');
		
		if(!empty($type_id))
		{
			$types = $this->type_model->search_type($type_id);

			if(!isset($_SESSION['test']))
			{
				$test['type'] = $types[0];
				$test['step'] = 1;
				$test['bg_rs'] = array();
				$test['questions'] = array();
				$test['answers'] = array();
				$_SESSION['test'] = $test;
				$this->_test_paper();
				$this->_bg_invest();
			}
			else
			{
				$test = $_SESSION['test'];
				if($types==$test['type'])
				{
					if($test['step'] >= 1 && $test['step'] <= 2)
					{		
						$this->_bg_invest();
					}
					else
					{
						$this->_test_page();
					}
				}
				else
				{	
					//$this->session->unset_userdata('test');
					unset($_SESSION['test']);
					
					$test['type'] = $types[0];
					$test['step'] = 1;
					$test['bg_rs'] = array();
					$test['questions'] = array();
					$test['answers'] = array();
					$_SESSION['test'] = $test;
					$this->_test_paper();
					$this->_bg_invest();
				}
			}
		}
		else
		{
			$test = $_SESSION['test'];
			if($test['step'] >= 1 && $test['step'] <= 2)
			{
				$this->_bg_invest();
			}
			else
			{
				$this->_test_page();
			}
		}
	}
	
	function tester()
	{
		$data['url'] = '';
		$data['msg'] = 'tettstestetste';
		$this->_view('jump_page', $data);
	}
	
	function newtest()
	{
		//$this->firephp->info('newtest');
		//echo '111';
	}
	
	function index()
	{
		$this->testing();
	}
}