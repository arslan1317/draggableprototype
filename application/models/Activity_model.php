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

    public function get_activity_for_mockups($id){
        $this->db->select("*"); 
        $this->db->from('activities');
        $this->db->where('p_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_activity($id, $task){
        $this->db->select("*"); 
        $this->db->from('activities');
        $this->db->join('projects', 'projects.p_id = activities.p_id');
        $this->db->where('activities.p_id', $id);
        $this->db->where('activities.t_type', $task);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insert_wireframe_code($id, $code){
        $this->db->set('act_code', $code);
        $this->db->where('act_id', $id);
        $this->db->update('activities');
        return $this->db->affected_rows();
    }

    public function insert_mockup_code($id, $code, $bg_color){
        $this->db->set('mockup_code', $code);
        $this->db->set('mockup_back_color', $bg_color);
        $this->db->where('act_id', $id);
        $this->db->update('activities');
        return $this->get_the_updated_mockup($id);
    }

    function get_the_updated_mockup($id){
        $this->db->select("*"); 
        $this->db->from('activities');
        $this->db->where('act_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_html_of_activity($id){
        $this->db->select("*"); 
        $this->db->from('activities');
        $this->db->where('act_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_first_activity($value, $id){
        $this->db->set('first_act', $value);
        $this->db->where('p_id', $id);
        $this->db->update('activities');

        $this->load->model('Prototype_model', 'prototype');
        $result = $this->prototype->get_all_prototype_layout($id);
    
        return $result;
    }
}
?>