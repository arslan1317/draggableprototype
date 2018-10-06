<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

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
        $this->load->model('Task_model');
    }

    public function index($data = NULL){
		if(isset($_SESSION['u_id'])){
			$data['task_data'] = $this->Task_model->get_all_task();
			$data['project_name'] = $this->Task_model->get_project();
			$this->load->view('task_view', $data);
        }else{
            redirect('Login/index');
        }
	}

	public function add_task(){
		$this->form_validation->set_rules('projectName','Project Name', 'trim|required');
        $this->form_validation->set_rules('taskType','Task Type', 'trim|required');
        $this->form_validation->set_rules('taskStart','Task Start', 'trim|required');
        $this->form_validation->set_rules('taskEnd','Task End', 'trim|required');
        $this->form_validation->set_rules('taskDetail', 'Task Details', 'trim|required');
        if($this->form_validation->run() == false){
        	$data['error'] = validation_errors();
        	$this->index($data);
        }else{
        	$task = array(
        			't_type' => $this->input->post('taskType'),
        			't_start' => $this->input->post('taskStart'),
        			't_end' => $this->input->post('taskEnd'),
        			't_detail' => $this->input->post('taskDetail'),
        			'p_id' => $this->input->post('projectName'),
        	);
        	if($this->Task_model->add_task($task)){
        		$data['success'] = '<p>Task Has Been Added</p>';
        		$this->index($data);
        	}else{
        		$data['error'] = '<p>Error, Please Contact You Administrator</p>';
        		$this->index($data);
        	}
        }
	}
}
