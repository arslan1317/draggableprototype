<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Project_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function add_project($data){  
        return $this->db->insert('projects',$data);
    }

    public function get_all_project(){
        $this->db->select("*"); 
        $this->db->from('projects');
        $this->db->where('u_id', $this->session->userdata('u_id'));
        $query = $this->db->get();
        return $query->result();
    }

}
?>