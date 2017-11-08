<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author U54550
 */
class Account extends CI_Controller {
    function __construct()
    {
        parent::__construct();        
        $this->load->model('LoginModel');
        $this->load->library('grocery_CRUD'); 
        $this->load->helper('url');    
    }
    
    public function index(){
        $this->load->view('SCM/login');
    }
    public function login() {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);        
        $success = $this->LoginModel->login($username, $password, true);
        if($success)
        {         
            redirect('/scm/home/');   
        }
        else{
            $this->load->view('SCM/login');
        }
    }   
    
    public function logout() {
        $this->LoginModel->Logout();
        redirect('/scm/account/'); 
    }  
}
