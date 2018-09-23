<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
                'password' => $enc_password               
			);
			// Insert user
			return $this->db->insert('users', $data);
		}

		public function login($name, $password){
			// Validate
			$this->db->where('name', $name);
			$this->db->where('password', $password);
			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
		}

		public function is_admin($name, $password){
			// Validate
			$this->db->where('name', $name);
			$this->db->where('password', $password);
			$query = $this->db->get('users');
			if($query->num_rows() == 1){
				$result = $query->row();
				return $result->admin;
			} else {
				return false;
			}
		}


}