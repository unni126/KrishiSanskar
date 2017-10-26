<?php

class ProductsModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get() {
        $this->load->database();
        $query = $this->db->get('products');
        return $query->result();
    }
    
    function add($data) {
        $this->load->database();
        $this->db->insert('products',$data );
    }
}
