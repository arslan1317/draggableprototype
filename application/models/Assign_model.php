<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Assign_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function add_assign($data){  
        return $this->db->insert('assigns',$data);
    }

    public function get_all_assign(){
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->join('projects', 'tasks.p_id = projects.p_id');
        $this->db->where('projects.u_id', $this->session->userdata('u_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function get_project(){
        $this->db->select("*"); 
        $this->db->from('projects');
        $this->db->where('projects.u_id', $this->session->userdata('u_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user($data){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->like('u_email', $data);
        $this->db->where('status', 1);
        $this->db->where('u_id !=', $this->session->userdata('u_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function get_task_type($data){
        $this->db->select('t_type');
        $this->db->from('tasks');
        $this->db->where('p_id', $data);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_assign_work(){
            $this->db->select('*')
                ->from('assigns')
                ->join('users', 'users.u_id = assigns.u_id')
                ->join('projects', 'projects.p_id = assigns.p_id')
                ->join('tasks', 'tasks.t_id =assigns.t_id')
                ->where('assigns.a_by', $this->session->userdata('u_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function check_project_task($p_id, $t_id){
        $this->db->select('*');
        $this->db->from('assigns');
        $this->db->where('p_id', $p_id);
        $this->db->where('t_id', $t_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function accept_notification($id){
        $this->db->set('a_accept', 1);
        $this->db->where('a_id', $id);
        $this->db->update('assigns');
        return true;
    }

    public function decline_notification($id){
        $this->db->set('a_accept', 2);
        $this->db->where('a_id', $id);
        $this->db->update('assigns');
        return true;
    }
    
    public function get_project_having_task(){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->join('tasks', 'projects.p_id = tasks.p_id');
        $this->db->where('projects.u_id', $this->session->userdata('u_id'));
        $this->db->group_by('projects.p_id'); 
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_assign_by_id($id){
        $this->db->select('*')
                ->from('assigns')
                ->join('users', 'users.u_id = assigns.u_id')
                ->join('projects', 'projects.p_id = assigns.p_id')
                ->join('tasks', 'tasks.t_id =assigns.t_id')
                ->where('assigns.a_by', $this->session->userdata('u_id'))
                ->where('assigns.a_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function check_assign_project_model(){
        $id = $this->session->userdata('u_id');
        $this->db->select('*');
        $this->db->from('assigns');
        $this->db->join('tasks', 'tasks.t_id = assigns.t_id');
        $this->db->join('projects', 'projects.p_id = assigns.p_id');
        $this->db->join('users', 'users.u_id = assigns.a_by');
        $this->db->where('assigns.u_id', $this->session->userdata('u_id'));
        $this->db->order_by('assigns.a_id', "desc");
        $query = $this->db->get();
        return $query->result();
    }
}
?>