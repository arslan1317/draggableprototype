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
        $this->db->select('*')
                ->from('chat')
                ->join('projects','projects.p_id = chat.p_id')
                ->where('chat.u_id ', $this->session->userdata('u_id'))
                ->or_where('chat.s_id', $this->session->userdata('u_id'))
                ->or_where('chat.w_id', $this->session->userdata('u_id'))
                ->or_where('chat.m_id', $this->session->userdata('u_id'))
                ->or_where('chat.pr_id', $this->session->userdata('u_id'));
        $query = $this->db->get();
        $result = $query->result();

        for ($i=0; $i<count($result) ; $i++) { 
                $result[$i]->owner = $this->get_user_name($result[$i]->u_id);
                $result[$i]->supervisor = $this->get_user_name($result[$i]->s_id);
                $result[$i]->wireframe = $this->get_user_name($result[$i]->w_id);
                $result[$i]->mockup = $this->get_user_name($result[$i]->m_id);
                $result[$i]->prototype = $this->get_user_name($result[$i]->pr_id);
        }
        return $result;  
    }
}
?>