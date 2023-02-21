<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perpustakaan');
        // $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_perpustakaan')!='login') {
            redirect(base_url('Login'));
        }
    }
    
    public function index()
    {
        $this->load->view('perpustakaan/dashboard');

    }
    public function rak_buku()
    {
        $this->load->view('perpustakaan/rak_buku/rak_buku');
    }
    public function data_buku()
    {
        $this->load->view('perpustakaan/data_buku/data_buku');
    }
    public function kategori_buku()
    {
        $this->load->view('perpustakaan/kategori_buku/kategori_buku');
    }
    public function data_anggota()
    {
        $this->load->view('perpustakaan/data_anggota/data_anggota');
    }
    public function peminjaman()
    {
        $this->load->view('perpustakaan/peminjaman/peminjaman');
    }
    public function pengembalian()
    {
        $this->load->view('perpustakaan/pengembalian/pengembalian');
    }
    public function laporan()
    {
        $this->load->view('perpustakaan/laporan/laporan');
    }
}