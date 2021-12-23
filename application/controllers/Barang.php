<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    protected $USER;
    public function __construct()
    {
        parent::__construct();
        $this->USER = $this->session->userdata('logged_in');
        if (!isset($this->USER)) {
            redirect(base_url('user/login'));
        }
    }

    public function stok()
    {
        $this->load->model('Barang_model');

        $edit = $this->input->post("id");
        if ($edit != null) {
            $data = $this->Barang_model->getStokById($edit);
            echo json_encode($data);
        } else {
            $data = [
                'user' => $this->USER,
                'title' => 'Stok Barang',
                'data' => $this->Barang_model->getData(),
                'css' => ["https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"],
                'js' => [
                    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js",
                    "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js",
                    base_url('assets/js/tabelstok.js'),
                ],
            ];
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('barang/stok');
            $this->load->view('template/footer', $data);
        }
    }

    public function addbarang()
    {
        $data = $this->input->post();
        $this->db->insert("barang", $data);
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>Data berhasil ditambahkan!</div>");
        redirect(base_url('barang/stok'));
    }

    public function updatebarang()
    {
        $update = $this->input->post();
        $this->db->where('id', $update['id']);
        $this->db->update("barang", $update);
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>Data berhasil diubah!</div>");
        redirect(base_url('barang/stok'));
    }

    public function hapusbarang($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("barang");
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>Data berhasil dihapus!</div>");
        redirect(base_url('barang/stok'));
    }

    public function masuk()
    {
        $this->load->model('Barang_model');
        $this->load->model('Masuk_model');

        $edit = $this->input->post("id");

        if ($edit != null) {
            $data = $this->Masuk_model->getDataById($edit);
            echo json_encode($data);
        } else {
            $data = [
                'user' => $this->USER,
                'title' => 'Data Barang Masuk',
                "barang" => $this->Barang_model->getData(),
                'data' => $this->Masuk_model->getData(),
                'css' => ["https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"],
                'js' => [
                    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js",
                    "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js",
                    base_url('assets/js/tabelbrgmsk.js'),
                ],
            ];
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('barang/barang-masuk');
            $this->load->view('template/footer', $data);
        }
    }

    public function addmasuk()
    {
        $data = $this->input->post();
        $this->db->insert("brg_masuk", $data);
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>Data berhasil ditambahkan!</div>");
        redirect(base_url('barang/masuk'));
    }

    public function updatemasuk()
    {
        $update = $this->input->post();
        $this->db->where('id', $update['id']);
        $this->db->update("brg_masuk", $update);
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>Data berhasil diubah!</div>");
        redirect(base_url('barang/masuk'));
    }

    public function hapusmasuk($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("brg_masuk");
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>Data berhasil dihapus!</div>");
        redirect(base_url('barang/masuk'));
    }

    public function keluar()
    {
        $this->load->model('Barang_model');
        $this->load->model('Keluar_model');

        $edit = $this->input->post("id");

        if ($edit != null) {
            $data = $this->Keluar_model->getDataById($edit);
            echo json_encode($data);
        } else {
            $data = [
                'user' => $this->USER,
                'title' => 'Data Barang Keluar',
                "barang" => $this->Barang_model->getData(),
                'data' => $this->Keluar_model->getData(),
                'css' => ["https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"],
                'js' => [
                    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js",
                    "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js",
                    base_url('assets/js/tabelbrgklr.js'),
                ],
            ];
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('barang/barang-keluar');
            $this->load->view('template/footer', $data);
        }
    }

    public function addkeluar()
    {
        $this->load->model('Barang_model');
        $data = $this->input->post();
        $stok = $this->Barang_model->getStokById($data['id_barang']);

        // var_dump($stok);

        if ($data['jml'] <= $stok['total']) {
            $this->db->insert("brg_keluar", $data);
            $this->session->set_flashdata('notify', "<div class='alert alert-success'>Data berhasil ditambahkan!</div>");
        } else {
            $this->session->set_flashdata('notify', "<div class='alert alert-danger'>Gagal!, Jumlah keluar melebihi stok!</div>");
        }

        redirect(base_url('barang/keluar'));
    }

    public function updatekeluar()
    {
        $update = $this->input->post();
        $this->db->where('id', $update['id']);
        $this->db->update("brg_keluar", $update);
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>Data berhasil diubah!</div>");
        redirect(base_url('barang/keluar'));
    }

    public function hapuskeluar($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("brg_keluar");
        $this->session->set_flashdata('notify', "<div class='alert alert-success'>Data berhasil dihapus!</div>");
        redirect(base_url('barang/keluar'));
    }
}
