<?php
    class invoice_model extends CI_Model{
        function __construct() { 
            parent::__construct(); 
         } 
   

        public function create_invoice($data) { 
            if ($this->db->insert("customer_invoice", $data)) { 
                return $this->db->insert_id();
            }else{
                return false;
            }
        } 
        public function insert_invoice_items($data1) { 
            if ($this->db->insert("items", $data1)) { 
            return true; 
            } 
        } 
        function invoices_view($rowno,$rowperpage,$sortBy,$order) {
            $query = $this->db->select("invoice_id,customer_name, customer_mobile, customer_email, grand_total")
                    ->from('customer_invoice')
                    ->order_by($sortBy,$order)
                    ->limit($rowno,$rowperpage)
                    ->get();
            return $query->result();
        }   

        public function delete($invoice_id) { 
            if ($this->db->delete("items", "invoice_id = ".$invoice_id)) { 
                $this->db->delete("customer_invoice", "invoice_id = ".$invoice_id);
               return true; 
            } 
         } 
         public function get_count() {
             return $this->db->count_all('customer_invoice');
         }
    
    }
?>