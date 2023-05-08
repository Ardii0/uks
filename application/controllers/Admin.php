<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('is_login')!=TRUE) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('dashboard/dashboard');
    }
}