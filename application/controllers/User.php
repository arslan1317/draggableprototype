<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        
    }

	public function index(){
            if(isset($_SESSION['u_id'])){
                $data['all_data'] = $this->User_model->get_all_created_project();
                $data['supervising'] = $this->User_model->get_all_supervising();
                $data['wireframe'] = $this->User_model->get_all_wireframe();
		$this->load->view('user_dashboard', $data);
            }else{
                redirect('Login/index');
            }
	}

	public function logout(){
		 if($this->session->has_userdata('u_id')){
            $this->session->sess_destroy();
            redirect('User');
        }
	}

	public function profile(){
		$this->load->view('profile_view');
	}
	
	public function get_detail_project_notification(){
		$data = $this->User_model->get_detail_project_notification();
		echo json_encode($data);
	}

	public function get_single_notification($id){
		$data['single_notification'] = $this->User_model->get_single_notification($id);
		$data['seen'] = $this->User_model->seen_the_notification($id);
		$this->load->view('single_notification_view', $data);
	}	

	public function get_seen_project_notification(){
		$data = $this->User_model->get_seen_project_notification();
		echo json_encode($data);
	}

	public function get_accept_decline_assign(){
		$data = $this->User_model->get_accept_decline_assign();
		echo json_encode($data);
	}

	public function message_assign_by(){
		$data = $this->User_model->message_assign_by();
		print_r($data);
	}
        
        public function seen_notification(){
            $id = $this->input->post('id');
            $data = $this->User_model->seen_notification($id);
            echo json_encode($data);
        }

}
