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
        $this->db->join('users', 'users.u_id = projects.s_id');
        $this->db->where('projects.u_id', $this->session->userdata('u_id'));
        $this->db->where('users.status', 1);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_project_by_id($id){
        $this->db->select("*"); 
        $this->db->from('projects');
        $this->db->join('users', 'users.u_id = projects.s_id');
        $this->db->where('projects.u_id', $this->session->userdata('u_id'));
        $this->db->where('users.status', 1);
        $this->db->where('projects.p_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update_project_by_id($projectid, $projectname, $projectstype, $pojectstart, $projectend, $projectsupervisor, $projectdetails){
        $this->db->set('p_name', $projectname);
        $this->db->set('p_type', $projectstype);
        $this->db->set('p_start', $pojectstart);
        $this->db->set('p_end', $projectend);
        $this->db->set('p_detail', $projectdetails);
        $this->db->set('s_id', $projectsupervisor);
        $this->db->where('p_id', $projectid);
        $this->db->update('projects');
        return $this->db->affected_rows();
    }
}
?>