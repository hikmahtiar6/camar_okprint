<?php
/**
 * Model Master Customer
 */
class Customer_model extends CI_Model {

	const TABLE = 'tbl_customer';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_data()
	{
		$sql = $this->db;

		$sql->select('*');
		$sql->from(static::TABLE);

		$get = $sql->get();
		return $get->result();
	}

	public function get_data_by_id($id)
	{
		$sql = $this->db;

		$sql->select('*');
		$sql->from(static::TABLE);
		$sql->join('tbl_customer_group', 'tbl_customer_group.customer_group_id = tbl_customer.customer_group_id');
		$sql->where('customer_id', $id);

		$get = $sql->get();
		return $get->row();
	}

	public function save($data)
	{
		return $this->db->insert(static::TABLE, $data);
	}

	public function get_account($username, $password)
	{
		$sql = $this->db;

		$sql->select('*');
		$sql->from(static::TABLE);
		$sql->where('cust_id', $username);
		$sql->where('nama', $password);

		$get = $sql->get();

		return $get->row();
	}

	public function get_by_username($username)
	{
		$db = $this->db;

		$db->select('*');
		$db->from(static::TABLE);
		$db->where('cust_id', $username);

		$get = $db->get();

		return $get->row();
	}
}

?>
