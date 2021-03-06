<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

	
	function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Supervisor_model');
        
    }

	public function index(){
		if(isset($_SESSION['u_id'])){
			$this->load->view('user_dashboard');
        }else{
            redirect('Login/index');
        }
	}

	public function check_supervisor_assign()
	{
		$data = $this->Supervisor_model->check_supervisor_assign_model();
		echo json_encode($data);
	}
        
        public function accept_supervisor(){
            $id = $this->input->post('id');;
            $data = $this->Supervisor_model->accept_supervisor($id);
            echo json_encode($data);
        }
        
        public function reject_supervisor(){
            $id = $this->input->post('id');;
            $data = $this->Supervisor_model->reject_supervisor($id);
            echo json_encode($data);
        }
        
        public function check_Accept_Or_Reject_Supervisor(){
            $data = $this->Supervisor_model->check_Accept_Or_Reject_Supervisor();
            echo json_encode($data);
        }
}
