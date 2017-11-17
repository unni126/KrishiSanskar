<?php

class MailModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get() {        
        $query = $this->db->get('ks_mailbox');
        return $query->result();
    }
    
    function add($data) {
        try{
            $this->db->insert('ks_mailbox',$data );
        }
        catch (Exception $e){
             if ($e->errorInfo[1] == 1062) 
             {
                 return  "Duplicate Category. Please check the values!";
             }             
        }
    }
    
    function delete($id) {
        try{
            $this->db->where('Id', $id);
            $this->db->delete('ks_mailbox');
        }
        catch (Exception $e){
                 return  "Unable to delete this item!";
        }
    }
    
    function getById($id) {
        try{
            return $this->db->get_where('ks_mailbox', array('id' => $id))->row();
        }
        catch (Exception $e){
                 return  "Unable to delete this item!";
        }
    }
    
    function update($data, $id) {
        try{
            $this->db->where('Id', $id);
            $this->db->update('ks_mailbox', $data);
            return true;
        }
        catch (Exception $e){
                 return  "Unable to delete this item!";
        }
    }
    
    function changeStatus($data, $id) {
        try{
            $this->db->where('Id', $id);
            $this->db->update('ks_mailbox', $data);
            return true;
        }
        catch (Exception $e){
                 return  "Unable to delete this item!";
        }
    }
}
