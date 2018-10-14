<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('User_model');
		$this->load->library('email');
    }

	public function index($erorr_message = Null)
	{
		$data['message'] = $erorr_message;
		$this->load->helper('url');
		$this->load->view('register_view', $data);
	}

	public function signup(){
        $this->form_validation->set_rules('firstName','firstName', 'trim|required');
        $this->form_validation->set_rules('lastName','lastName', 'trim|required');
        $this->form_validation->set_rules('email','email', 'trim|required|valid_email|is_unique[users.u_email]');
        $this->form_validation->set_rules('pass','Password', 'required');
        $this->form_validation->set_rules('conPass', 'Password Confirmation', 'trim|required|matches[pass]');
        if($this->form_validation->run() == false){
        	$data['message'] = validation_errors();
        	$data['code'] = 1;
        	echo json_encode($data);
        }else{
        	$user = array(
                'u_fname' => $this->input->post('firstName'),
                'u_lname' => $this->input->post('lastName'),
                'u_email' => $this->input->post('email'),
                'u_pass' => md5($this->input->post('pass')),
            );
            if($this->User_model->insertEmployee($user)){
            	if($this->User_model->sendEmail($this->input->post('email'))){
            		$data['message'] = "<p>Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('email')."</p>";
            		$data['code'] = 2;
            		echo json_encode($data);
            	}else{
            		$data['message'] = "<p>Failed!! Please try again.</p>";
            		$data['code'] = 3;
            		echo json_encode($data);
            	}
            }
            
        }
    }

    function confirmEmail($hashcode){
        if($this->User_model->verifyEmail($hashcode)){
            $in = 1;
            redirect('Login/index/'.$in);
        }else{
            $in = 2;
            redirect('Login/index/'.$in);
        }
    }

}
