<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wireframes extends CI_Controller {

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
        $this->load->model('Wireframe_model');
        }

	function index(){
            if(isset($_SESSION['u_id'])){
                $this->load->view('wireframe_view');
            }else{
                redirect('Login/index');
            }
	}
    
    function get_all_methods(){
	$data = $this->Wireframe_model->get_all_methods();
        echo json_encode($data);
    }
}
