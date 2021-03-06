<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

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
        $this->load->model('Chat_model');
    }

	public function index($data = NULL){
            if(isset($_SESSION['u_id'])){
				$this->load->view('chat_view');
            }else{
                redirect('Login/index');
            }
	}

	public function get_project_chat(){
		$data = $this->Chat_model->get_project_chat();
		echo json_encode($data);
	}

	public function send_message(){
		$id = $this->input->post('chat_id');
		$seen = $this->input->post('seen');
		$message_text = $this->input->post('message_text');
		$date = $this->input->post('datetime');
		$data = $this->Chat_model->send_message($id,$message_text, $date, $seen);
		echo json_encode($data);
	}

	public function get_all_chat_by_id(){
		$id = $this->input->post('chat_id');
		$seen = $this->input->post('b');
		$data = $this->Chat_model->getAllChatById($id, $seen);
		echo json_encode($data);
	}

	public function get_unread_chat(){
		$data = $this->Chat_model->get_unread_chat();
		echo json_encode($data);
	}

}
