<?php

class LoginModel extends CI_Model {
    
    public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }
        
        public function Login($isAdmin)
        {            
            if($isAdmin){
                $username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$query = $this->db->query("SELECT * FROM ks_admin WHERE username='$username' AND password='$password' AND active = 1");
		if ($query->num_rows() == 1) {			
			$data = array("Email"=>$query->row()->Email , "IsAuthenticated" => true , "IsAdmin" => true);
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
        
        public function Logout(){
            if(isset($_SESSION['scmadmin_session'])){
                unset($_SESSION['scmadmin_session']);
            }
        }
}
