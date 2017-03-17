<?php
/**
 * Class Login Model
 */
class Login_model extends CI_Model
{
	const TABLE = 'tbl_user';

	/**
	 * constructor
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * get user by session id
	 */
	public function get_user_by_session_id()
	{
		$sql = $this->db;

		$sql->select('*');
		$sql->from(static::TABLE);
		$sql->where('user_id', $this->session->userdata('user_id'));
		$get = $sql->get();
		$row = $get->row();

		if($row)
		{
			$data = array(
				'username' => $row->username,
				'role'     => $row->level,
			);

			return $data;
		}
		else
		{
			return false;
		}
	}

	/**
	 * process login action
	 */
	public function get_account($username, $password)
	{
		$sql = $this->db;

		$sql->select('*');
		$sql->from('tbl_customer_service');
		$sql->where('username', $username);
		$sql->where('password', $password);

		$get = $sql->get();

		return $get->row();
	}

	/**
	 * insert account
	 */
	public function insert_account($data)
	{
		return $this->db->insert(static::TABLE, $data);
	}

}

?>
