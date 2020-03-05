<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Invoices extends CI_Controller{
    function __construct() { 
        parent::__construct(); 
        $this->load->library('pagination');
        $this->load->model('invoice_model');
        $this->load->library('session');
     } 
    public function index(){
        $data['id_row'] = $this->db->order_by('invoice_id',"desc")->limit(1)->get('customer_invoice')->row()->invoice_id+1;
        $this->load->view('includes/header');
        $this->load->view('main', $data);
        $this->load->view('includes/footer');
    }

    public function list($rowno=1,$sortBy="customer_name",$order="asc"){
        // $col = ($this->uri->segment(4)) ? $this->uri->segment(4) : 'customer_name'; 
        $keyword = ($this->uri->segment(6)) ? $this->uri->segment(6) : ''; 
        $rowperpage = 2;
        // Row position 
        if($rowno != 0){ 
            $rowno = ($rowno-1) * $rowperpage; 
        }
         // Set session
        if($this->uri->segment('4') != NULL ){
        $this->session->set_userdata(array("sortBy"=>$sortBy));
        $this->session->set_userdata(array("order"=>$order));
        }
        else
        {
        if($this->session->userdata('sortBy') != NULL){
            $sortBy = $this->session->userdata('sortBy');
            $order = $this->session->userdata('order');
        }
        }
        $allcount = $this->invoice_model->get_count();
        $posts_record = $this->invoice_model->invoices_view($rowno, $rowperpage,$sortBy,$order);
        $config = array();
        $config["base_url"] = site_url('Invoices/list');
        $config["total_rows"] =$allcount;
        $config["per_page"] =  $rowperpage;
        $config['use_page_numbers'] = TRUE;
        $config["uri_segment"] = 3;
        $config['reuse_query_string'] = TRUE;
        $config['suffix'] = "/$sortBy/".$this->uri->segment(5)."/$keyword";
        $this->pagination->initialize($config);
        // $invoices_list = $this->invoice_model->invoices_view($config['per_page'],$this->uri->segment(3));
       
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $posts_record;
        $data['row'] = $rowno;
        $data['order'] = $order;

        $this->load->view('includes/header');
        $this->load->view('invoices_view', $data);
        $this->load->view('includes/footer');
    }
    
    public function new_invoice() { 
        $this->load->model('invoice_model');
        echo "<pre>"; 
      
        $item_name = $this->input->post('product');
        $item_qty = $this->input->post('qty');
        $item_price = $this->input->post('price');
        $item_total = $this->input->post('total');
        $product_items=array();
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
         $invoice_id=$this->invoice_model->create_invoice($data);
         if($invoice_id){
             if($item_name){
             foreach ($item_name as $key => $value) {
                array_push($product_items,array(
                    'invoice_id'=>$invoice_id,
                    'item_name' =>  $item_name[$key],
                    'quantity' => $item_qty[$key],
                    'price' => $item_price[$key],
                    'total' => $item_total[$key]
                ));
             }
             }
            //  print_r($product_items);die;
             $this->db->insert_batch('items', $product_items); 
        redirect('Invoices');
         }
        $this->load->view('includes/header');
        $this->load->view('main');
        $this->load->view('includes/footer');
        
    }

        public function delete_invoice() { 
        $this->load->model('invoice_model'); 
        $invoice_id = $this->uri->segment('3'); 
        $this->invoice_model->delete($invoice_id); 
        $query_items = $this->db->get("items");
        $query = $this->db->get("customer_invoice");
        $query_items = $this->db->get("items");
        redirect('Invoices/list');
        $data['records'] = $query->result(); 
        $this->load->view('includes/header',$data); 
        $this->load->view('Invoices/list',$data); 
        $this->load->view('includes/footer',$data); 
     } 
}
?>