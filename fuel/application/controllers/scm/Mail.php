<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mail extends BaseController {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('MailModel');
    }

    public function inbox() {
        if(isset($_SESSION['scmadmin_session'])){
            $adminsession = $this->session->userdata('scmadmin_session');
            $isAuthenticated = $adminsession['IsAuthenticated'];
            $isAdmin = $adminsession['IsAdmin'];
            if ($isAuthenticated && $isAdmin) {
                $data['Mails'] = $this->MailModel->get();
                $this->load->view('SCM/_header');     
                $this->load->view('SCM/inbox',$data);
                $this->load->view('SCM/_footer');
            } 
        }
        else {
            redirect('/scm/account/', 'refresh');            
        }        
    }
    
    public function compose() {
        if(isset($_SESSION['scmadmin_session'])){
            $adminsession = $this->session->userdata('scmadmin_session');
            $isAuthenticated = $adminsession['IsAuthenticated'];
            $isAdmin = $adminsession['IsAdmin'];
            if ($isAuthenticated && $isAdmin) {
                $this->load->view('SCM/_header');     
                $this->load->view('SCM/compose');
                $this->load->view('SCM/_footer');
            } 
        }
        else {
            redirect('/scm/account/', 'refresh');            
        }        
    }
    
    public function read() {
        if(isset($_SESSION['scmadmin_session'])){
            $adminsession = $this->session->userdata('scmadmin_session');
            $isAuthenticated = $adminsession['IsAuthenticated'];
            $isAdmin = $adminsession['IsAdmin'];
            if ($isAuthenticated && $isAdmin) {
                $this->load->view('SCM/_header');     
                $this->load->view('SCM/read');
                $this->load->view('SCM/_footer');
            } 
        }
        else {
            redirect('/scm/account/', 'refresh');            
        }        
    }
}
