<?php

class Customer_service_model extends CI_Model
{
    public function authorize($cs_auth)
    {
        $db = $this->db;

        $check = (int) $db->where('auth', $cs_auth)->get('tbl_customer_service')->num_rows();

        return $check === 1 ? true : false;
    }
}
