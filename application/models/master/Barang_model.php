<?php

class Barang_model extends CI_Model
{
    public function find_all()
    {
        return $this->db->get('tbl_barang')->result();
    }
}
