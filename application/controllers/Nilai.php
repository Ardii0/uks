<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_nilai');
        $this->load->model('m_akademik');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_nilai')!='login') {
            redirect(base_url('Login'));
        }
    }
    
    public function index()
    {
        $this->load->view('nilai/dashboard');
    }

// Data Nilai
    public function data_keselurahan_nilai_siswa()
    {
        $this->load->view('nilai/data_nilai/data_keselurahan_nilai_siswa');
    }

    public function modul_data_nilai_siswa()
    {
        $this->load->view('nilai/data_nilai/modul_data_nilai_siswa');
    }
    
// Nilai
 // Entry
    public function alokasi_guru($kode_guru)
    {
        $data['guru']=$this->m_akademik->get_guruById('tabel_guru', $kode_guru)->result();
        $data['mapel'] = $this->m_akademik->get_mapel('mapel');
        $data['alokasiguru'] = $this->m_akademik->get_alokasiguruByIdGuru('tabel_alokasiguru', $kode_guru);
        $this->load->view('akademik/alokasi/alokasi_guru/alokasi_guru', $data);
    }
    public function entry_nilai($id_siswa, $id_mapel)
    {
        $data['mapel'] = $this->m_akademik->get_mapelById('tabel_mapel', $id_mapel)->result();
        $data['siswa'] = $this->m_nilai->get_nilaiBySiswa('tabel_siswa', $id_siswa);
        // $data['siswa'] = $this->m_nilai->get_nilaiBySiswa('tabel_siswa', $semester)->result();
        $this->load->view('nilai/nilai/entry_nilai', $data);
    }
    
    public function tambah_anggota()
    {
        $data =
        [
            'id_siswa' => $this->input->post('id_siswa'),
            'id_mapel' => $this->input->post('id_mapel'),
            'semester' => $this->input->post('semester'),
            'nuh1' => $this->input->post('nuh1'),
            'nuh2' => $this->input->post('nuh2'),
            'nuh3' => $this->input->post('nuh3'),
            'nt1' => $this->input->post('nt1'),
            'nt2' => $this->input->post('nt2'),
            'nt3' => $this->input->post('nt3'),
            'mid' => $this->input->post('mid'),
            'smt' => $this->input->post('smt'),
            'rnuh' => $this->input->post('rnuh'),
            'rnt' => $this->input->post('rnt'),
            'nh' => $this->input->post('nh'),
            'nar' => $this->input->post('nar'),
        ];
        $this->m_nilai->tambah_nilai('tabel_nilai', $data);
    }

 // Modul
    public function modul_input_nilai()
    {
        $this->load->view('nilai/nilai/modul_input_nilai');
    }
}