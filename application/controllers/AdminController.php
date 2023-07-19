<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //load EmployeeModel
        $this->load->model('EmployeeModel');
        // Verify if user is logged and have an role admin "admin=true"
        if (!$this->is_admin()) {
            // redirect to user info when user has not role admin
            $this->session->set_flashdata('error_message', 'You are not able to access on this page !');
            redirect(base_url('user_info'));
        }
    }

    //check if user has an access rôle admnin
    private function is_admin() {
        return $this->session->userdata('is_admin');
    }
	public function index()
	{
        $data['active_users'] = $this->EmployeeModel->get_count_active_user();
        $data['not_active'] = $this->EmployeeModel->get_count_not_active_user();
        $data['count_admin'] = $this->EmployeeModel->get_count_admin();
		$data['title']="Dashbord";
		$this->load->view('header/header_admin',$data);
		$this->load->view('admin/dashbord');
		$this->load->view('footer/footer_admin');
	}

    //add new emploie
    public function form_to_add_user(){
        $data['title']="New employee";
		$this->load->view('header/header_admin',$data);
		$this->load->view('admin/add');
		$this->load->view('footer/footer_admin');
    }


    //get active user
    public function list_active_user(){
            $data['users'] = $this->EmployeeModel->get_all_users();
            $data['title']="Lists of employee";
            $this->load->database();
            $this->load->view('header/header_admin',$data);
            $this->load->view('admin/list');
            $this->load->view('footer/footer_admin');
    }

    

    //generator access code
    public function generateAccessCode($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $accessCode = '';

        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $accessCode .= $characters[rand(0, $charactersLength - 1)];
        }

        return $accessCode;
    }

    //function to send Email  an user with her access code
    public function notify($email,$access_code,$lastname){
        
        // Initalis lib Mailer
        $this->load->library('PhpMailer_lib');
        $mail = $this->phpmailer_lib->load();

        // Configurer les paramètres de l'e-mail
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';//Set your email
        $mail->Password = '';//Set your password
        $mail->SMTPSecure = 'ssl'; // ou 'ssl' or SSL
        $mail->Port = 465;
        
        // Parameter of expediter and destinater
        $mail->setFrom('anjaah9@gmail.com', 'Anjaah');
        $mail->addAddress($email, $lastname);
        
        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Access code from SPACEWORK';
        $mail->Body    = $access_code;
        

        // Send Email
        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    //Insert new employee in database with the table users
    public function store(){

        $this->form_validation->set_rules('matriculId','matriculId','required|is_unique[users.matriculId]');
        $this->form_validation->set_rules('firstname','firstname','required');
        $this->form_validation->set_rules('lastname','lastname','required');
        $this->form_validation->set_rules('email','email','required|valid_email');
        $this->form_validation->set_rules('stack','stack','required');

        if($this->form_validation->run()){
            $data = [
                'matriculId' => $this->input->post('matriculId'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'stack' => $this->input->post('stack'),
                'access_code' => $this->generateAccessCode(8),
               ];

               $res = $this->EmployeeModel->insertUser($data);
               if($res){
                $this->EmployeeModel->actions($this->input->post('matriculId'),$this->session->userdata('matriculId'),'Add new user');
               
                if($this->notify($this->input->post('email'),$data['access_code'],$data['lastname'])){
                    $this->session->set_flashdata('success_message', $data['lastname'].' is inserted with success ! Your access code is send to'.$data['email']);
                }else{
                    $this->session->set_flashdata('success_message', $data['lastname'].' is inserted with success ! Access code : '.$data['access_code']);
                }
                redirect(base_url('add'));
               }else{
                $this->session->set_flashdata('error_message',' Try again to inserted but it has an error !');
                redirect(base_url('add'));
               }
               

        }else{
            $this->form_to_add_user();
        }
    }

    //get user to edit
    public function edit($id){
		$data['title']="Edit";
        $res = $this->EmployeeModel->get_user($id);
        //redirect to list user when $res return false
        if($res){
            $data['user'] = $res;
            $this->load->view('header/header_admin',$data);
            $this->load->view('admin/edit');
            $this->load->view('footer/footer_admin');
        }else{
            redirect(base_url('list'));
        }
    }


    //get user to edit
    public function post_edit($id){
        //make rules for input
        $this->form_validation->set_rules('firstname','firstname','required');
        $this->form_validation->set_rules('lastname','lastname','required');
        $this->form_validation->set_rules('email','email','required|valid_email');
        $this->form_validation->set_rules('stack','stack','required');
        $this->form_validation->set_rules('access_code','access_code','required');

        //Search user in database

        $res = $this->EmployeeModel->get_user($id);
        //redirect to list user when $res return false
        if($res){
            if($this->form_validation->run()){
                $data = [
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'stack' => $this->input->post('stack'),
                    'access_code' => $this->input->post('access_code'),
                   ];
                   //save data to database
                   $this->EmployeeModel->update_user($data,$id);
                   $this->EmployeeModel->actions($id,$this->session->userdata('matriculId'),'Edit user');
                   $this->session->set_flashdata('success_message','User updated with success ! ');
                    redirect(base_url('list'));
                }else{
                    $this->edit($id);
                }
            
        }else{
            $this->session->set_flashdata('error_message','The matricul ID is not fund in our credentials ');
            redirect(base_url('list'));
        }
    }


    //delete user in active list

    public function delete($id){
        $data['title']='Delete ?';
        $data['profile'] = $this->EmployeeModel->get_user($id);
        $this->load->view('header/header_admin',$data);
        $this->load->view('admin/delete');
        $this->load->view('footer/footer_admin');
    }


    //confirm to delete
    public function corfirm_to_delete($id){
        $data = [
            'status'=>0,
        ];
        $this->EmployeeModel->confirm_delete($data,$id);
        $this->EmployeeModel->actions($id,$this->session->userdata('matriculId'),'Delete user');
        $this->session->set_flashdata('success_message','The matricul ID '.$id.' has deleted ');
        redirect(base_url('list'));
    }

    //employee not active
    public function employee_not_active(){
        $data['users'] = $this->EmployeeModel->get_all_users_not_active();
        $data['title']="Lists of employee";
        $this->load->database();
        $this->load->view('header/header_admin',$data);
        $this->load->view('admin/not_active');
        $this->load->view('footer/footer_admin');
}

//restore an employee
public function corfirm_to_restore($id){
    $data = [
        'status'=>1,
    ];
    $this->EmployeeModel->confirm_restore($data,$id);
    $this->EmployeeModel->actions($id,$this->session->userdata('matriculId'),'Restore user');
    $this->session->set_flashdata('success_message','The employe ID '.$id.' has restored ');
    redirect(base_url('user_not_active'));
}


//send list user connected 
public function get_connected_users(){
    $this->EmployeeModel->users_connected();
}

}
?>