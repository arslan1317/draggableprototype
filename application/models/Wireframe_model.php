<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Wireframe_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function get_all_methods(){  
        $this->db->select('*');
        $this->db->from('assigns');
        $this->db->join('projects', 'assigns.p_id = projects.p_id');
        $this->db->join('tasks', 'tasks.t_id = assigns.t_id');
        $this->db->where('assigns.u_id', $this->session->userdata('u_id'));
        $this->db->where('assigns.a_accept', 1);
        $this->db->where('tasks.t_type', 1);
        $this->db->order_by("assigns.a_id", "dsc");
        $query = $this->db->get();
        return $query->result();
    }
}

?>