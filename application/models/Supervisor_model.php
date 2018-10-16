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
}
?>