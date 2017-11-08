<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author U54550
 */
class Profile extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        //$this->load->library('grocery_CRUD');   
        $this->load->model('userprofile');
        $this->load->helper('url');
    }
    
    
   

      
    //put your code here
    public function  index(){
        //$crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        //$crud->set_table('userprofile'); 
        //$output = $crud->render();        
        //$output['title'] = 'Profile';
        
       $data['profile'] = $this->userprofile->GetUserProfiles();
        
        
       
       
       //$result =  implode(',', $output);
        
        //$this->load->view('listheader', $output);
        $this->load->view('userprofile',$data);
        //$this->load->view('listfooter', $result);
        
    }
}
