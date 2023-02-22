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
        $this->load->model('M_akademik');
        $data['tahunajar'] = $this->m_akademik->get_tahun_ajaran('tahunajar');
        $this->load->view('akademik/tahun_ajaran/tahun_ajaran', $data);
    }

    public function tahun_ajaran_form()
    {
        $this->load->model('M_akademik');
        $this->load->view('akademik/tahun_ajaran/form_tahun_ajaran');
    }


    public function tambah_ta()
    {
        $data = 
        [
            'nama_angkatan' => $this->input->post('nama_angkatan'),
            'kd_angkatan' => $this->input->post('kd_angkatan'),
            'tgl_a' => $this->input->post('tgl_a'),
            'tgl_b' => $this->input->post('tgl_b'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->m_akademik->tambah_ta('tabel_tahunajaran', $data);
        redirect(base_url('Akademik/tahun_ajaran'));
    }

    public function edit_ta($id_angkatan)
    {
        $data['tahunajar']=$this->m_akademik->edit_ta('tabel_tahunajaran', $id_angkatan)->result();
        $this->load->view('akademik/tahun_ajaran/edit_tahunajaran', $data);
    }

    public function update_ta()
    {
        $data = array (
            'nama_angkatan' => $this->input->post('nama_angkatan'),
            'kd_angkatan' => $this->input->post('kd_angkatan'),
            'tgl_a' => $this->input->post('tgl_a'),
            'tgl_b' => $this->input->post('tgl_b'),
            // 'aktif' => $this->input->post('aktif'),
            'keterangan' => $this->input->post('keterangan'),
            // 'status' => $this->input->post('status'),
        );
        $logged=$this->m_akademik->ubah_ta('tabel_tahunajaran', $data, array('id_angkatan'=>$this->input->post('id_angkatan')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/tahun_ajaran'));
        }
        // else
        // {
        //     $this->session->set_flashdata('error', 'gagal..');
        //     redirect(base_url('Akademik/tahun_ajaran/edit_ta/'.$this->input->post('id_angkatan')));
        // }
    }
    
    public function hapus_ta($id_angkatan)
    {
        $this->m_akademik->hapus_ta('tabel_tahunajaran', 'id_angkatan', $id_angkatan);
        redirect(base_url('Akademik/tahun_ajaran'));
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

    public function form_pendaftaran()
    {
        $this->load->view('akademik/siswa/form_pendaftaran');
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