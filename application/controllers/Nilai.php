<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_nilai');
        // $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_nilai')!='login') {
            redirect(base_url('Login'));
        }
    }
    
    public function index()
    {
        $this->load->view('nilai/dashboard');

    }
}