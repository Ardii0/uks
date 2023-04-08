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
        $data['readydata'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readystatus'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Bekerja'))->result();
        $this->load->view('alumni/data_diri/bekerja/bekerja', $data);
    }

    public function wirausaha()
    {
        $data['data'] = $this->m_alumni->getwhere('tabel_daftar', array('diterima' => 'G'))->result();
        $data['user'] = $this->m_alumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readydata'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readystatus'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Wirausaha'))->result();
        $this->load->view('alumni/data_diri/wirausaha/wirausaha', $data);
    }

    public function kuliah()
    {
        $data['data'] = $this->m_alumni->getwhere('tabel_daftar', array('diterima' => 'G'))->result();
        $data['user'] = $this->m_alumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readydata'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readystatus'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Kuliah'))->result();
        $this->load->view('alumni/data_diri/kuliah/kuliah', $data);
    }

    public function lainnya()
    {
        $data['data'] = $this->m_alumni->getwhere('tabel_daftar', array('diterima' => 'G'))->result();
        $data['user'] = $this->m_alumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readydata'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readystatus'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Lainnya'))->result();
        $this->load->view('alumni/data_diri/lainnya/lainnya', $data);
    }

    public function tambah_datadiri()
    {
        $data = [
            'id_level' => $this->session->userdata('id_level'),
            'id_daftar' => $this->input->post('id_daftar'),
            'jurusan_sekolah' => $this->input->post('jurusan_sekolah'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'status' => $this->input->post('status'),
            'nama_instansi' => $this->input->post('nama_instansi'),
            'jabatan' => $this->input->post('jabatan'),
            'tanggal_kerja' => $this->input->post('tanggal_kerja'),
            'bidang_instansi' => $this->input->post('bidang_instansi'),
            'lokasi_instansi' => $this->input->post('lokasi_instansi'),
            'nama_instansi2' => $this->input->post('nama_instansi2'),
            'jabatan2' => $this->input->post('jabatan2'),
            'tanggal_kerja2' => $this->input->post('tanggal_kerja2'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'jenis_usaha' => $this->input->post('jenis_usaha'),
            'tahun_usaha' => $this->input->post('tahun_usaha'),
            'nama_perguruan' => $this->input->post('nama_perguruan'),
            'jurusan' => $this->input->post('jurusan'),
            'tahun_perguruan' => $this->input->post('tahun_perguruan'),
        ];
        $this->m_alumni->input_data('data_diri', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_datadiri()
    {
        $data = array (
            'jurusan_sekolah' => $this->input->post('jurusan_sekolah'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'status' => $this->input->post('status'),
            'nama_instansi' => $this->input->post('nama_instansi'),
            'jabatan' => $this->input->post('jabatan'),
            'tanggal_kerja' => $this->input->post('tanggal_kerja'),
            'bidang_instansi' => $this->input->post('bidang_instansi'),
            'lokasi_instansi' => $this->input->post('lokasi_instansi'),
            'nama_instansi2' => $this->input->post('nama_instansi2'),
            'jabatan2' => $this->input->post('jabatan2'),
            'tanggal_kerja2' => $this->input->post('tanggal_kerja2'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'jenis_usaha' => $this->input->post('jenis_usaha'),
            'tahun_usaha' => $this->input->post('tahun_usaha'),
            'nama_perguruan' => $this->input->post('nama_perguruan'),
            'jurusan' => $this->input->post('jurusan'),
            'tahun_perguruan' => $this->input->post('tahun_perguruan'),
        );
        $this->m_alumni->edit_data('data_diri', $data, array('id_level' => $this->session->userdata('id_level')));
        redirect($_SERVER['HTTP_REFERER']);
    }

//Event

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