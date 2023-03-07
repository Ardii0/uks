<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_keuangan');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_keuangan')!='login') {
            redirect(base_url());
        }
    }

    //Keuangan
    public function index()
    {
        $this->load->view('keuangan/dashboard');

    }

    //Anggaran
    public function anggaran()
    {
        $this->load->model('M_keuangan');
        $data['data_rencana_anggaran'] = $this->m_keuangan->get_all_data_rencana_anggaran('data_rencana_anggaran');
        $this->load->view('keuangan/anggaran/anggaran', $data);
    }

    public function tambah_anggaran()
    {
        $data['data_rencana_anggaran'] = $this->m_keuangan->get_all_data_rencana_anggaran('data_rencana_anggaran');
        $this->load->view('keuangan/anggaran/tambah_anggaran', $data);
    }

    public function aksi_tambah_anggaran()
    {
        $data = array
        (
            'nama_anggaran' => $this->input->post('nama_anggaran'),
            'awal_periode' => $this->input->post('awal_periode'),
            'akhir_periode' => $this->input->post('akhir_periode'),
            'pencatat' => 'Admin',
            'status' => 1,
            'tetapkan' => 0,
        );
        $masuk = $this->m_keuangan->tambah_anggaran('tabel_rencana_anggaran', $data);
        if ($masuk) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/tambah_anggaran'));
        }
    }

    public function edit_anggaran($id)
    {
        $data['data_rencana_anggaran']=$this->m_keuangan->edit_anggaran('tabel_rencana_anggaran', $id)->result();
        $this->load->view('keuangan/anggaran/edit_anggaran', $data);
    }

    public function aksi_edit_anggaran()
    {
        $data = array
        (
            'nama_anggaran' => $this->input->post('nama_anggaran'),
            'awal_periode' => $this->input->post('awal_periode'),
            'akhir_periode' => $this->input->post('akhir_periode'),
            'pencatat' => $this->input->post('pencatat'),
            'status' => $this->input->post('status'),
            'tetapkan' => $this->input->post('tetapkan'),
        );
        $masuk=$this->m_keuangan->edit_anggaran('tabel_rencana_anggaran', $data, array('id'=>$this->input->post('id')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/edit_anggaran'.$this->input->post('id')));
        }
    }

    //Akun
    public function akun()
    {
        $this->load->model('M_keuangan');
        // $data['data_akun'] = $this->m_keuangan->get_all_data_akun('data_akun');
        $this->load->view('keuangan/akun/akun');
    }

    //Dana
    public function dana()
    {
        $this->load->model('M_keuangan');
        // $data['data_akun'] = $this->m_keuangan->get_all_data_akun('data_akun');
        $this->load->view('keuangan/dana/dana');
    }

    //Jurnal
    public function jurnal()
    {
        $this->load->model('M_keuangan');
        // $data['data_akun'] = $this->m_keuangan->get_all_data_akun('data_akun');
        $this->load->view('keuangan/jurnal/jurnal');
    }

    //Laporan
    public function laporan()
    {
        $this->load->model('M_keuangan');
        // $data['data_akun'] = $this->m_keuangan->get_all_data_akun('data_akun');
        $this->load->view('keuangan/laporan/laporan');
    }

    //Pembayaran
    public function pembayaran()
    {
        $this->load->model('M_keuangan');
        // $data['data_akun'] = $this->m_keuangan->get_all_data_akun('data_akun');
        $this->load->view('keuangan/pembayaran/pembayaran');
    }

    //Setting
    public function setting()
    {
        $this->load->model('M_keuangan');
        // $data['data_akun'] = $this->m_keuangan->get_all_data_akun('data_akun');
        $this->load->view('keuangan/setting/setting');
    }
}