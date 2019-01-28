<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Chat_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function get_project_chat(){
    	$this->db->select('*');
        $this->db->from('assigns');
        // $this->db->join('users', 'users.u_id = assigns.a_by');
        $this->db->join('projects', 'projects.p_id = assigns.p_id');
        // $this->db->join('tasks', 'tasks.t_id = assigns.t_id');
        $this->db->group_by('assigns.p_id');
        $this->db->order_by('assigns.a_id', 'desc');
        // $this->db->where('assigns.a_by', $this->session->userdata('u_id'));
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $results) {
            
        }

        return $result;
    }
}
?>