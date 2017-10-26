<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProductCategory extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('ProductCategoryModel');
    }

    public function index() {
        
        $data['productCategory'] = (array) $this->ProductCategoryModel->get();
        
        $this->load->view('SCM/_header');     
        $this->load->view('SCM/productcategory',$data);
        $this->load->view('SCM/_footer');
    }
    
    public function create(){
        
        $data = array
        (
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description'),
                'CreatedBy' => 'Admin',
                'CreatedDate' => date("Y/m/d"),
                'UpdatedBy' => 'Admin',
                'UpdatedDate' => date("Y/m/d")
        );
	//$this->db->insert('product_category',$data);
        
        $this->ProductCategoryModel->add($data);
        
        redirect('/scm/productcategory/', 'refresh');    
    }
    
}
