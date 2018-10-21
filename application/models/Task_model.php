<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Task_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function add_task($data){  
        return $this->db->insert('tasks',$data);
    }

    public function get_all_task(){
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
        $this->db->where('projects.p_active', 0);
        $this->db->where('projects.u_id', $this->session->userdata('u_id'));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_task_by_id($id){
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->join('projects', 'tasks.p_id = projects.p_id');
        $this->db->where('projects.u_id', $this->session->userdata('u_id'));
        $this->db->where('tasks.t_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_task_by_id($taskid, $taskprojectname, $tasktype, $taskstart, $taskend, $taskdetails){
        $this->db->set('p_id', $taskprojectname);
        $this->db->set('t_type', $tasktype);
        $this->db->set('t_start', $taskstart);
        $this->db->set('t_end', $taskend);
        $this->db->set('t_detail', $taskdetails);
        $this->db->where('t_id', $taskid);
        $this->db->update('tasks');
        return $this->db->affected_rows();
    }
}
?>