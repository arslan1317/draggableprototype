<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class User_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function insertEmployee($data){  
        return $this->db->insert('users',$data);
    }

    public function loginUser($username, $password){
        //$this->db->where(array('username' = >$username, 'password' => $password));
        $query = $this->db->get_where('users', array('u_email' => $username, 'u_pass' => $password));
        if($query->num_rows() == 1){
            foreach ($query->result() as $row)
            {
                if($row->status == 1){
                    $userData = array(
                        'u_id' => $row->u_id,
                        'u_fname' => $row->u_fname,
                        'u_lname' => $row->u_lname,
                        'u_email' => $row->u_email,
                        'path'    => $row->path,
                        'logged_in'=> TRUE
                    );
                    $this->session->set_userdata($userData);
                    return 1;
                }else{
                    return 2;
                }
            }
        }else{
            return 3;
        }
    }

    public function sendEmail($receiver){
        $from = "draggableprototype@gmail.com";    //senders email address
        $subject = 'Verify email address';  //email subject
        
        //sending confirmEmail($receiver) function calling link to the user, inside message body
        $message = 'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
        <a href=\'http://localhost:8080/draggableprototype/Register/confirmEmail/'.md5($receiver).'\'>http://localhost:8080/draggableprototype/Register/confirmEmail/'. md5($receiver) .'</a><br><br>Thanks';
        
        
        
        //config email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = 'draggable123';  //sender's password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 
        
        $this->load->library('email', $config);
        $this->email->initialize($config);
        //send email
        $this->email->from($from);
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            return true;
        }else{
            return false;
        }
        
       
    }
    
    //activate account
    function verifyEmail($key){
        $data = array('status' => 1);
        $this->db->where('md5(u_email)',$key);
        return $this->db->update('users', $data);    //update status as 1 to make active user
    }

    function insert_images($image_data = array()){
        $path = base_url()."uploads/profile/".$image_data['file_name'];
        $id = $this->session->userdata('u_id');
        $this->session->set_userdata('path', $path);
        $this->db->set('path', $path);
        $this->db->where('u_id', $id);
        $this->db->update('users');
    }

    function get_image($id){
        $query = $this->db->select('path')
                ->where('u_id', $id)
                ->get('users');
        foreach ($query->result() as $row)
        {
            $this->session->set_userdata('path', $row->path);
            return $row->path;
        }
    }

    function updateName($first_name, $last_name){
        $id = $this->session->userdata('u_id');
        $this->db->set('u_fname', $first_name);
        $this->db->set('u_lname', $last_name);
        $this->db->where('u_id', $id);
        $this->db->update('users');
        $this->session->set_userdata('u_fname', $first_name);
        $this->session->set_userdata('u_lname', $last_name);
    }
    // Done by Mirza
        function updatePass($old_password, $new_password){
        $id = $this->session->userdata('u_id');
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('u_pass', md5($old_password));
        $this->db->where('u_id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $this->db->set('u_pass', md5($new_password));
            $this->db->where('u_id', $id);
            $this->db->update('users');
            return true;
        }else{
            return false;
        }

    }

    public function get_detail_project_notification(){
        $this->db->select('*');
        $this->db->from('assigns');
        $this->db->join('users', 'users.u_id = assigns.a_by');
        $this->db->join('projects', 'projects.p_id = assigns.p_id');
        $this->db->join('tasks', 'tasks.t_id = assigns.t_id');
        $this->db->where('assigns.u_id', $this->session->userdata('u_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function get_single_notification($id){
        $this->db->select('*');
        $this->db->from('assigns');
        $this->db->join('users', 'users.u_id = assigns.a_by');
        $this->db->join('projects', 'projects.p_id = assigns.p_id');
        $this->db->join('tasks', 'tasks.p_id = projects.p_id');
        $this->db->where('assigns.u_id', $this->session->userdata('u_id'));
        $this->db->where('assigns.a_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function seen_the_notification($id){
        $this->db->set('seen', 1);
        $this->db->where('a_id', $id);
        $this->db->update('assigns');
        return true;
    }

    public function get_seen_project_notification(){
        $this->db->select('*');
        $this->db->from('assigns');
        $this->db->join('users', 'users.u_id = assigns.u_id');
        $this->db->join('projects', 'projects.p_id = assigns.p_id');
        $this->db->join('tasks', 'tasks.p_id = projects.p_id');
        $this->db->where('assigns.a_by', $this->session->userdata('u_id'));
        $this->db->where('assigns.seen', 1);
        $this->db->order_by("assigns.a_id", "dsc");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_accept_decline_assign(){
        $this->db->select("*");
        $this->db->from('assigns');
        $this->db->join('users', 'users.u_id = assigns.u_id');
        $this->db->join('projects', 'projects.p_id = assigns.p_id');
        $this->db->join('tasks', 'tasks.p_id = projects.p_id');
        $this->db->where('assigns.a_by', $this->session->userdata('u_id'));
        $this->db->order_by("assigns.a_id", "dsc");
        $query = $this->db->get();
        return $query->result();
    }

    public function message_assign_by(){
        $this->db->set('a_by_seen', 1);
        $this->db->where('a_by', $this->session->userdata('u_id'));
        $this->db->update('assigns');
        return true;
    }
    
    public function seen_notification($id){
        $this->db->set('u_seen', 1);
        $this->db->where('p_id', $id);
        $this->db->where('u_id', $this->session->userdata('u_id'));
        $this->db->update('projects');
        return true;
    }
    
    public function get_all_created_project(){
        $this->db->select("*");
        $this->db->from('projects');
        $this->db->join('users', 'projects.s_id = users.u_id', 'left');
        $this->db->where('projects.u_id', $this->session->userdata('u_id'));
        $this->db->order_by("projects.p_id", "dsc");
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $results) {
            $results->task = $this->getAllTask($results->p_id );
        }
        return $result;
    }
    
    public function getAllTask($id){
        $this->db->select("*");
        $this->db->from('tasks');
        $this->db->join('assigns', 'assigns.t_id = tasks.t_id', 'left');
        $this->db->join('users', 'users.u_id = assigns.u_id', 'left');
        $this->db->where('tasks.p_id', $id);
        $this->db->order_by("tasks.t_type");
        $query = $this->db->get();
        return $query->result();
    }
}
?>