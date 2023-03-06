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
        $data['data_keuangan'] = $this->m_keuangan->get_all_data_keuangan('data_keuangan');
        $this->load->view('keuangan/anggaran/anggaran', $data);
    }

    public function tambah_anggaran()
    {
        $data['data_keuangan'] = $this->m_keuangan->get_all_data_keuangan('data_keuangan');
        $this->load->view('keuangan/anggaran/tambah_anggaran', $data);
    }

    public function aksi_tambah_anggaran()
    {
        $data = array
        (
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'debit' => $this->input->post('debit'),
            'kredit' => $this->input->post('kredit'),
            'saldo' => $this->input->post('saldo'),
        );
        $masuk = $this->m_keuangan->tambah_anggaran('tabel_keuangan', $data);
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
        $data['data_keuangan']=$this->m_keuangan->edit_anggaran('tabel_keuangan', $id)->result();
        $this->load->view('keuangan/anggaran/edit_anggaran', $data);
    }

    public function aksi_edit_anggaran()
    {
        $data = array
        (
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'debit' => $this->input->post('debit'),
            'kredit' => $this->input->post('kredit'),
            'saldo' => $this->input->post('saldo'),
        );
        $masuk=$this->m_keuangan->edit_anggaran('tabel_keuangan', $data, array('id'=>$this->input->post('id')));
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