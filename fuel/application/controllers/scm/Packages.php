<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Packages
 *
 * @author U54550
 */
class Packages  extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        $cars["cars"] = array("Volvo", "BMW", "Toyota");
        $this->load->view('Admin/Packages',$cars);
    }
}
