<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUser($data)
    {
        $user = $this->db->get_where('user', ['username' => $data['username']])->row();

        if (isset($user)) {
            return ($data['password'] === $user->password);
        }

        return false;
    }

    public function insert($data)
    {
        $this->db->insert('user', $data);
    }
}
