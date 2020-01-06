<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('encryption');
	}

	public function add_user()
	{
		$data['user_id'] = $this->input->post('user_id');
		$data['user_pw'] = $this->input->post('user_pw');

		$key = bin2hex($this->encryption->create_key(16));
		$this->encryption->initialize(array('key'=>$key));
		$data['en_user_pw'] = $this->encryption->encrypt($data['user_pw']);

		$this->load->model('User_model');
		$this->User_model->insert_user($data);

		$this->load->view('header');
		var_dump($data);
	}

}
