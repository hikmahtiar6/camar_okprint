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
	}

	public function nonspk()
	{
		$this->twiggy->template('admin/invoice/nonspk/index')->display();
	}

}
?>