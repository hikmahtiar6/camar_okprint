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

	public function nonspk($antrian_id)
	{
		$antrian_data = $this->antrian_model->get_by_id($antrian_id);

		$this->twiggy->set('antrian_data', $antrian_data);
		$this->twiggy->template('admin/invoice/nonspk/index')->display();
	}

	public function nonspk_save()
	{
		return $this->input->post();
	}
}
