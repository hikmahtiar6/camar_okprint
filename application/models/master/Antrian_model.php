<?php

class Antrian_model extends CI_Model
{
	function get_antrian()
	{
		$date = date('Y-m-d');

		$db = $this->db;

		$last_antrian = (int) $db->where('DATE(waktu)', $date)->get('tbl_antrian')->num_rows()+1;

		return $last_antrian;
	}

	function add($customer_id, $antrian)
	{
		$this->db->insert('tbl_antrian', [
			'antrian_id' => null,
			'customer_id' => $customer_id,
			'antrian' => $antrian,
			'waktu' => date('Y-m-d H:i:s'),
			'status' => 'ANTRIAN'
		]);
	}

	function generate_antrian($account)
	{
		$date = date('Y-m-d');
		$db = $this->db;
		$last_antrian = $db->select('MAX(antrian) AS last_antrian')->where('DATE(waktu)', $date)->get('tbl_antrian')->row()->last_antrian;
		$antrian = (int) substr($last_antrian, 6, 9)+1;
		$antrian_format = date('dmy').str_pad($antrian, 4, '0', STR_PAD_LEFT);
		$db->insert('tbl_antrian', [
			'customer_id' => $account->customer_id,
			'antrian' => $antrian_format,
			'waktu' => date('Y-m-d H:i:s'),
			'status' => 'ANTRIAN'
		]);
		return $antrian_format;
	}

	function get()
	{
		$db = $this->db;

		$data = $db->select('*')->from('tbl_antrian')->join('tbl_customer', 'tbl_antrian.customer_id = tbl_customer.customer_id')->get()->result();

		return $data;
	}
}
