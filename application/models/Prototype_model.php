<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Prototype_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

    }

    public function get_all_prototype(){  
        $this->db->select('*');
        $this->db->from('assigns');
        $this->db->join('projects', 'assigns.p_id = projects.p_id');
        $this->db->join('tasks', 'tasks.t_id = assigns.t_id');
        $this->db->where('assigns.u_id', $this->session->userdata('u_id'));
        $this->db->where('assigns.a_accept', 1);
        $this->db->where('tasks.t_type', 3);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_all_prototype_layout($id){
        $this->db->select('*');
        $this->db->from('activities');
        $this->db->join('projects', 'projects.p_id = activities.p_id');
        $this->db->where('projects.p_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}

?>