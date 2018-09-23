<?php 
	class Tasks extends CI_controller{
		public function index(){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			} 

			$data['title'] = 'Latest Tasks';

			$data['tasks'] = $this->task_model->get_tasks();
			


			$this->load->view('templates/header');
			$this->load->view('tasks/index', $data);
			$this->load->view('templates/footer');
	}

	public function view($slug = NULL){

		

		$data['task'] = $this->task_model->get_tasks($slug);

		if(empty($data['task'])){
			show_404();
		}
			$this->load->view('templates/header');
			$this->load->view('tasks/view', $data);
			$this->load->view('templates/footer');
	}

	public function create(){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			} 

			$data['title'] = 'Create Task';

			$data['users'] = $this->task_model->get_users();

			
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('tasks/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->task_model->create_task();
				redirect('tasks');
			}
		}

	public function delete($id){		
			$this->task_model->delete_task($id);				
			redirect('tasks');
		}

	public function edit($slug){

		if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			} 
			
			$data['task'] = $this->task_model->get_tasks($slug);
			if(empty($data['task'])){
				show_404();
			}
			$data['title'] = 'Edit Task';
			$this->load->view('templates/header');
			$this->load->view('tasks/edit', $data);
			$this->load->view('templates/footer');
		}


	public function update(){
			
		if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			} 

			$this->task_model->update_task();
			
			redirect('tasks');
		}

		public function done($id){
			
		if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			} 

			$this->task_model->done_task($id);
			
			redirect('tasks');
		}

	}
		