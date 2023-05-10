<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('is_login')!=TRUE) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['kegiatan'] = $this->Main_model->get('kegiatan_uks')->result();
        $this->load->view('kegiatan/index', $data);
    }

    public function tambah_kegiatan()
    {
        $data = [
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_akhir' => $this->input->post('tanggal_akhir'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto' => $this->input->post('foto'),
        ];
        $this->Main_model->insert_data($data, 'kegiatan_uks');
        redirect(base_url('Kegiatan/'));
    }

}