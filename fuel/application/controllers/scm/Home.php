<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function index() {
        if(isset($_SESSION['scmadmin_session'])){
            $adminsession = $this->session->userdata('scmadmin_session');
            $isAuthenticated = $adminsession['IsAuthenticated'];
            $isAdmin = $adminsession['IsAdmin'];
            if ($isAuthenticated && $isAdmin) {
                $this->load->view('SCM/_header');     
                $this->load->view('SCM/home');
                $this->load->view('SCM/_footer');
            } 
        }
        else {
            redirect('/scm/account/', 'refresh');            
        }        
    }
}
