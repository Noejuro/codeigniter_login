<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('UploadUsers');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('Register');
	}

	public function create()
	{
		$name = $this->input->post('name'); 
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');

		$config = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|alpha'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email',
				'errors' => array(
					'required' => '%s is invalid' 
				),
			),
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE){
				$this->load->view('Register');
		}
		else{
			$data = array(
				'name' => $name ,
				'email' => $email ,
				'password' => $password
			);

			if(!$this->UploadUsers->create($data)){
				$data['msg'] = "Ocurrió un error, intenta más tarde";
				$this->load->view('Register',$data);
			}
			
			$data['msg'] = "Registrado correctamente";
			$query = $this->db->get('test');
			$data = $query->result();
			$registers = array('registers' => $data );
			$this->load->view('show_users', $registers);
		}

		
	}
}
