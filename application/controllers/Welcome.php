<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');

		$this->load->model('Board_model');
		$content_data['contents'] = $this->Board_model->get_contents();

		$this->load->view('header');
		$this->load->view('index', $content_data);
	}

	public function login_view()
	{
		$this->load->helper('url');

		$this->load->view('header');
		$this->load->view('login_view');
	}

	public function add_user_view()
	{
		$this->load->helper('url');

		$this->load->view('header');
		$this->load->view('add_user_view');
	}

}
