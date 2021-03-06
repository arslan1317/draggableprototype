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
        $this->db->select('projects.p_name, chat.*')
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
                $result[$i]->myid = $this->session->userdata('u_id');
        }
        return $result;  
    }

    public function get_user_name($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('u_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function send_message($id,$message_text,$date, $seen){

        $message = array(
            'message_text' => $message_text,
            'ch_id' => $id,
            'sent_by' => $this->session->userdata('u_id'),
            'message_time' => $date,
        );

        $results = $this->db->insert('message', $message);
        return $this->getAllChatById($id, $seen);
    }

    function getAllChatById($id, $seen){
        $this->update_seen($id, $seen);
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('ch_id', $id);
        $this->db->order_by('message_id', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $row)
        {
            $row->name = $this->get_user_name($row->sent_by);
            $row->w_seen = $this->get_user_name($row->w_seen);
            $row->m_seen = $this->get_user_name($row->m_seen);
            $row->s_seen = $this->get_user_name($row->s_seen);
            $row->pr_seen = $this->get_user_name($row->pr_seen);
            $row->u_seen = $this->get_user_name($row->u_seen);
            $row->myId = $this->session->userdata('u_id');
        }
        return $result;
    }

    function update_seen($id, $seen){
        $seen_status = '';

        if($seen == 'u_seen'){
            $seen_status = 'u_seen';
        }
        else if ($seen == 's_seen') {
             $seen_status = 's_seen';
        }
        elseif ($seen == 'w_seen') {
            $seen_status = 'w_seen';
        }
        elseif ($seen == 'm_seen') {
           $seen_status = 'm_seen';
        }
        elseif ($seen == 'pr_seen') {
            $seen_status = 'p_seen';
        }
        $this->db->set($seen_status, $this->session->userdata('u_id'));
        $this->db->where('ch_id', $id);
        $this->db->update('message');
    }

    function name_of_the_user_chat($id, $check){
        $this->db->select('*');
        $this->db->from('chat');
        $this->db->where('ch_id', $id);
        $query = $this->db->get();
        $ret = $query->row();
        if($check == 1){
            //supervisor
            return $this->get_user_name($ret->s_id);
        }else if($check == 2){
            //wireframe
            return $this->get_user_name($ret->w_id);
        }else if($check == 3){
            //mockup
            return $this->get_user_name($ret->m_id);
        }else if($check == 4){
            //prototype
            return $this->get_user_name($ret->pr_id);
        }else{
            //owner
            return $this->get_user_name($ret->u_id);
        }
    }

}
?>