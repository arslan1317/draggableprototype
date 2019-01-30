<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Supervisor_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function check_supervisor_assign_model(){
        $id = $this->session->userdata('u_id');
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->join('users', 'users.u_id = projects.u_id');
        $this->db->where('projects.s_id', $this->session->userdata('u_id'));
        $this->db->order_by('projects.p_id', "desc");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function accept_supervisor($id){
        $this->db->set('s_status', 1);
        $this->db->where('p_id', $id);
        $this->db->update('projects');
        $return = $this->db->affected_rows();
        $this->insertIdToChat($id);
        return $return;
    }
    
    public function insertIdToChat($id){
        $this->db->set('s_id', $this->session->userdata('u_id'));
        $this->db->where('p_id', $id);
        $this->db->update('chat');
    }

    public function reject_supervisor($id){
        $this->db->set('s_status', 2);
        $this->db->where('p_id', $id);
        $this->db->update('projects');
        $result = $this->db->affected_rows();
        $this->removeIdToChat($id);
        return $result;
    }
    
    public function removeIdToChat($id){
        $this->db->set('s_id', null);
        $this->db->where('p_id', $id);
        $this->db->update('chat');
    }

    public function check_Accept_Or_Reject_Supervisor(){
        $id = $this->session->userdata('u_id');
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->join('users', 'users.u_id = projects.s_id');
        $this->db->where('projects.u_id', $this->session->userdata('u_id'));
        $this->db->where('projects.s_status !=', 0);
//        $this->db->order_by('projects.p_id', "desc");
        $query = $this->db->get();
        return $query->result();
    }
}
?>