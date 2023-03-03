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

    // Nilai
    public function data_keselurahan_nilai_siswa()
    {
        $this->load->view('nilai/data_nilai/data_keselurahan_nilai_siswa');
    }

    public function modul_data_nilai_siswa()
    {
        $this->load->view('nilai/data_nilai/modul_data_nilai_siswa');
    }
    
    // Data Nilai
    public function entry_nilai()
    {
        $this->load->view('nilai/nilai/entry_nilai');
    }

    public function modul_input_nilai()
    {
        $this->load->view('nilai/nilai/modul_input_nilai');
    }
}