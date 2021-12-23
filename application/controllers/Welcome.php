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
		$data = [
			"user" => $this->USER,
			'title' => 'Dashboard',
		];
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
	}
}
