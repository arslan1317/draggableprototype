<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('User_model');
    }

	public function index()
	{
		 if(isset($_SESSION['u_id'])){
			redirect('User/index');
        }else{
            $in = $this->uri->segment(3);
	    	if($in == 1){
		    	$this->session->set_flashdata('verify', '<div class="alert alert-success text-center" id="loginError">Email address is confirmed. Please login to the system</div>');
		    }else if($in == 2){
			    $this->session->set_flashdata('verify', '<div class="alert alert-danger text-center" id="loginError">Email address is not confirmed. Please try to re-register.</div>');
		    }
		    $this->load->helper('url');
		    $this->load->helper('form');
		    $this->load->view('login_view');
        }
	}
	
	public function login(){
        
        $this->form_validation->set_rules('email','Email', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        
        if($this->form_validation->run() == false){
            $data['message'] = validation_errors();
        	$data['code'] = 1;
        	echo json_encode($data);
        }else{
	        $username = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$getReturnLogin = $this->User_model->loginUser($username, $password);
			if($getReturnLogin == 1){
				$data['code'] = 2; //login having status 1
                echo json_encode($data);
			}else if($getReturnLogin == 2){
				$data['message'] = "<p>Email Not Verified</p>";
				$data['code'] = 3; //Email not Verified
				echo json_encode($data);
			}else{
				$data['message'] = "<p>Invalid Username Or Password</p>";
				$data['code'] = 4; //Invalid Username and Password
				echo json_encode($data);
			}
        }
    }
}
