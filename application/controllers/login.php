<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('auth/login_rules'));
        $this->load->model('Auth');
    }

    public function index() {
        $this->load->view('login');        
    }

    public function validate() {
        $this->form_validation->set_error_delimiters('', '');   
        $rules = getLoginRules();
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE){
            $errors = array(
                'email' => form_error('email'),
                'password' => form_error('password'),
            );
            echo json_encode($errors);
            $this->output->set_status_header(400);
        }
        else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if($res = $this->Auth->login($email, $password)) {
                $data = array(
                    'id' => $res->idTest ,
                    'name' => $res->name ,
                    'email' => $res->email,
                    'is_logged' => true
                );
                
                $this->session->set_userdata($data);
                echo json_encode( array('url' => base_url('users')) );
            } else {
                echo json_encode(array('message' => 'User does not exist' ));
                $this->output->set_status_header(401);
                exit;
            }
            
        }

    }

    public function logout() {
        $vras = array('id', 'name', 'email', 'is_logged');
        $this->session->unset_userdata($vars);
        $this->session->sess_destroy();
        redirect('login');
    }
}
