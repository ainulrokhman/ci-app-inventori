<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getData()
    {
        return $this->db->get('v_total_stok')->result_array();
    }
    public function getStokById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('v_total_stok')->row_array();
    }
}
