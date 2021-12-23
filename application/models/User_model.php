<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getData()
    {
        $user = $this->db->get('user')->result_array();
        for ($i = 0; $i < count($user); $i++) {
            $user[$i]['role'] = $this->_getRole($user[$i]['role_id']);
        }
        return $user;
    }
    public function getUser($data)
    {
        $user = $this->db->get_where('user', ['username' => $data['username']])->row();

        if (isset($user)) {
            if ($data['password'] === $user->password) {
                $role = $this->_getRole($user->role_id);
                $data = [
                    "nama" => $user->nama_lengkap,
                    "role" => $role,
                    "login" => true,
                ];
                return $data;
            }

            return [
                "login" => false,
                "pesan" => "Password salah!",
            ];
        }

        return [
            "login" => false,
            "pesan" => "User tidak ditemukan!",
        ];
    }

    public function insert($data)
    {
        $this->db->insert('user', $data);
    }

    public function getUserbyId($id)
    {
        $user = $this->db->get_where('user', ["id" => $id])->row_array();
        $user['role'] = $this->_getRole($user['role_id']);
        return $user;
    }

    private function _getRole($id)
    {
        $role = $this->db->get_where('user_role', ['id' => $id])->row();
        return $role->role;
    }
}
