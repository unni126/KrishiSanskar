<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Products extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('ProductsModel');
        $this->load->model('ProductCategoryModel');
    }

    public function index() {        
        $data['products'] = (array) $this->ProductsModel->get();
        $data['productcategories'] = (array) $this->ProductCategoryModel->get();
        $this->load->view('SCM/_header');     
        $this->load->view('SCM/products' , $data);   
        $this->load->view('SCM/_footer');
    }
    
    public function create(){
        
        $data = array
        (
                'Name' => $this->input->post('name'),
                'Category' => $this->input->post('category'),
                'Price' => $this->input->post('price'),
                'Description' => $this->input->post('description'),
                'Image' => 'None',
                'Quantity' => $this->input->post('quantity'),
                'CreatedBy' => 'Admin',
                'CreatedDate' => date("Y/m/d"),
                'UpdatedBy' => 'Admin',
                'UpdatedDate' => date("Y/m/d")
        );
	$this->ProductsModel->add($data);
        
       redirect('/scm/products/', 'refresh');    
    }
}
