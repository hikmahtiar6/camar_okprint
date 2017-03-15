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
			'waktu' => date('Y-m-d H:i:s')
		]);
	}
}