<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    protected $INPUT;

    public function __construct()
    {
        parent::__construct();
        $this->INPUT = $this->input->post();
        $this->load->model("User_model");
    }

    public function index()
    {
        $input = $this->input->post('id');
        if (isset($input)) {
            $data = $this->User_model->getUserbyId($input);
            echo json_encode($data);
        } else {
            $data = [
                "user" => $this->session->userdata('logged_in'),
                "title" => "Manajemen User",
                "data" => $this->User_model->getData(),
                "css" => ["https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"],
            ];
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('template/footer');
        }
    }

    public function login()
    {
        if ($this->INPUT) {
            $user = $this->User_model->getUser($this->INPUT);
            if ($user['login']) {
                $this->session->set_userdata('logged_in', $user);
                redirect(base_url('welcome'));
            } else {
                $this->session->set_flashdata('notify', "<div class='alert alert-danger'>${user['pesan']}</div>");
                redirect(base_url('user/login'));
            }
        }
        return $this->load->view('user/login');
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>Logout berhasil!</div>");
        redirect(base_url('user/login'));
    }

    public function add()
    {
        $this->db->insert('user', $this->INPUT);
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>User berhasil ditambahkan!</div>");
        redirect(base_url('user'));
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("user");
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>User berhasil dihapus!</div>");
        redirect(base_url('user'));
    }

    public function update()
    {
        $this->db->where('id', $this->INPUT['id']);
        $this->db->update("user", $this->INPUT);
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>User berhasil diubah!</div>");
        redirect(base_url('user'));
    }
}
