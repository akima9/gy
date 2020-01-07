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
			'user_pw' => $data['user_pw'],
			'cr_time' => date("Y-m-d H:i:s"),
			'mody_time' => date("Y-m-d H:i:s")
		);
		$this->load->database();
		$this->db->insert('t_user',$arr);
		$this->db->close();
	}//End insert_user()

	public function user_id_dupe_check($user_id)
	{
		$this->load->database();
		$sql = "SELECT USER_ID FROM T_USER WHERE USER_ID = ?";
		$result = $this->db->query($sql, array($user_id))->result();
		$this->db->close();

		return $result;
	}//End user_id_dupe_check()

	public function log_in($data)
	{
		$this->load->database();
		$sql = "SELECT USER_ID, USER_PW FROM T_USER WHERE USER_ID = '".$data['user_id']."' AND USER_PW = '".$data['user_pw']."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
}