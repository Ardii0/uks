<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_akademik');
        // $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_akademik')!='login') {
            redirect(base_url('Login'));
        }
    }
    
    public function index()
    {
        $this->load->view('akademik/dashboard');

    }

    public function tahun_ajaran()
    {
        $this->load->view('akademik/tahun_ajaran/tahun_ajaran');
    }
    
    public function kelas()
    {
        $this->load->view('akademik/kelas/kelas');
    }

    public function jenjang()
    {
        $this->load->view('akademik/jenjang/jenjang');
    }
    
    public function guru()
    {
        $this->load->view('akademik/guru/guru');
    }
    
    public function siswa_pendaftaran()
    {
        $this->load->view('akademik/siswa/pendaftaran');
    }

    public function siswa_pembagian_kelas()
    {
        $this->load->view('akademik/siswa/pembagian_kelas');
    }

    public function siswa_data()
    {
        $this->load->view('akademik/siswa/data');
    }

    public function siswa_mutasi()
    {
        $this->load->view('akademik/siswa/mutasi');
    }

    public function pelajaran()
    {
        $this->load->view('akademik/pelajaran/mata_pelajaran');
    }

    public function jenis_pelajaran()
    {
        $this->load->view('akademik/pelajaran/jenis_pelajaran');
    }

}