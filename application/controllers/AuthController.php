<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('EmployeeModel');
		$this->load->library('PhpMailer_lib');
    }

	private function is_auth() {
        return $this->session->userdata('matriculId');
    }
	


    	//Login page
	public function index()
	{
		if($this->is_auth()==null){
			$data['title']="Login";
		$this->load->view('header/head',$data);
		$this->load->view('login');
		$this->load->view('footer/footer');
		}else{
			redirect(base_url('user_info'));
			
		}
	}

    	//get data from form login
	public function login() {
		if ($this->input->post()) {
			$this->form_validation->set_rules('matriculId', 'Matricul ID', 'required');
			$this->form_validation->set_rules('access_code', 'Access Code', 'required');
	
			// If the validation rules are met, search for the user
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				// Si les règles de validation sont respectées, recherchez l'utilisateur
				$data = [
					'matriculId' => $this->input->post('matriculId'),
					'access_code' => $this->input->post('access_code'),
				];
	
				// Verify if the user is in the credentials
				$user = $this->EmployeeModel->get_user($data['matriculId']);
				if ($user != null) {
					$password = $user->access_code;
	
					if ($password == $data['access_code']) {

						//verify if user a count is active
						if($user->status == 1){
							$this->session->set_flashdata('welcome_message', 'Happy to see you '.$user->lastname.' today !');

						$user_data = array(
							'matriculId' => $user->matriculId,
							'email' =>$user->email,
							'is_admin' =>$user->is_admin,
							'firstname' =>$user->firstname,
							'lastname' =>$user->lastname,
							'stack' =>$user->stack,
						);
						// Set data to session.
							$this->session->set_userdata($user_data);
							if($this->EmployeeModel->get_id_from_list($this->session->userdata('matriculId'))){

							}else{
								//set user to liste connected
								$this->db->insert('connected_users',$user_data);
							}
						redirect(base_url('user_info'));

						}else{
							$this->session->set_flashdata('error_message', 'Your account is not activated !');
						redirect(base_url('/'));
						}
						
					} else {
						$this->session->set_flashdata('error_message', 'Access code incorrect!');
						redirect(base_url('/'));
					}
				} else {
					$this->session->set_flashdata('error_message', 'This matricul ID is not in our credentials');
					redirect(base_url('/'));
				}
			}
		} else {
			$this->session->set_flashdata('error_message', 'Your ID has logged in');
			$this->index();
			
		}
	}



    

	//logout
	public function logout() {
		$this->session->sess_destroy();
		$this->EmployeeModel->remove_user_from_connected_list();
        redirect(base_url('/'));
    }












}