<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Activity_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function insert_activity($data){  
        return $this->db->insert('activities',$data);
    }

    // public function get_all_Activity(){
    //     $this->db->select("*"); 
    //     $this->db->from('activities');
    //     $this->db->where('done_by_id', $this->session->userdata('u_id'));
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function get_activity_name_by_project($id){
        $this->db->select("*"); 
        $this->db->from('activities');
        $this->db->where('done_by_id', $this->session->userdata('u_id'));
        $this->db->where('p_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>