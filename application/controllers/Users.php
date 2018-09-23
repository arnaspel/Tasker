<?php
	class Users extends CI_Controller{
		// Register user
		public function register(){
			$data['title'] = 'Sign Up';
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));
				$this->user_model->register($enc_password);
				redirect('tasks');
			}
		}

		public function login(){
			$data['title'] = 'Sign In';
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				
				// Get username
				$name = $this->input->post('name');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));
				// Login user
				$admin = $this->user_model->is_admin($name, $password);
				$user_id = $this->user_model->login($name, $password);
				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'name' => $name,
						'logged_in' => true,
						'admin' => $admin
					);
					$this->session->set_userdata($user_data);
					redirect('tasks');
				} else {
					redirect('users/login');
				}		
			}
		}

		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			redirect('users/login');
		}

	}