<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Invoices extends CI_Controller{
    public function index(){
        $this->load->view('includes/header');
        $this->load->view('main');
        $this->load->view('includes/footer');
    }
    public function new_invoice(){
        $this->load->view('includes/header');
        $this->load->view('main');
        $this->load->view('includes/footer');
    }
}
?>