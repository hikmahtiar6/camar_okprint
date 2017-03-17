<?php
/**
 * Transaction Controller
 */
class Dashboard extends CI_Controller
{
	/**
	 * constructor
	 */
	public function __construct()
	{
		parent::__construct();

		// check session
		$this->auth->_is_authentication();
		$this->load->model('master_model');
		$this->load->model('master/antrian_model');
	}

	public function index()
	{
		$this->twiggy->set('antrians', $this->antrian_model->get());
		$this->twiggy->template('admin/dashboard/antrian')->display();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('customer');
	}

}
?>
