<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Invoices extends CI_Controller{
    function __construct() { 
        parent::__construct(); 
     } 
    public function index(){
        $last_row['id_row'] = $this->db->order_by('invoice_id',"desc")->limit(1)->get('customer_invoice')->row()->invoice_id+1;
        $this->load->view('includes/header');
        $this->load->view('main', $last_row);
        $this->load->view('includes/footer');
    }
    public function new_invoice() { 
        $this->load->model('invoice_model');
        $data = array( 
            'customer_name' => $this->input->post('cname'), 
            'customer_mobile' => $this->input->post('mob'),
            'customer_email' => $this->input->post('email'),
            'customer_house' => $this->input->post('house'),
            'customer_street' => $this->input->post('street'),
            'customer_pin' => $this->input->post('pin'),
            'customer_town' => $this->input->post('town'),
            'customer_country' => $this->input->post('country'),
            'sub_total' => $this->input->post('sub_total'),
            'invoice_tax' => $this->input->post('tax'),
            'grand_total' => $this->input->post('grand_total'),  
            'created_date'=>date('Y-m-d H:i:s',time()) 
         );
        $this->invoice_model->insert($data); 
        redirect('Invoices');
        $this->load->view('includes/header');
        $this->load->view('main');
        $this->load->view('includes/footer');
    }
}
?>