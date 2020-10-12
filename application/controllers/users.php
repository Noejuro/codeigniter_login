<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library(array('session'));
		$this->load->model('UploadUsers');
	}

	public function index()
	{
		if($this->session->userdata('is_logged')) {
			$query = $this->db->get('test');
			$data = $query->result();
			$registers = array('registers' => $data );
			$this->load->view('show_users', $registers);
		} else {
			redirect('login');
		}
    }
}