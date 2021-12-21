<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url('user/login'));
		}
	}
	public function index()
	{
		$data = [
			'title' => 'Dashboard',
		];
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
	}
}
