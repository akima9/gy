<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('encryption');
	}

	public function add_content_view()
	{
		$this->load->view('header');
		$this->load->view('add_content_view');
	}//End add_content_view()

	public function add_content()
	{
		$data['content_title'] = $this->input->post('content_title');
		$data['contents'] = $this->input->post('contents');
		$data['user_id'] = $this->session->userdata('user_id');

		$this->load->model('Board_model');
		$this->Board_model->insert_content($data);

		redirect(base_url('index.php/welcome/index'), 'refresh');
	}//End add_content()

	public function get_content_view($data)
	{
		$this->load->model('Board_model');
		$content_data['contents'] = $this->Board_model->get_content($data);

		$this->load->view('board_view', $content_data);
	}

	/*public function add_user()
	{
		$data['user_id'] = $this->input->post('user_id');

		if (!function_exists('password_hash')) {
			$this->load->helper('password');
		}//end if

		//$hash = password_hash($this->input->post('user_pw'), PASSWORD_BCRYPT);
		$hash = password_hash($this->input->post('user_pw'), PASSWORD_DEFAULT);
		$data['user_pw'] = $hash;

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

		$this->load->model('User_model');
		$result = $this->User_model->log_in($data);

		if (password_verify($data['user_pw'], $result->USER_PW)) {
			echo "일치";
			$newdata = array(
					'user_id'=>$result->USER_ID,
					'is_login'=>TRUE
				);
			$this->session->set_userdata($newdata);
			var_dump($this->session->all_userdata());
			redirect(base_url('index.php/welcome/index'),'refresh');
		} else {
			echo "불일치";
			$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
			var_dump($this->session->all_userdata());
			//redirect(base_url('index.php/welcome/login_view'), 'refresh');
		}//End if
	}//End log_in()

	public function log_out(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/welcome/index'),'refresh');
	}//End log_out()*/

}
