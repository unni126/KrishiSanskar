<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* The MX_Controller class is autoloaded as required */

class BaseController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('session');
        
        $cook  = $this->input->cookie('ci_session', true);
        
        if(!$this->isAuthenticated()){
           redirect('/scm/account/', 'refresh');  
        }
    }
    
    
    private function isAuthenticated(){
        if(!isset($_SESSION['scmadmin_session'])){
            return false;
        }        
        return true;
    }
}