<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

            $this->load->model('master/barang_model');
    }

    public function index()
    {
        $this->twiggy->template('admin/barang/index')->display();
    }
}
