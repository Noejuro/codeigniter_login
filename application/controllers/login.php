<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
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
                echo json_encode(array('message' => 'Bienvenido' ));
                
            } else {
                echo json_encode(array('message' => 'User does not exist' ));
                $this->output->set_status_header(401);
                exit;
            }
            
        }

    }
}
