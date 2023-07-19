<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('EmployeeModel');
    }

	private function auth() {
        return $this->session->userdata('matriculId');
    }
	


	//Redirect to the home page if the user is authenticated.
	public function home(){
		if(!$this->auth()){
			redirect(base_url('/'));
		}else{
			
			$data['title']="Home";
			$data['profile'] = $this->EmployeeModel->get_user($this->session->userdata('matriculId'));
		$this->load->database();
		$this->load->view('header/head',$data);
		$this->load->view('home');
		$this->load->view('footer/footer');

		}
	}
}
?>