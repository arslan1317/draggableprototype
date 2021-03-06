<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
        $this->load->helper('file');
        $this->load->model('User_model');
        
    }

	public function index($data = NULL){
		if(isset($_SESSION['u_id'])){
			$this->load->view('setting_view', $data);
        }else{
            redirect('Login/index');
        }
	}

	public function setting(){
		$id = $this->session->userdata('u_id');
		$data['image'] = $this->User_model->get_image($id);
		$data['error'] = "";
		$this->load->view('setting_view', $data);
	}

	public function profile(){
		$this->load->view('profile_view');
	}

	public function image_upload(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		$this->load->library('upload', $config);
		$id = $this->session->userdata('u_id');
		if (!$this->upload->do_upload('file_name'))
		{
			// echo $this->upload->display_errors(); die();
			$data['error'] = $this->upload->display_errors();
			$data['image'] = $this->User_model->get_image($id);
			$this->load->view('setting_view', $data);
		}
		else
		{
			// $getPathForDelete = $this->User_model->get_image($id);
			// deleteFiles($getPathForDelete);
			$this->User_model->insert_images($this->upload->data());
			$data['error'] = "Image has been Uploaded";
			$data['image'] = $this->User_model->get_image($id);
    		$this->load->view('setting_view', $data);
		}
	}

	// public function deleteFiles($path){
	//     $files = glob($path.'*'); // get all file names
	//     foreach($files as $file){ // iterate files
	//       if(is_file($file))
	//         unlink($file); // delete file
	//         //echo $file.'file deleted';
	//     }   
	// }

	public function changeName(){
		$this->form_validation->set_rules('firstName','First Name', 'trim|required');
        $this->form_validation->set_rules('lastName','Last Name', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
        	$data['message'] = validation_errors();
        	$data['code'] = 1;
        	echo json_encode($data);
		}
		else
		{
			$first_name = $this->input->post('firstName');
			$last_name = $this->input->post('lastName');
			$this->User_model->updateName($first_name, $last_name);
			$data['message'] = 'Successfully Updated';
			$data['code'] = 2;
			echo json_encode($data);
			// $this->load->view('setting_view', $data);
		}
	}
	// Done By Arslan
	public function changePassword(){
		$this->form_validation->set_rules('currpass', 'Current password', 'trim|required');
		$this->form_validation->set_rules('newpass', 'New password', 'trim|required');
		$this->form_validation->set_rules('confpass', 'Confirm password', 'trim|required|matches[newpass]');

		if($this->form_validation->run() == FALSE){
			$data['message'] = validation_errors();
			$data['code'] = 1;
			echo json_encode($data);
		}
		else{
			$old_password = $this->input->post('currpass');
			$new_password = $this->input->post('newpass');
			$result = $this->User_model->updatePass($old_password, $new_password);
			if($result == 1){
				$data['message'] = 'Successfully Updated';
				$data['code'] = 2;
				echo json_encode($data);
			}else{
				$data['message'] = 'Invalid Password';
				$data['code'] = 3;
				echo json_encode($data);
			}
		}
	}
}
