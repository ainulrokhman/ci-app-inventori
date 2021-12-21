<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_model extends CI_Model
{
    public function getData()
    {
        return $this->db->get('v_total_stok')->result_array();
    }
}
