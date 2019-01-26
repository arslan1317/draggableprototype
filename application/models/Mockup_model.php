<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Mockup_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

    }

    public function get_all_mockups(){  
        $this->db->select('*');
        $this->db->from('assigns');
        $this->db->join('projects', 'assigns.p_id = projects.p_id');
        $this->db->join('tasks', 'tasks.t_id = assigns.t_id');
        $this->db->where('assigns.u_id', $this->session->userdata('u_id'));
        $this->db->where('assigns.a_accept', 1);
        $this->db->where('tasks.t_type', 2);
        $query = $this->db->get();
        $result = $query->result();
        // $reultP_id;
        // foreach ($result as $results) {
        //     $resultReturn = $this->checkWireframeDone($results->p_id);
        // }
        // if($resultReturn == null){
        //     return 2;
        // }else{
        //     return $result;
        // }

        return $result;
    }

    public function get_mockup_status($id){
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->join('assigns', 'tasks.t_id = assigns.t_id');
        $this->db->where('tasks.p_id', $id);
        $this->db->where('tasks.t_type', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function checkWireframeDone($p_id){
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->join('assigns', 'tasks.t_id = assigns.t_id');
        $this->db->where('tasks.p_id', $p_id);
        $this->db->where('tasks.t_type', 1);
        $this->db->where('assigns.a_status', 2);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}

?>