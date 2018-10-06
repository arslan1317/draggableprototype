<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

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
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('User_model');
    }

	public function index(){
		if(isset($_SESSION['u_id'])){
			$data['notification'] = $this->User_model->get_detail_project_notification();
			$this->load->view('notification_view', $data);	
        }else{
            redirect('Login/index');
        }
	}

	public function main_notifier(){
		$data['notification'] = $this->User_model->get_main_detail_project_notification();
		$this->load->view('main_notification_view', $data);	
	}
}
