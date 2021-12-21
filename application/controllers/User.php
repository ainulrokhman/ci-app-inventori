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

    public function login()
    {
        if ($this->INPUT) {
            if ($this->User_model->getUser($this->INPUT)) {
                $this->session->set_userdata('logged_in', true);
                redirect(base_url('welcome'));
            } else {
                $this->session->set_flashdata('notify', "<div class='alert alert-success'>User tidak ada!</div>");
                redirect(base_url('user/login'));
            }
        }
        return $this->load->view('user/login');
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        // notify('info', 'logged out');
        redirect(base_url('user/login'));
    }
}
