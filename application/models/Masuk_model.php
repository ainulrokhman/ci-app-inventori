<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk_model extends CI_Model
{
    public function getData()
    {
        return $this->db->get('v_brg_masuk')->result_array();
    }
    public function getDataById($id)
    {
        return $this->db->get_where('brg_masuk', ["id" => $id])->row_array();
    }
}
