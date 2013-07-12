<?php

class Type_model extends CI_Model
{
	function get_typelist()
	{		
		$query = $this->db->query("SELECT * FROM test_type");
		return $query->result();
	}
	
	function validate_typename()
	{
		$typename = $this->input->post('name');
		$query = $this->db->query("SELECT * FROM test_type WHERE name = '$typename'");
		if($query->num_rows() == 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function new_type()
	{
		$new_type_insert_data = array(
			'name' => $this->input->post('name'),
			'upper_limit' => $this->input->post('upper_limit'),
			'visibility' => $this->input->post('visibility')
		);
		
		$insert = $this->db->insert('test_type', $new_type_insert_data);
		$id = $this->db->insert_id();
		return $id;
	}
	
	function search_type($id)
	{		
		$query = $this->db->query("SELECT * FROM test_type where id=$id");
		//$this->firephp->info($query->result());
		return $query->result();
	}
	
	function modify_type($id)
	{
		$name = $this->input->post('name');
		$upper_limit = $this->input->post('upper_limit');
		$visibility = $this->input->post('visibility');

		$query = $this->db->query("UPDATE test_type SET name = '$name', upper_limit = $upper_limit, visibility = '$visibility' WHERE  id=$id");
		
		if($query == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
		
	function delete_type($id)
	{
		$query = $this->db->query("DELETE FROM test_type WHERE id=$id");
		//$this->firephp->info($query);
		return $query;
	}
	
	function filter_type($visibility)
	{
		$query = $this->db->query("SELECT * FROM test_type where visibility='$visibility'");
		//$this->firephp->info($query->result());
		return $query->result();
	}
	
	function new_type_question_table($id)
	{
		$table_name = "question_table".$id;
		$this->load->dbforge();
		
		$fields = array(
						'id' => array(
										'type' => 'INT',
										'constraint' => 10, 
										'unsigned' => TRUE,
										'auto_increment' => TRUE
										),
						'question_index' => array(
										'type' => 'INT',
										'constraint' => 10, 
										'unsigned' => TRUE
										),
						'question_type' => array(
										'type' => 'INT',
										'constraint' => 5,
										'unsigned' => TRUE
										),
						'instruction' => array(
										'type' =>'VARCHAR',
										'constraint' => '300'
										),
						'question' => array(
										'type' =>'VARCHAR',
										'constraint' => '300'
										),
                        'question_pic' => array(
										'type' => 'VARCHAR',
										'constraint' => '500',
										'null' => TRUE
										),
						'a' => array(
										'type' =>'VARCHAR',
										'constraint' => '300',
										'null' => TRUE
										),
                        'a_pic' => array(
										'type' => 'VARCHAR',
										'constraint' => '500',
										'null' => TRUE
										),
						'b' => array(
										'type' =>'VARCHAR',
										'constraint' => '300',
										'null' => TRUE
										),
                        'b_pic' => array(
										'type' => 'VARCHAR',
										'constraint' => '500',
										'null' => TRUE
										),
						'c' => array(
										'type' =>'VARCHAR',
										'constraint' => '300',
										'null' => TRUE
										),
                        'c_pic' => array(
										'type' => 'VARCHAR',
										'constraint' => '500',
										'null' => TRUE
										),
						'd' => array(
										'type' =>'VARCHAR',
										'constraint' => '300',
										'null' => TRUE
										),
                        'd_pic' => array(
										'type' => 'VARCHAR',
										'constraint' => '500',
										'null' => TRUE
										),
						'e' => array(
										'type' =>'VARCHAR',
										'constraint' => '300',
										'null' => TRUE
										),
                        'e_pic' => array(
										'type' => 'VARCHAR',
										'constraint' => '500',
										'null' => TRUE
										),
						'f' => array(
										'type' =>'VARCHAR',
										'constraint' => '300',
										'null' => TRUE
										),
                        'f_pic' => array(
										'type' => 'VARCHAR',
										'constraint' => '500',
										'null' => TRUE
										),
						'g' => array(
										'type' =>'VARCHAR',
										'constraint' => '300',
										'null' => TRUE
										),
                        'g_pic' => array(
										'type' => 'VARCHAR',
										'constraint' => '500',
										'null' => TRUE
										),
						'h' => array(
										'type' =>'VARCHAR',
										'constraint' => '300',
										'null' => TRUE
										),
                        'h_pic' => array(
										'type' => 'VARCHAR',
										'constraint' => '500',
										'null' => TRUE
										),
                        'visibility' => array(
										'type' => 'VARCHAR',
										'constraint' => 20
										)
                );
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($table_name, TRUE);
	}
	
	function new_type_answer_table($id)
	{
		$table_name = "answer_table".$id;
		$this->load->dbforge();
		
		$fields = array(
						'id' => array(
										'type' => 'INT',
										'constraint' => 10, 
										'unsigned' => TRUE,
										'auto_increment' => TRUE
										),
						'participant_name' => array(
										'type' => 'VARCHAR',
										'constraint' => '50'
										),
						'survey_info' => array(
										'type' =>'VARCHAR',
										'constraint' => '5000'
										),
                        'answer_info' => array(
										'type' => 'VARCHAR',
										'constraint' => '5000'
										)
                );
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($table_name, TRUE);
	}


	
	function delete_type_question_table($id)
	{
		$table_name = "question_table".$id;
		//$this->firephp->info($table_name);
		$this->load->dbforge();
		$this->dbforge->drop_table($table_name);
	}
	
	function delete_type_answer_table($id)
	{
		$table_name = "answer_table".$id;
		//$this->firephp->info($table_name);
		$this->load->dbforge();
		$this->dbforge->drop_table($table_name);
	}
}