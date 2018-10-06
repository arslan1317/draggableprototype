<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assign extends CI_Controller {

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
        $this->load->database();
        $this->load->model('Assign_model');
    }

	public function index($data = NULL){
		if(isset($_SESSION['u_id'])){
			$data['assign_work'] = $this->Assign_model->get_assign_work();
			$data['project_name'] = $this->Assign_model->get_project();
			$this->load->view('assign_view', $data);
        }else{
            redirect('Login/index');
        }
	}

	public function get_user_data(){
		$get_value = $this->input->post('value');
		$data = $this->Assign_model->get_user($get_value);
		echo json_encode($data);
	}

	public function get_task_type(){
		$get_value = $this->input->post('value');
		$data = $this->Assign_model->get_task_type($get_value);
		echo json_encode($data);
	}

	public function add_assign(){
		$this->form_validation->set_rules('user-email','User Email', 'trim|required');
        $this->form_validation->set_rules('projectName','Project Name', 'trim|required');
        $this->form_validation->set_rules('taskType','Task Type', 'trim|required');
        $this->form_validation->set_rules('assignStart','Assign Date', 'trim|required');
        $this->form_validation->set_rules('assignEnd', 'Assign End', 'trim|required');
        $this->form_validation->set_rules('assignDetail', 'Assign Detail', 'trim|required');
        if($this->form_validation->run() == false){
        	$data['error'] = validation_errors();
        	$this->index($data);
        }else{
        	if($this->Assign_model->check_project_task($this->input->post('projectName'), $this->input->post('taskType'))){
	        	$assign = array(
	        			'u_id' => $this->input->post('user-email-id'),
	        			'p_id' => $this->input->post('projectName'),
	        			't_id' => $this->input->post('taskType'),
	        			'a_start' => $this->input->post('assignStart'),
	        			'a_end' => $this->input->post('assignEnd'),
	        			'a_by' => $this->session->userdata('u_id'),
	        			'a_detail' => $this->input->post('assignDetail'),
	        	);
	        	if($this->Assign_model->add_assign($assign)){
	        		$data['success'] = '<p>Assign Has Been Done</p>';
	        		$this->index($data);
	        	}else{
	        		$data['error'] = '<p>Error, Please Contact You Administrator</p>';
	        		$this->index($data);
	        	}
        	}else{
        		$data['error'] = "<p>This Project And Task Has Already Assigned</p>";
        		$this->index($data);
        	}
        }
	}

	public function accept_notification($id){
		$data = $this->Assign_model->accept_notification($id);
		echo json_encode($data);
	}

	public function decline_notification($id){
		$data = $this->Assign_model->decline_notification($id);	
		echo json_encode($data);
	}
}
