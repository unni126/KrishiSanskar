<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProductCategory extends BaseController {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('ProductCategoryModel');
    }

    public function index($err = array()) {
        $data['productCategory'] = (array) $this->ProductCategoryModel->get();
        $data['error'] = $err;
        $this->load->view('SCM/_header');
        $this->load->view('SCM/productcategory', $data);
        $this->load->view('SCM/_footer');
        $this->load->view('SCM/_scripts_prodcategory');
    }

    //create product category
    public function create() {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $active = $this->input->post('active');
        $file = $_FILES["image"]['name'];
        if (!empty($file)) {
            $fileComponents = explode('.', $_FILES["image"]['name']);
            $ext = end($fileComponents);
        }
        if (!empty($name) && !empty($description)) {
            $fileName = random_string();
            $config['upload_path'] = './uploads/p01/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 100;
            $config['file_name'] = $fileName;
            $this->load->library('upload', $config);
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $this->upload->data();
            } else {
                $fileName = 'noimage';
                $ext = 'png';
            }

            $data = array
                (
                'Name' => $name, 'Description' => $description, 'Image' => $fileName, 'Ext' => $ext,
                'Active' => $active, 'CreatedBy' => 'Admin', 'CreatedDate' => date("Y/m/d"),
                'ModifiedBy' => 'Admin', 'ModifiedDate' => date("Y/m/d")
            );
            $this->ProductCategoryModel->add($data);
            $this->index();
        }
        else{
            $err = array('nameRequired'=> 'Name & Description are required');
            $this->index($err);
        }
    }

    public function edit() {
        try {
            $id = $this->input->post('edit_id');
            $name = $this->input->post('edit_name');
            $description = $this->input->post('edit_description');
            $active = $this->input->post('edit_active');

            $file = $_FILES["edit_image"]['name'];
            if (!empty($file)) {
                $fileComponents = explode('.', $_FILES["edit_image"]['name']);
                $ext = end($fileComponents);
            }
            if (!empty($name) && !empty($description)) {
                $fileName = random_string();
                $config['upload_path'] = './uploads/p01/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 100;
                $config['file_name'] = $fileName;
                $this->load->library('upload', $config);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('edit_image')) {
                    $this->upload->data();
                } 
            }
            $data = array
                (
                'Name' => $name, 'Description' => $description,
                'Active' => $active, 'Image' => $fileName, 'Ext' => $ext,
                'ModifiedBy' => 'Admin', 'ModifiedDate' => date("Y/m/d")
            );
            $this->ProductCategoryModel->update($data, $id);
             $this->index();
        } catch (Exception $ex) {
            $err = array($ex);
            $this->index($err);
        }
    }

    public function changestatus() {
        header('Content-Type: application/json');
        try {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $data = array
                (
                'Active' => $status, 'ModifiedBy' => 'Admin', 'ModifiedDate' => date("Y/m/d")
            );
            $this->ProductCategoryModel->changeStatus($data, $id);
            echo json_encode(array('result' => 'success'));
        } catch (Exception $ex) {
            echo json_encode(array('result' => 'fail'));
        }
    }

    public function view() {
        header('Content-Type: application/json');
        try {
            $id = $this->input->post('id');
            $data = $this->ProductCategoryModel->getById($id);
            echo json_encode($data);
        } catch (Exception $ex) {
            echo json_encode(array('result' => 'fail'));
        }
    }

    public function delete() {
        header('Content-Type: application/json');
        $result = array('result' => 'success');
        try {
            $id = $this->input->post('id');
            $this->ProductCategoryModel->delete($id);
            echo json_encode($result);
        } catch (Exception $ex) {
            echo json_encode(array('result' => 'fail'));
        }
    }

}
