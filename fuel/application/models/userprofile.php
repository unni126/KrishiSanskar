<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userprofile
 *
 * @author U54550
 */
class userprofile extends CI_Model {
    //put your code here
    
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function GetUserProfiles()
        {
            $query = $this->db->get('userprofile');
            return $query->result_array();
        }
}
