<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_alumni');
        $this->load->helpers('my_helper');
        if ($this->session->userdata('status_alumni')!='login') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('alumni/dashboard');
    }

    public function data_diri()
    {
        $this->load->view('alumni/data_diri/data_diri');
    }

    public function bekerja()
    {
        $data['user'] = $this->m_alumni->get('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $this->load->view('alumni/data_diri/bekerja/bekerja', $data);
    }

}