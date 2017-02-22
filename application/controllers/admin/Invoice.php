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
	}

	public function nonspk()
	{
		$cust_data = $this->customer_model->get_data();

		$this->twiggy->set('cust_data', $cust_data);
		$this->twiggy->template('admin/invoice/nonspk/index')->display();
	}

}
?>