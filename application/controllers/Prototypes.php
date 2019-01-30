<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prototypes extends CI_Controller {

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
        $this->load->library('session');
        $this->load->model('Prototype_model');
    }

	public function index(){
		if(isset($_SESSION['u_id'])){
			$this->load->view('prototype_view');
        }else{
            redirect('Login/index');
        }
	}

	public function get_all_prototype(){
		$data = $this->Prototype_model->get_all_prototype();
        echo json_encode($data);
	}

	public function get_all_prototype_layout(){
		$id = $this->input->post('selectedProject');
		$data = $this->Prototype_model->get_all_prototype_layout($id);
        echo json_encode($data);
	}

	public function getPrototypeStatus(){
		$id = $this->input->post('projectid');
		$data = $this->Prototype_model->get_prototype_status($id);
        echo json_encode($data);
	}

	public function storeButtonSequence(){
		$prototype = array(
            'act_id' => $this->input->post('id'),
            'act_open_name' => $this->input->post('activity_name'),
            'act_open_id' => $this->input->post('activity_id'),
            'act_button' => $this->input->post('button'),
        );
		$data = $this->Prototype_model->store_button_sequence($prototype);
		echo json_encode($data);
	}

	public function updateButtonSequence(){
		$pt_id = $this->input->post('checkerId');
		$act_id = $this->input->post('id');
		$act_open_name = $this->input->post('activity_name');
		$act_open_id = $this->input->post('activity_id');
		$act_button = $this->input->post('button');
        $data = $this->Prototype_model->update_button_sequence($pt_id, $act_id, $act_open_name, $act_open_id, $act_button);
		echo json_encode($data);
	}
}
