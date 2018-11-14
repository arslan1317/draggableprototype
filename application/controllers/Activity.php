<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

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
        $this->load->model('Activity_model');
    }

	public function index($data = NULL){
            if(isset($_SESSION['u_id'])){
		$this->load->view('assign_view');
            }else{
                redirect('Login/index');
            }
	}

	public function insert_activity(){  
       $activity = array(
                        'act_name' => $this->input->post('activityname'),
                        't_type' => 1,
                        'p_id' => $this->input->post('projectid'),
                        'done_by_id' => $this->session->userdata('u_id')
                    );
        $data = $this->Activity_model->insert_activity($activity);
        echo json_encode($data);
    }

    public function get_activity_name_by_project(){
        $id = $this->input->post('selectedProject');
        $data = $this->Activity_model->get_activity_name_by_project($id);
        echo json_encode($data);
    }
    
    public function insert_wireframe_code(){
        $id = $this->input->post('activityId');
        $code = $this->input->post('getWireframeCode');
        $data = $this->Activity_model->insert_wireframe_code($id, $code);
        echo json_encode($data);
    }
    
    public function get_html_of_activity(){
        $id = $this->input->post('getActivityId');
        $data = $this->Activity_model->get_html_of_activity($id);
        echo json_encode($data);
    }
}
