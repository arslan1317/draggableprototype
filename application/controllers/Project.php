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
		$this->load->view('project_view');
            }else{
                redirect('Login/index');
            }
	}

	public function add_project(){
                $this->form_validation->set_rules('supervisor','Supervisor', 'trim|required');
                $this->form_validation->set_rules('projectName','Project Name', 'trim|required');
                $this->form_validation->set_rules('projectType','Project Type', 'trim|required');
                $this->form_validation->set_rules('projectStart','Project Start', 'trim|required');
                $this->form_validation->set_rules('projectEnd','Project End', 'trim|required');
                $this->form_validation->set_rules('projectDetails', 'Project Details', 'trim|required');
                    
                if($this->form_validation->run() == false){
                    $data['message'] = validation_errors();
                    $data['code'] = 1;
                    echo json_encode($data);
                }else{
                    $now = date('Y-m-d H:i:s');
                    $project = array(
                        'p_name' => $this->input->post('projectName'),
                        'p_type' => $this->input->post('projectType'),
                        'p_start' => $this->input->post('projectStart'),
                        'p_end' => $this->input->post('projectEnd'),
                        'p_detail' => $this->input->post('projectDetails'),
                        'u_id' => $this->session->userdata('u_id'),
                        's_id' => $this->input->post('supervisor'),
                        'timespan' => $now,
                    );
                    if($this->Project_model->add_project($project)){
                        $data['message'] = '<p>Project Has Been Added</p>';
                        $data['code'] = 2;
                        echo json_encode($data);
                    }else{
                        $data['message'] = '<p>Error, Please Contact You Administrator</p>';
                        $data['code'] = 3;
                        echo json_encode($data);
                    }
                }
        
        }
        
        public function get_all_project(){
            $data = $this->Project_model->get_all_project();
            echo json_encode($data);
        }
        
        public function get_project_by_id(){
            $id = $this->input->post('id');
            $data = $this->Project_model->get_project_by_id($id);
            echo json_encode($data);
        }
        
        public function update_project_by_id(){
            $projectid = $this->input->post('project_id');
            $projectname = $this->input->post('project_name');
            $projectstype = $this->input->post('project_type');
            $projectstart = $this->input->post('project_start');
            $projectend = $this->input->post('project_end');
            $projectsupervisor = $this->input->post('project_supervisor');
            $projectdetails =$this->input->post('project_details');
            $data = $this->Project_model->update_project_by_id($projectid, $projectname, $projectstype, $projectstart, $projectend, $projectsupervisor, $projectdetails);
            echo json_encode($data);
        }
}
