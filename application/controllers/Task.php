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
		$this->load->view('task_view');
            }else{
                redirect('Login/index');
            }
	}

	public function add_task(){
                $this->form_validation->set_rules('projectName','Project Name', 'trim|required');
                $this->form_validation->set_rules('TaskType','Task Type', 'trim|required');
                $this->form_validation->set_rules('projectStart','Task Start', 'trim|required');
                $this->form_validation->set_rules('projectEnd','Task End', 'trim|required');
                $this->form_validation->set_rules('taskDetail', 'Task Details', 'trim|required');
                if($this->form_validation->run() == false){
                    $data['message'] = validation_errors();
                    $data['code'] = 1;
                    echo json_encode($data);
                }else{
                    $task = array(
                        't_type' => $this->input->post('TaskType'),
                        't_start' => $this->input->post('projectStart'),
                        't_end' => $this->input->post('projectEnd'),
                        't_detail' => $this->input->post('taskDetail'),
                        'p_id' => $this->input->post('projectName'),
                    );
                    if($this->Task_model->add_task($task)){
                        $data['message'] = '<p>Project Has Been Added</p>';
                        $data['code'] = 2;
                        echo json_encode($data);
                    }else{
                        $data['error'] = '<p>Error, Please Contact You Administrator</p>';
                        $data['code'] = 3;
                        echo json_encode($data);
                    }
                }
	}
        
        public function get_all_task(){
            $data['task_data'] = $this->Task_model->get_all_task();
            $data['project_name'] = $this->Task_model->get_project();
            echo json_encode($data);
        }
        
        public function get_task_by_id(){
            $id = $this->input->post('id');
            $data = $this->Task_model->get_task_by_id($id);
            echo json_encode($data);
        }
        
        public function update_task_by_id(){
            $taskid = $this->input->post('task_id');
            $taskprojectname = $this->input->post('task_project_name');
            $tasktype = $this->input->post('task_type');
            $taskstart = $this->input->post('task_start');
            $taskend = $this->input->post('task_end');
            $taskdetails =$this->input->post('task_details');
            $data = $this->Task_model->update_task_by_id($taskid, $taskprojectname, $tasktype, $taskstart, $taskend, $taskdetails);
            echo json_encode($data);
        }
}
