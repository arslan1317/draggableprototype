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
        $this->db->select('t_type, t_id');
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
        $this->db->where('projects.p_active', 0);
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
    
    public function accept_assign($id){
        $this->db->set('a_accept', 1);
        $this->db->where('a_id', $id);
        $this->db->update('assigns');
        $result = $this->db->affected_rows();
        $this->insertIdToChat($id);
        return $result;
    }

    public function insertIdToChat($id){
       $this->db->select('tasks.t_type , assigns.p_id')
            ->from('assigns')
            ->join('tasks', 'tasks.t_id =assigns.t_id')
            ->where('assigns.a_id', $id);
        $query = $this->db->get();
        $return = $query->result();
        if ($return[0]->t_type == 1) {
            $this->db->set('w_id', $this->session->userdata('u_id'));
            $this->db->where('p_id', $return[0]->p_id);
            $this->db->update('chat');           
        }
        elseif ($return[0]->t_type == 2) {
           $this->db->set('m_id', $this->session->userdata('u_id'));
            $this->db->where('p_id', $return[0]->p_id);
            $this->db->update('chat');           
        }
        elseif ($return[0]->t_type == 3) {
           $this->db->set('pr_id', $this->session->userdata('u_id'));
            $this->db->where('p_id', $return[0]->p_id);
            $this->db->update('chat');         
        }
        return $return;
    }

    
    public function reject_assign($id){
        $this->db->set('a_accept', 2);
        $this->db->where('a_id', $id);
        $this->db->update('assigns');
        $result = $this->db->affected_rows();
        $this->removeIdToChat($id);
        return $result;
    }

    public function removeIdToChat($id){
         $this->db->select('tasks.t_type , assigns.p_id')
            ->from('assigns')
            ->join('tasks', 'tasks.t_id =assigns.t_id')
            ->where('assigns.a_id', $id);
        $query = $this->db->get();
        $return = $query->result();
        if ($return[0]->t_type == 1) {
            $this->db->set('w_id', null);
            $this->db->where('p_id', $return[0]->p_id);
            $this->db->update('chat');           
        }
        elseif ($return[0]->t_type == 2) {
           $this->db->set('m_id', null);
            $this->db->where('p_id', $return[0]->p_id);
            $this->db->update('chat');           
        }
        elseif ($return[0]->t_type == 3) {
           $this->db->set('pr_id', null);
            $this->db->where('p_id', $return[0]->p_id);
            $this->db->update('chat');         
        }
        return $return;
    }
    
    public function update_status($id){
        $this->db->set('a_status', 1);
        $this->db->where('a_id', $id);
        $this->db->update('assigns');
        return $this->get_update_record($id);
    }
    
    public function get_update_record($id){
        $this->db->select('*');
        $this->db->from('assigns');
        $this->db->where('a_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
?>