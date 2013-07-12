<?php
error_reporting(E_ALL);
$path=dirname(__FILE__);

include $path.'/../common/type_def.php';
require_once $path.'/../common/Classes/PHPExcel.php';

class Type extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->library('form_validation');
		$this->load->model('type_model');
		$this->load->model('answer_model');
		$this->load->model('question_model');
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
		$query = $this->type_model->get_typelist();
		$data['list'] = $query;
		$data['filter'] = 'all';
		$this->view('type_list', $data);
	}
	
	function view_list($filter)
	{
		/*select all from the type_table where visibility = filter*/
		//$this->firephp->info($filter);
		if($filter == 'all')
		{
			$this->index();
		}
		else
		{
			$query = $this->type_model->filter_type($filter);
			$data['list'] = $query;
			$data['filter'] = $filter;
			$this->view('type_list', $data);
		}
	}
	
	function view_edit($id, $renamed = '')
	{
		/*Get the data from the database where id = $id */
		$query = $this->type_model->search_type($id);
		
		$data['types'] = $query;
		$data['renamed'] = $renamed;

		$this->view('type_edit', $data);
	}
	
	function view_add()
	{
		$this->view('type_add', '');
	}
	
	function add()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[test_type.name]');
		$this->form_validation->set_rules('upper_limit', 'Upper_limit', 'required|less_than[999]');
		
		if ($this->form_validation->run() == FALSE)
  		{
			$this->view_add();
		}
		else
		{
			$id = $this->type_model->new_type();
			if($id)
			{
				$dir = realpath(APPPATH . '../upload').'\\'.'type'.$id;
		        mkdir($dir, 0777, TRUE);
				$this->type_model->new_type_question_table($id);
				$this->type_model->new_type_answer_table($id);
				//echo "添加成功！";
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/type'),
					'type' => 'thanks',
					'msg' => "New question type added successfully！"
				);
				$this->load->view('jump_page', $data);
			}
			else
			{
				//echo "添加失败！";
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/type'),
					'type' => 'error',
					'msg' => "New question type added  failed！"
				);
				$this->load->view('jump_page', $data);
			}
		}
	}
	
	function username_check($id)
	{
		$name = $this->input->post('name');
		$query = $this->db->query("SELECT * FROM test_type WHERE name = '$name'");
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
			$renamed = "this type name is exist!";
			$this->view_edit($id, $renamed);
			return;
		}

		/*save data into database*/
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('upper_limit', 'Upper_limit', 'required|less_than[999]');
		
		if ($this->form_validation->run() == FALSE)
  		{
			$this->view_edit($id);
		}
		else
		{
			$query = $this->type_model->modify_type($id);
		
			if($query == TRUE)
			{
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/type'),
					'type' => 'thanks',
					'msg' => "Question type modified successfully！"
				);
				$this->load->view('jump_page', $data);
			}
			else
			{
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/type'.$id),
					'type' => 'error',
					'msg' => "Question type modified failed！"
				);
				$this->load->view('jump_page', $data);
			}
		}
	}
	
	function delete($id, $filter = 'all')
	{
		/*delete data in database*/
		$ret = $this->type_model->delete_type($id);
		
		if($ret == TRUE)
		{
			$dir = realpath(APPPATH . '../upload').'\\'.'type'.$id;
			delete_files($dir, TRUE);
			rmdir($dir);
			$this->type_model->delete_type_question_table($id);
			$this->type_model->delete_type_answer_table($id);
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/type'),
				'type' => 'thanks',
				'msg' => "Question type deleted successfully！"
			);
			$this->load->view('jump_page', $data);
		}
		else
		{
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/type'),
				'type' => 'error',
				'msg' => "Question type deleted failed！"
			);
			$this->load->view('jump_page', $data);
		}
	}
	
	function answer_to_arr($testdata)
	{
		$i = 0;
		$rs = preg_split('/\|/',$testdata, -1);
		foreach ($rs as $answer)
		{
			$nvs[$i] = preg_split('/\*/',$answer, -1);
			//$this->firephp->info($nvs[$i]);
			$i++;
		}
		return $nvs;
	}
	
	function export($type_id)
	{
		$query = $this->answer_model->get_answerlist($type_id);
		//$this->firephp->info($query);
		//$this->firephp->info($type_id);
		if($query == false)
		{
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/type'),
				'type' => 'error',
				'msg' => "There are no answer record！"
			);
			$this->load->view('jump_page', $data);
			return;
		}
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		$index_bg = 1;
		$index = 0;
		
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
		
		foreach($query as $answer)
		{
			$bgs = $this->answer_to_arr($answer->survey_info);
			$aws = $this->answer_to_arr($answer->answer_info);
			//$this->firephp->info($bgs);
			//$this->firephp->info($aws);

			if($index == 0)
			{
				$count = count($aws);
				while($this->question_model->search_question_index($type_id, $count) == TRUE)
				{
					$count++;
				}
				foreach($bgs as $bg)
				{
					$index_bg++;
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A'.$index_bg, $bg[0]);
				}
				foreach($aws as $aw)
				{
					if($aw[0] == 'order')
					{
						$index_total = $index_bg + $count;
					}
					else
					{
						$index_total = $index_bg + $aw[0];
					}
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A'.$index_total, $aw[0]);
				}
			}
			$index++;
			$s = $this->answer_model->num_to_str($index);
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($s.'1', $answer->participant_name);
			$index_bg = 1;
			foreach($bgs as $bg)
			{
				$index_bg++;
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($s.$index_bg, $bg[1]);
			}
			foreach($aws as $aw)
			{
				if($aw[0] == 'order')
				{
					$index_total = $index_bg + $count;
				}
				else
				{
					$index_total = $index_bg + $aw[0];
				}
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($s.$index_total, $aw[1]);
			}
		}
		
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Simple');
		
		
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		
		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="01simple.xlsx"');
		header('Cache-Control: max-age=0');
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
	
	function test1()
	{
		redirect('/admin/type/test2');
	}
	
	function test2()
	{
		$this->load->view();
	}
	
	function n2c($num)
	{
		$A = bin2hex('A');
		$c = (int)($num / 26);//0++++
		$r = (int)($num % 26);//0-25
		//$this->firephp->info('$c:'.$c);
		//$this->firephp->info('$r:'.$r);
		$r--;
		
		if($r == 0)
		{
			$c--;
			$r=25;
		}
		 
		if($c == 0)
		{
			$col='';
			//$this->firephp->info('***');
		}
		else
		{
			$col=chr(($A + $c - 1));
			//$this->firephp->info('0x'.bin2hex('A'));
			//$this->firephp->info('0x');
		}
		
		$col=$col.chr('0x'.($A + $r));
		//$this->firephp->info($col);
		
		return $col;
	}
	

	
	function test()
	{				
		$testdata = '1*b|2*d|6*dadads文问问问|7*123123123123123';
		$testdatas[0] = $testdata;
		$testdatas[1] = $testdata;
		$testdatas[2] = $testdata;
		//$nv = $this->answer_to_arr($testdata);
		//$this->firephp->info($nv);

		$index = 0;
		//$A = bin2hex('A');
		


		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


		// Add some data
		//$objPHPExcel->setActiveSheetIndex(0)
		//            ->setCellValue('A1', 'Hello')
		//            ->setCellValue('B2', 'world!')
		//            ->setCellValue('C1', 'Hello')
		//            ->setCellValue('D2', 'world!');
		//$objPHPExcel->setActiveSheetIndex(0);
		//for($i = 1; $i < 11; $i++)
		//{
			//$j = 1;
			//$s = $this->answer_model->num_to_str($i);
			//$objPHPExcel->setActiveSheetIndex(0)
			//			->setCellValue($s.$j, 'participant'.$i);
		//}
		for($i = 2; $i < 11; $i++)
		{
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $i-1);
		}
		foreach($testdatas as $testdata)
		{
			$j = 1;
			$nvs = $this->answer_to_arr($testdata);
			//$this->firephp->info($nvs);
			$index++;
			$s = $this->answer_model->num_to_str($index);
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($s.$j, 'participant'.$index);
			foreach($nvs as $nv)
			{
				$n = $nv[0] + 1;
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($s.$n, $nv[1]);
			}
			
		}
		// Miscellaneous glyphs, UTF-8
		//$objPHPExcel->setActiveSheetIndex(0)
		           // ->setCellValue('A4', 'Miscellaneous glyphs')
		           // ->setCellValue('A5', '文启源  王谢');
		
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Simple');
		
		
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		
		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="01simple.xlsx"');
		header('Cache-Control: max-age=0');
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
		$this->load->view('test');
	}
}