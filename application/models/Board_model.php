<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert_content($data)
	{
		$arr = array(
			'content_title' => $data['content_title'],
			'contents' => $data['contents'],
			'cr_user_id' => $data['user_id'],
			'cr_time' => date("Y-m-d H:i:s"),
			'mody_time' => date("Y-m-d H:i:s"),
			'view_cnt' => 0
		);
		$this->load->database();
		$this->db->insert('t_board',$arr);
		$this->db->close();
	}//End insert_user()

	public function get_contents()
	{
		$this->load->database();
		$result = $this->db->query('SELECT @ROWNUM:=@ROWNUM+1 ROW_NUM, A.CONTENT_CD, A.CONTENT_TITLE, A.CONTENTS, A.CR_USER_ID, A.CR_TIME, A.VIEW_CNT FROM T_BOARD A, (SELECT @ROWNUM:=0) R WHERE 1=1')->result();
		$this->db->close();

		return $result;
	}//End get_contents()

	public function get_content($data)
	{
		$this->load->database();

		$sql = "UPDATE T_BOARD SET VIEW_CNT = VIEW_CNT + 1 WHERE CONTENT_CD = '".$data."'";
		$this->db->query($sql);

		$query = $this->db->query("SELECT CONTENT_CD, CONTENT_TITLE, CONTENTS, CR_USER_ID, CR_TIME, VIEW_CNT FROM T_BOARD WHERE CONTENT_CD = '".$data."'" );
		$result = $query->row();

		$this->db->close();

		return $result;
	}
}