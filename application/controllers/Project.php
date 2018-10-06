<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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
        $this->load->model('Project_model');
    }

	public function index($data = NULL){
		if(isset($_SESSION['u_id'])){
			$data['project_data'] = $this->Project_model->get_all_project();
			$this->load->view('project_view', $data);
        }else{
            redirect('Login/index');
        }
	}

	public function add_project(){
		$this->form_validation->set_rules('projectName','Project Name', 'trim|required');
        $this->form_validation->set_rules('projectType','Project Type', 'trim|required');
        $this->form_validation->set_rules('projectStart','Project Start', 'trim|required');
        $this->form_validation->set_rules('projectEnd','Project End', 'trim|required');
        $this->form_validation->set_rules('projectDetails', 'Project Details', 'trim|required');
        if($this->form_validation->run() == false){
        	$data['error'] = validation_errors();
        	$this->index($data);
        }else{
        	$project = array(
        			'p_name' => $this->input->post('projectName'),
        			'p_type' => $this->input->post('projectType'),
        			'p_start' => $this->input->post('projectStart'),
        			'p_end' => $this->input->post('projectEnd'),
        			'p_detail' => $this->input->post('projectDetails'),
        			'u_id' => $this->session->userdata('u_id'),
        	);
        	if($this->Project_model->add_project($project)){
        		$data['success'] = '<p>Project Has Been Added</p>';
        		$this->index($data);
        	}else{
        		$data['error'] = '<p>Error, Please Contact You Administrator</p>';
        		$this->index($data);
        	}
        }
	}
}
