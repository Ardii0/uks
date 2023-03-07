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
        $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
        $this->load->view('keuangan/akun/akun', $data);
    }

    public function aksi_tambah_akun()
    {
        $data = array
        (
            'nama_akun' => $this->input->post('nama_akun'),
            'jenis_akun' => $this->input->post('jenis_akun'),
        );

        $masuk=$this->m_keuangan->tambah_akun('tabel_akun', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/akun/akun'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/akun/akun'));
        }
    }

    public function edit_akun($id_akun)
    {
        $data['data_akun']=$this->m_keuangan->edit_akun('tabel_akun', $id_akun)->result();
        $this->load->view('keuangan/akun/edit_akun', $data);
    }

    public function aksi_edit_akun()
    {
        $data = array
        (
            'nama_akun' => $this->input->post('nama_akun'),
            'jenis_akun' => $this->input->post('jenis_akun'),
        );

        $masuk=$this->m_keuangan->ubah_akun('tabel_akun', $data, array('id_akun'=>$this->input->post('id_akun')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/akun/akun'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/akun/edit_akun'.$this->input->post('id_akun')));
        }
    }

    public function hapus_akun($id_akun)
    {
        $hapus=$this->m_keuangan->hapus_akun('tabel_akun', 'id_akun', $id_akun);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Keuangan/akun'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Keuangan/akun'));
        }
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

    public function tambah_pembayaran()
    {
        // $this->load->model('M_keuangan');
        $this->load->view('keuangan/pembayaran/tambah_pembayaran');
    }

    public function form_tambah_pembayaran()
    {
        // $this->load->model('M_keuangan');
        $this->load->view('keuangan/pembayaran/form_tambah_pembayaran');
    }

    public function cetak_invoice()
    {
        // $this->load->model('M_keuangan');
        $this->load->view('keuangan/pembayaran/cetak_invoice');
    }

//Setting
    public function setting()
    {
        $this->load->model('M_keuangan');
        // $data['data_akun'] = $this->m_keuangan->get_all_data_akun('data_akun');
        $this->load->view('keuangan/setting/setting');
    }
}