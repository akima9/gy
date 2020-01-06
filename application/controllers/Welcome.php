<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('index');
	}

	public function login_view()
	{
		$this->load->view('login_view');
	}

	public function add_user_view()
	{
		$this->load->view('add_user_view');
	}

}
