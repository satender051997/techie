<?php
    class invoice_model extends CI_Model{
        function __construct() { 
            parent::__construct(); 
         } 
   

        public function insert($data) { 
            if ($this->db->insert("customer_invoice", $data)) { 
            return true; 
            } 
        } 
    }
?>