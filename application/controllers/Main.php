<?php defined('BASEPATH') OR exit ('No direct script allowed');
class Main extends CI_Controller{
    public function __construct(){
        parent::__construct();
        #if user is not logged in then redirect to login
        if (!$this->aauth->is_loggedin()){
            redirect('auth');
        }
    }
    public function index() {

        $this->load->view('template/header');
        $this->load->view('dashboard');
        $this->load->view('template/footer');
       }

    public function add_user(){
        $this->load->view('includes/header');
        $this->load->view('register');
        $this->load->view('includes/footer');
    }

    public function register(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user','Username','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
        $this->form_validation->set_rules('pass1','Password','trim|required');
        $this->form_validation->set_rules('pass2','Confirm Password','required|matches[pass1]');   
        
        if($this->form_validation->run()){
            $user = $this->input->post('user');
            $email = $this->input->post('email');
            $pass = $this->input->post('pass1');
            
            if ($this->aauth->create_user($email, $user, $pass)){
                $this->session->set_flashdata('register_success','New user has been register!');
            }else{
                $this->session->set_flashdata('register_error',$this->aauth->get_errors_array()[0]);
                redirect('Main/add_user');
            }

        }

          $this->add_user();
    }   
}