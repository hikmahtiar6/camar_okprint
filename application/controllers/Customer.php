<?php
/**
 * Constroller Customer
 */
class Customer extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/customer_model');
	}

	public function index()
	{
		$this->twiggy->display('default/customer/index');
	}

	public function daftar()
	{
		$this->twiggy->display('default/customer/daftar');
	}

	public function save()
	{
		$cust_id = $this->input->post('cust_id');
		$nama = $this->input->post('nama');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$jenis_customer = $this->input->post('jenis_customer');
		$cs = $this->input->post('cs');

		$data = array(
			'cust_id'        => $cust_id,
			'nama'           => $nama,
			'telepon'        => $telepon,
			'email'          => $email,
			'alamat'         => $alamat,
			'kota'           => $kota,
			'type'			 => $jenis_customer,
			'cs'			 => $cs,
		);

		$save = $this->customer_model->save($data);
		if($save)
		{
			$response = array(
				'message' => 'Berhasil Daftar Customer',
				'status'  => 'success'
			);
		}
		else
		{
			$response = array(
				'message' => 'Gagal Daftar Customer',
				'status'  => 'error'
			);	
		}

		return $this->output->set_output(json_encode($response));
	}

	public function login()
	{
		$username = $this->input->post('cust_id');
		$password = $this->input->post('nama');

		$get_data_user = $this->customer_model->get_account($username, $password);
		if($get_data_user)
		{
			$this->session->set_userdata('user_id', $get_data_user->cust_id);
			$response = array(
				'status'  => 'success',
				'message' => 'Anda berhasil login'
			);
		}
		else
		{
			$response = array(
				'status'  => 'error',
				'message' => 'Customer ID atau nama salah, silahkan coba kembali'
			);	
		}

		$this->output->set_output(json_encode($response));
	}

}
?>