<?php defined('BASEPATH') OR exit ('No direct script allowed');
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index() {
     #if user is already loggin in , automatically redirect to maain page
     if($this->aauth->is_loggedin()){
         redirect('main');
     }
     $this->load->view('includes/header');
     $this->load->view('login');
     $this->load->view('includes/footer');
    }
   public function login(){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('user','Username','trim|required');
      $this->form_validation->set_rules('pass','Password','trim|required');
      
      if($this->form_validation->run()){
          $user = $this->input->post('user');
          $pass = $this->input->post('pass');
          
          if ($this->aauth->login($user,$pass)){
              redirect('main');
          }else{
              $this->session->set_flashdata('login_error',$this->aauth->get_errors_array()[0]);
          }
      }
      $this->load->view('template/header');
      $this->load->view('Main');
      $this->load->view('template/footer');
   }
   public function logout(){
       $this->aauth->logout();
       redirect('Auth');
   }
}