<?php
/**
 * Invoice Controller
 */
class Invoice extends CI_Controller
{
	/**
	 * constructor
	 */
	public function __construct()
	{
		parent::__construct();

		// check session
		$this->auth->_is_authentication();
		$this->load->model('master/customer_model');
		$this->load->model('master/antrian_model');
	}

	public function nonspk()
	{
		$customers = $this->db->query("SELECT * FROM tbl_customer")->result();
		$barangs = $this->db->query("SELECT * FROM tbl_barang")->result();
		$this->twiggy->set('barangs', $barangs);
		$this->twiggy->set('customers', $customers);
		$this->twiggy->template('admin/invoice/nonspk/index')->display();
	}

	public function nonspk_save()
	{
		$post = $this->input->post();

		$params = [
			'tgl_jual' => $post['tgl_jual'],
			'no_jual' => $post['no_jual'],
			'customer_id' => $post['customer_id'],
			'spk' => $post['no_spk'],
			'status' => 'ANTRIAN',
			'total' => $post['total'],
			'discount' => $post['discount'],
			'charge' => $post['charge'],
			'netto' => $post['netto'],
			'bayar' => $post['bayar'],
			'kembali' => $post['sisa']
		];

		$this->db->insert('tbl_header_jual', $params);
		$header_jual_id = $this->db->insert_id();

		$x = 0;
		foreach($post['kode'] as $detail) {
			if ('' === $detail) {
				continue;
			}

			$params_detail = [
				'header_jual_id' => $header_jual_id,
				'kode' => $detail,
				'nama_barang' => $post['nama_barang'][$x],
				'keterangan' => $post['keterangan'][$x],
				'satuan' => $post['satuan'][$x],
				'qty' => $post['qty'][$x],
				'p' => $post['p'][$x],
				'l' => $post['l'][$x],
				'harga' => $post['harga'][$x],
				'disc' => $post['disc'][$x],
				'discrp' => $post['discrp'][$x],
				'jumlah' => $post['jumlah'][$x]
			];

			$this->db->insert('tbl_details_jual', $params_detail);
			$x++;
		}

		$this->output->set_output(json_encode([
			'status' => 'success',
			'message' => 'Transaksi Berhasil'
		]));
	}
}
