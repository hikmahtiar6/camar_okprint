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
		$sql->where('customer_id', $id);

		$get = $sql->get();
		return $get->row();
	}
}

?>