<?php

class ProductCategoryModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get() {
        $this->load->database();
        $query = $this->db->get('product_category');
        return $query->result();
    }
    
    function add($data) {
        $this->load->database();
        $this->db->insert('product_category',$data );
    }
}
