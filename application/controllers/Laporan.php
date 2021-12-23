<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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

    public function masuk()
    {
        $this->load->model('Masuk_model');
        $data = [
            'user' => $this->USER,
            'title' => 'Laporan Barang Masuk',
            'data' => $this->Masuk_model->getData(),
            'css' => ["https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"],
            'js' => [
                "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js",
                "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js",
                "https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js",
                "https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js",
                "https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js",
                base_url('assets/js/laporan.js'),
            ],
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('laporan/barang-masuk');
        $this->load->view('template/footer', $data);
    }
    public function keluar()
    {
        $this->load->model('Keluar_model');
        $data = [
            'user' => $this->USER,
            'title' => 'Laporan Barang Keluar',
            'data' => $this->Keluar_model->getData(),
            'css' => ["https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"],
            'js' => [
                "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js",
                "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js",
                "https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js",
                "https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js",
                "https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js",
                base_url('assets/js/laporan.js'),
            ],
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('laporan/barang-keluar');
        $this->load->view('template/footer', $data);
    }
}
