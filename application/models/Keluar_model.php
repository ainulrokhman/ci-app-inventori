<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluar_model extends CI_Model
{
    public function getData()
    {
        return $this->db->get('v_brg_keluar')->result_array();
    }
    public function getDataById($id)
    {
        return $this->db->get_where('brg_keluar', ["id" => $id])->row_array();
    }
}
