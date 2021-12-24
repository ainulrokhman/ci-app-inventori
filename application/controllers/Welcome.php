<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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

	public function index()
	{
		$this->load->model("Barang_model");
		$this->load->model("Keluar_model");
		$this->load->model("Masuk_model");
		$data = [
			"total_barang" => count($this->Barang_model->getData()),
			"transaksi_masuk" => count($this->Masuk_model->getData()),
			"transaksi_keluar" => count($this->Keluar_model->getData()),
			"user" => $this->USER,
			'title' => 'Dashboard',
		];
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('index');
		$this->load->view('template/footer');
	}
}
