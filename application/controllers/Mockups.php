<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mockups extends CI_Controller {

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
        $this->load->model('Mockup_model');
    }

	public function index(){
		if(isset($_SESSION['u_id'])){
			$this->load->view('mockup_view');
        }else{
            redirect('Login/index');
        }
	}

	public function get_all_mockups(){
		$data = $this->Mockup_model->get_all_mockups();
        echo json_encode($data);
	}

	public function getMockupStatus(){
		$id = $this->input->post('projectid');
		$data = $this->Mockup_model->get_mockup_status($id);
        echo json_encode($data);
	}

	public function do_upload(){
		$config['upload_path'] = './files/';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;
 
        $this->load->library('upload', $config);
 		$file_element_name = 'userfile';
 		print_r($file_element_name);
        // if (!$this->upload->do_upload($file_element_name))
        // {
        //     $status = 'error';
        //     $msg = $this->upload->display_errors('', '');
        // }
        // else
        // {
        //     $data = $this->upload->data();
        //     $file_id = $this->files_model->insert_file($data['file_name']);
        //     if($file_id)
        //     {
        //         $status = "success";
        //         $msg = "File successfully uploaded";
        //     }
        //     else
        //     {
        //         unlink($data['full_path']);
        //         $status = "error";
        //         $msg = "Something went wrong when saving the file, please try again.";
        //     }
        // }
        // @unlink($_FILES[$file_element_name]);

  //       $config['upload_path']="./upload";
  //       $config['allowed_types']='gif|jpg|png';
  //       $this->load->library('upload',$config);
  //       $upload_data = $this->upload->data();
		// $file_name = $upload_data['file_name'];
		// print_r($upload_data);
        // if($this->upload->do_upload("file")){
	       //  $data = array('upload_data' => $this->upload->data());
	       //  $data1 = array(
		      //   'menu_id' => $this->input->post('selectmenuid'),
		      //   'submenu_id' => $this->input->post('selectsubmenu'),
		      //   'imagetitle' => $this->input->post('imagetitle'),
		      //   'imgpath' => $data['upload_data']['file_name']
		      //   );  
	       //  // $result= $this->Admin_model->save_imagepath($data1);
        
	       //  if ($result == TRUE) {
	       //      echo "true";
	       //  }
        // }else{
        // 	echo "else";
        // }

     }
}
