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
		//$data['user_pw'] = $this->input->post('user_pw');
		if (!function_exists('password_hash')) {
			$this->load->helper('password');
		}//end if
		$hash = password_hash($this->input->post('user_pw'), PASSWORD_BCRYPT);
		$data['user_pw'] = $hash;

		/*$key = bin2hex($this->encryption->create_key(16));
		$this->encryption->initialize(array('key'=>$key));
		$data['en_user_pw'] = $this->encryption->encrypt($data['user_pw']);*/

		$this->load->model('User_model');
		$this->User_model->insert_user($data);

		redirect(base_url('index.php/welcome/index'),'refresh');

	}//End add_user()

	public function user_id_dupe_check()
	{
		$user_id = $this->input->post('user_id');

		$this->load->model('User_model');
		$result = $this->User_model->user_id_dupe_check($user_id);

		if (empty($result)) { //중복 아닐 경우
			$data = array('res_data'=>'Y');
		} else { //중복일 경우
			$data = array('res_data'=>'N');
		}//End if

		$this->output->set_content_type('text/json');
		$this->output->set_output(json_encode($data));
	}//End user_id_dupe_check()

	public function log_in()
	{
		$data['user_id'] = $this->input->post('user_id');
		$data['user_pw'] = $this->input->post('user_pw');

		if (!function_exists('password_hash')) {
			$this->load->helper('password');
		}//end if
		$hash = password_hash($this->input->post('user_pw'), PASSWORD_BCRYPT);
		$data['user_pw'] = $hash;

		/*$key = bin2hex($this->encryption->create_key(16));
		$this->encryption->initialize(array('key'=>$key));
		$data['en_user_pw'] = $this->encryption->encrypt($data['user_pw']);*/

		$this->load->model('User_model');
		$result = $this->User_model->log_in($data);

		var_dump($data);
		var_dump($result);
		/*if ($result) {
			$newdata = array(
					'user_id'=>$result->user_id,
					'logged_in'=>TRUE
				);
			$this->session->set_userdata($newdata);
			echo "로그인됨";
		} else {
			echo "로그인안됨";
		}*/

		//var_dump($result);
		//$this->User_model->insert_user($data);

		//redirect(base_url('index.php/welcome/index'),'refresh');
	}

}
