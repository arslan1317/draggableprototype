<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    public function validateUser(){
        $user_name = $this->security->xss_clean($this->input->post('user-name'));
        $user_password = $this->security->xss_clean($this->input->post('user-password'));
        $hashed_password = md5($user_password);
        $this->db->where('u_email', $user_name);
        $this->db->where('u_pass', $hashed_password);
        $query = $this->db->get('users');
        if($query->num_rows() == 1)
        {
            $row = $query->row();
            $data = array(
                    'u_id' => $row->u_id,
                    'u_fname' => $row->u_fname,
                    'u_lname' => $row->u_lname,
                    'u_email' => $row->u_email,
                    'u_role' => $row->u_role,
                    'validated' => true
                    );
            $this->load->library('session');
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }
}
?>