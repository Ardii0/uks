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
        $pendapatan['data_pendapatan'] = $this->m_keuangan->get_pendapatan('data_pendapatan');
        $data['data_transaksi'] = $this->m_keuangan->get_data_transaksi('data_transaksi');
        $pengeluaran['data_pengeluaran'] = $this->m_keuangan->get_pengeluaran('data_pengeluaran');
        $this->load->view('keuangan/dana/dana', $pendapatan + $data + $pengeluaran);
    }

    public function input_dana($id)
    {
        $pendapatan['data_pendapatan'] = $this->m_keuangan->get_pendapatan('data_pendapatan');
        $pengeluaran['data_pengeluaran'] = $this->m_keuangan->get_pengeluaran('data_pengeluaran');
        $akun['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
        $data['dt'] = $this->m_keuangan->ambil('tabel_level',array('id_level'=>$this->session->userdata('id_level')))->row();
        $data['data_transaksi'] = $this->m_keuangan->transaksi('test_pendapatan_pengeluaran', $id)->result();
        $this->load->view('keuangan/dana/input_dana', $data + $pendapatan + $akun + $pengeluaran);
    }

    public function aksi_transaksi()
    {
        $data = array
        (
            'id_anggaran' => $this->input->post('id_anggaran'),
            'uraian' => $this->input->post('uraian'),
            'pencatat' => $this->input->post('pencatat'),
            'akun' => $this->input->post('akun'),
            'nominal' => $this->input->post('nominal'),
        );

        $logging=$this->m_keuangan->aksi_transaksi('tabel_transaksi', $data);
        if($logging)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Keuangan/dana'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Keuangan/input_dana/'.$this->input->post('id_anggaran')));
        }
    }

    public function hapus_transaksi($id)
    {
        $hapus=$this->m_keuangan->hapus_transaksi('tabel_transaksi', 'id_transaksi', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Keuangan/dana'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Keuangan/dana'));
        }
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