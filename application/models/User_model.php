<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert_user($data)
	{
		$arr = array(
			'user_id' => $data['user_id'],
			'user_pw' => $data['en_user_pw'],
			'cr_time' => date("Y-m-d H:i:s"),
			'mody_time' => date("Y-m-d H:i:s")
		);
		$this->load->database();
		$this->db->insert('t_user',$arr);
		$this->db->close();
	}
}