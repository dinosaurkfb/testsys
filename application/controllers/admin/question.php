<?php


class Question extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('type_model');
		$this->load->model('question_model');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('image_lib');
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
		if($query != FALSE)
		{
			$data['types'] = $query;
			$data['type_id'] = $query[0]->id;
			$data['list'] = $this->question_model->get_questionlist($query[0]->id);
			//$this->firephp->info($query);
			$this->view('question_list', $data);
		}
		else
		{
			$data['list'] = FALSE;
			$this->view('question_list', $data);
		}

	}
	
	function view_list($type_id = '', $visiability='all')
	{
		//$this->firephp->info($type_id);
		if(empty($type_id))
		{
			$this->index();
		}
		else
		{
			$data['list'] = $this->question_model->get_questionlist($type_id);
			$data['types'] = $this->type_model->get_typelist();
			$data['type_id'] = $type_id;
			$this->view('question_list', $data);
		}
	}
	
	function view_add($error = '', $table = '')
	{
		
		$data['types'] = $this->type_model->get_typelist();
		$data['error'] = $error;
		$data['table'] = $table;

		//$data['types'] = $types = array('test1', 'test2', 'test3');
		$this->view('question_add', $data);
	}
	
	function view_edit($type_id, $question_id, $renamed = '', $error = '')
	{
		/*Get the data from the database where id = $id */
		$query = $this->question_model->search_question($type_id, $question_id);
		
		$data['question'] = $query[0];
		$data['type_id'] = $type_id;
		$data['renamed'] = $renamed;
		$data['error'] = $error;
		$this->view('question_edit', $data);
	}
	
	function delete_dir($dir)
	{
		if(file_exists($dir) == TRUE)
		{
			delete_files($dir, TRUE);
			return rmdir($dir);
		}
		else
		{
			return FALSE;
		}
	} 

	function upload_pic($image, $type_id, $id, $dir)
	{
		$data = array("dir" =>'', "upload_erro" => TRUE, "error"=>'');
		if(!is_uploaded_file($_FILES[$image]['tmp_name']))
		{
			//$this->firephp->info("1");
			return $data;
		}
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'file_name' => $image,
			'upload_path' => $dir,
			'overwrite' => TRUE,
			'max_size' => 2000
		);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload($image))
		{
			$data['error'] = $this->upload->display_errors();
			//$this->firephp->info($data['error']);
			$data['upload_erro'] = FALSE;
			return $data;
		}
		else
		{
			$pic_info = $this->upload->data();
			$data['dir'] = $dir.$pic_info['file_name'];
			return $data;
			/*
			$pic_info = $this->upload->data();
			$this->firephp->info($pic_info);
			if($image == 'question_pic')
			{
				$config = array(
					'source_image' => $pic_info['full_path'],
					'new_image' => $pic_info['full_path'],
					'maintain_ration' => true,
					'width' => 150,
					'height' => 150
				);
			}
			else
			{
				$config = array(
					'source_image' => $pic_info['full_path'],
					'new_image' => $pic_info['full_path'],
					'maintain_ration' => true,
					'width' => 80,
					'height' => 80
				);
			}
			
			$this->image_lib->initialize($config);
			if (!$this->image_lib->resize())
			{
				$data['error'] = $this->upload->display_errors();
				$this->firephp->info($data['error']);
				$data['upload_erro'] = FALSE;
				return $data;
			}
			else
			{
				$data['dir'] = $dir.$pic_info['file_name'];
				return $data;
			}
			*/
		}
	}
	
	function check_input()
	{
		if($this->input->post('a') != '')
		{
			return 1;	
		}
		if($this->input->post('b') != '')
		{
			return 1;	
		}
		if($this->input->post('c') != '')
		{
			return 1;	
		}
		if($this->input->post('d') != '')
		{
			return 1;	
		}
		if($this->input->post('e') != '')
		{
			return 1;	
		}
		if($this->input->post('f') != '')
		{
			return 1;	
		}
		if($this->input->post('g') != '')
		{
			return 1;	
		}
		if($this->input->post('h') != '')
		{
			return 1;	
		}
		return 0;
	}
	
	function questionid_check()
	{
		$question_index = $this->input->post('question_index');
		$table_name = "question_table".$this->input->post('type');
		$query = $this->db->query("SELECT * FROM $table_name WHERE question_index = $question_index");
		if($query->num_rows() == 0)
		{
			return TRUE;
		}
		$this->form_validation->set_message('questionid_check', 'this question id is exist!');
		return FALSE;
	}
	
	function add()
	{
		$this->form_validation->set_rules('question_index', 'Question_index', 'trim|required|is_natural_no_zero|callback_questionid_check');
		//$this->form_validation->set_rules('question', 'Question', 'trim|required');
		$this->form_validation->set_rules('a', 'A', 'max_length[100]');
		$this->form_validation->set_rules('b', 'B', 'max_length[100]');
		$this->form_validation->set_rules('c', 'C', 'max_length[100]');
		$this->form_validation->set_rules('d', 'D', 'max_length[100]');
		$this->form_validation->set_rules('e', 'E', 'max_length[100]');
		$this->form_validation->set_rules('f', 'F', 'max_length[100]');
		$this->form_validation->set_rules('g', 'G', 'max_length[100]');
		$this->form_validation->set_rules('h', 'H', 'max_length[100]');
		
		if ($this->form_validation->run() == FALSE)
  		{
			$this->view_add();
			return;
		}

		$new_question_insert_data = array(
			'question_index' => $this->input->post('question_index'),
			'question_type' => 0,
			'instruction' => $this->input->post('instruction'),
			'question' => $this->input->post('question'),
			'a' => $this->input->post('a'),
			'b' => $this->input->post('b'),
			'c' => $this->input->post('c'),
			'd' => $this->input->post('d'),
			'e' => $this->input->post('e'),
			'f' => $this->input->post('f'),
			'g' => $this->input->post('g'),
			'h' => $this->input->post('h'),
			'visibility' => $this->input->post('visibility')
		);
		
		$type_id = $this->input->post('type');
		$id = $this->question_model->new_question($type_id, $new_question_insert_data);
		$dir = 'upload/'.'type'.$type_id.'/'.'question'.$id.'/';

		if(file_exists($dir) == false)
		{
			if(!mkdir($dir, 0777, TRUE))
			{
				$error = 'fail to create upload dir!';
				$this->question_model->delete_question($type_id, $id);
				$this->view_add($error);
				return;
			}
		}
		else
		{
			delete_files($dir, TRUE);
		}
		$data = $this->upload_pic("question_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->question_model->delete_question($type_id, $id);
			delete_dir($dir);
			$this->view_add($data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['question_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 4;
		}
		$data = $this->upload_pic("a_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->question_model->delete_question($type_id, $id);
			delete_dir($dir);
			$this->view_add($data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['a_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("b_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->question_model->delete_question($type_id, $id);
			delete_dir($dir);
			$this->view_add($data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['b_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("c_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->question_model->delete_question($type_id, $id);
			delete_dir($dir);
			$this->view_add($data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['c_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("d_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->question_model->delete_question($type_id, $id);
			delete_dir($dir);
			$this->view_add($data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['d_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("e_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->question_model->delete_question($type_id, $id);
			delete_dir($dir);
			$this->view_add($data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['e_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("f_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->question_model->delete_question($type_id, $id);
			delete_dir($dir);
			$this->view_add($data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['f_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("g_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->question_model->delete_question($type_id, $id);
			delete_dir($dir);
			$this->view_add($data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['g_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("h_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->question_model->delete_question($type_id, $id);
			delete_dir($dir);
			$this->view_add($data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['h_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}

		//$this->firephp->info($new_question_insert_data);

		$new_question_insert_data['question_type'] |= $this->check_input();

		//$this->firephp->info($new_question_insert_data);
		$ret = $this->question_model->modify_question($type_id, $id, $new_question_insert_data);
		if($ret)
		{
			//echo "添加成功！";
			if($this->input->post('copy') == '')
			{
				$data = array(
					'jump' => true,
					'url' => site_url('/admin/question'),
					'type' => 'thanks',
					'msg' => "New question added successfully！"
				);
	
				$this->load->view('jump_page', $data);
			}
			else
			{
				$table = array(
					'question_index' => $new_question_insert_data['question_index'],
					'instruction' => $new_question_insert_data['instruction'],
					'question' => $new_question_insert_data['question'],
					'a' => $new_question_insert_data['a'],
					'b' => $new_question_insert_data['b'],
					'c' => $new_question_insert_data['c'],
					'd' => $new_question_insert_data['d'],
					'e' => $new_question_insert_data['e'],
					'f' => $new_question_insert_data['f'],
					'g' => $new_question_insert_data['g'],
					'h' => $new_question_insert_data['h']
				);
				$this->view_add('', $table);
			}
		}
		else
		{
			$this->question_model->delete_question($type_id, $id);
			$this->delete_dir($dir);
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/question'),
				'type' => 'error',
				'msg' => "New question added failed！"
			);
			$this->load->view('jump_page', $data);
		}
	}
	
	function question_index_check($type_id, $id)
	{
		$question_index = $this->input->post('question_index');
		$table_name = "question_table".$type_id;
		$query = $this->db->query("SELECT * FROM $table_name WHERE question_index = $question_index");

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
	
	function edit($type_id, $id)
	{
		if ($this->question_index_check($type_id, $id) == FALSE)
		{
			$renamed = "this question id is exist!";
			$this->view_edit($type_id, $id, $renamed, '');
			return;
		}
		
		$this->form_validation->set_rules('question_index', 'Question_index', 'trim|required|is_natural_no_zero');
		//$this->form_validation->set_rules('question', 'Question', 'trim|required');
		$this->form_validation->set_rules('a', 'A', 'max_length[100]');
		$this->form_validation->set_rules('b', 'B', 'max_length[100]');
		$this->form_validation->set_rules('c', 'C', 'max_length[100]');
		$this->form_validation->set_rules('d', 'D', 'max_length[100]');
		$this->form_validation->set_rules('e', 'E', 'max_length[100]');
		$this->form_validation->set_rules('f', 'F', 'max_length[100]');
		$this->form_validation->set_rules('g', 'G', 'max_length[100]');
		$this->form_validation->set_rules('h', 'H', 'max_length[100]');
		
		if ($this->form_validation->run() == FALSE)
  		{
			$this->view_edit($type_id, $id);
			return;
		}

		$new_question_insert_data = array(
			'question_index' => $this->input->post('question_index'),
			'question_type' => 0,
			'instruction' => $this->input->post('instruction'),
			'question' => $this->input->post('question'),
			'a' => $this->input->post('a'),
			'b' => $this->input->post('b'),
			'c' => $this->input->post('c'),
			'd' => $this->input->post('d'),
			'e' => $this->input->post('e'),
			'f' => $this->input->post('f'),
			'g' => $this->input->post('g'),
			'h' => $this->input->post('h'),
			'visibility' => $this->input->post('visibility')
		);

		$dir = 'upload/'.'type'.$type_id.'/'.'question'.$id.'/';

		//$this->firephp->info($dir);


		$data = $this->upload_pic("question_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->view_edit($type_id, $id,'', $data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['question_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 4;
		}
		$data = $this->upload_pic("a_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->view_edit($type_id, $id,'', $data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['a_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("b_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->view_edit($type_id, $id,'', $data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['b_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("c_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->view_edit($type_id, $id,'', $data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['c_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("d_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->view_edit($type_id, $id,'', $data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['d_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("e_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->view_edit($type_id, $id,'', $data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['e_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("f_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->view_edit($type_id, $id,'', $data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['f_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("g_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->view_edit($type_id, $id,'', $data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['g_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		$data = $this->upload_pic("h_pic", $type_id, $id, $dir);
		if($data['upload_erro'] == FALSE)
		{
			$this->view_edit($type_id, $id,'', $data['error']);
			return;
		}
		else if($data['dir'] != '')
		{
			$new_question_insert_data['h_pic'] = $data['dir'];
			$new_question_insert_data['question_type'] |= 2;
		}
		
		$new_question_insert_data['question_type'] |= $this->check_input();
		//$this->firephp->info($new_question_insert_data);

		$ret = $this->question_model->modify_question($type_id, $id, $new_question_insert_data);

		if($ret)
		{
			//echo "修改成功！";
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/question'),
				'type' => 'thanks',
				'msg' => "Question modified successfully！"
			);
			$this->load->view('jump_page', $data);
		}
		else
		{
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/question/edit'.$type_id.'/'.$id),
				'type' => 'error',
				'msg' => "Question modified failed！"
			);
			$this->load->view('jump_page', $data);
		}
	}
	
	function delete_pic($type_id, $id, $image)
	{
		$query = $this->question_model->search_question($type_id, $id);
		//$this->firephp->info($image);
		$dir = $query[0]->$image;
		//$this->firephp->info($dir);
		if($this->question_model->delete_question_pic($type_id, $id, $image) == TRUE)
		{
			if(file_exists($dir) == TRUE)
			{
				//$this->firephp->info("1");
				unlink($dir);
			}

			$data = array(
				'jump' => true,
				'url' => site_url('admin/question/view_edit/'.$type_id.'/'.$id),
				'type' => 'thanks',
				'msg' => "Picture deleted successfully！"
			);
			$this->load->view('jump_page', $data);
		}
		else
		{
			$data = array(
				'jump' => true,
				'url' => site_url('admin/question/view_edit/'.$type_id.'/'.$id),
				'type' => 'error',
				'msg' => "Picture deleted failed！"
			);
			$this->load->view('jump_page', $data);
		}
	}
	
	function delete($type_id, $id)
	{
		/*delete data in database*/
		$ret = $this->question_model->delete_question($type_id, $id);
		
		if($ret == TRUE)
		{
			$dir = 'upload/'.'type'.$type_id.'/'.'question'.$id.'/';
			$result = $this->delete_dir($dir);
			//$this->firephp->info($result);
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/question'),
				'type' => 'thanks',
				'msg' => "Question deleted successfully！"
			);
			$this->load->view('jump_page', $data);
		}
		else
		{
			$data = array(
				'jump' => true,
				'url' => site_url('/admin/question'),
				'type' => 'error',
				'msg' => "Question deleted failed！"
			);
			$this->load->view('jump_page', $data);
		}
	}
}