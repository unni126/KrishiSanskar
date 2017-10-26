<?php

class LoginModel extends CI_Model {
    //put your code here
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }
        
        public function Login($userName, $password , $isAdmin)
        {            
            if($isAdmin){
                $username = $this->input->post('username');
		$password = $this->input->post('password');
		//if($loginConfig['Use MD5 Encryption']) $password = md5($password);
		
		$query = $this->db->query("SELECT * FROM scmadmusers WHERE username='$username' AND password='$password' AND active = 1");
		if ($query->num_rows() == 1) {			
			$data = array("id"=>$query->row()->id,"username"=>$query->row()->username , "IsAuthenticated" => true , "IsAdmin" => true);
                        $this->session->set_userdata('scmadmin_session', $data);
                        return true;
		}else{
                        return false;
		}                
            }
            else{
                return false;
            }
        }
}
