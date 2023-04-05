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
// Data Diri
    public function data_diri()
    {
        $this->load->view('alumni/data_diri/data_diri');
    }

    public function get_daftarByNisn(){
        $id_daftar = $this->input->post('id_daftar',TRUE);
        $data = $this->m_alumni->getwhere('tabel_daftar', array('id_daftar' => $id_daftar))->result();
        echo json_encode($data);
    }

    public function bekerja()
    {
        $data['data'] = $this->m_alumni->getwhere('tabel_daftar', array('diterima' => 'G'))->result();
        $data['user'] = $this->m_alumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $this->load->view('alumni/data_diri/bekerja/bekerja', $data);
    }

//
    public function testimoni()
    {
        $data['testimoni']=$this->m_alumni->get_testimoni_byId('tabel_testimoni')->result();
        $this->load->view('alumni/testimoni/testimoni', $data);
    }

    public function delete_testimoni($id_testimoni)
    {
        $hapus=$this->m_alumni->delete_testimoni('tabel_testimoni', 'id_testimoni', $id_testimoni);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Alumni/testimoni'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Alumni/testimoni/error'));
        }

    }

    public function aksi_tambah_testimoni()
    {
        $data = array
        (
            'id_alumni' => $this->input->post('id_alumni'),
            'pesan' => $this->input->post('pesan'),
            'tampil' => 'tidak',
        );
        $masuk=$this->m_alumni->tambah_testimoni('tabel_testimoni', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Alumni/testimoni'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Alumni/testimoni'));
        }
    }

}