<?php
	class Task_model extends CI_model{
		public function __construct(){
			$this->load->database();
		}
		public function get_tasks($slug = FALSE){
			if($slug === FALSE){
				$this->db->order_by('users.id', 'DESC');
				$this->db->join('users', 'users.id = tasks.user_id');

				$query = $this->db->get('tasks');
				return $query->result_array();
			}
			$query = $this->db->get_where('tasks', array('slug'=>$slug)); 
			return $query->row_array();
		}
		public function create_task(){
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'user_id' => $this->input->post('user_id')
						);
			return $this->db->insert('tasks', $data);
		}

		public function delete_task($id){
			$this->db->where('id', $id);
			$this->db->delete('tasks');
			return true;
		}

		public function update_task(){
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body')
							
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('tasks', $data);
		}
		public function get_users(){
			$this->db->order_by('name');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function done_task($id){
			$done = '1';
				$data = array(
				'done' => $done);
			$this->db->where('id', $id);
			return $this->db->update('tasks', $data);			
			}
	}