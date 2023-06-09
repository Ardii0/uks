<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Programklik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('is_login') != TRUE) {
            redirect(base_url('Login'));
        }
    }

    //Program Klik
    public function index()
    {
        $this->load->model('Main_model');
        $data['periksa'] = $this->Main_model->get('program_klik')->result();
        $this->load->view('programklik/index', $data);
    }

    public function aksi_tambah_programklik()
    {
        $data = array
        (
            'create_date' => date("Y-m-d H:i:s"),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'kelas' => $this->input->post('kelas'),
            'keluhan' => $this->input->post('keluhan'),
            'tahun_bulan' => date("Y-m"),
        );
        $masuk = $this->Main_model->insert_data($data, 'program_klik');
        if ($masuk) {
            $this->session->set_flashdata('sukses', 'Berhasil Menambahkan');
            redirect(base_url('programklik/'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('programklik/123'));
        }
    }

    public function detail($id)
    {
        $this->load->model('Main_model');
        $where = ['id' => $id];
        $data['program'] = $this->Main_model->getwhere($where, 'program_klik')->row_array();
        $this->load->view('programklik/detail', $data);
    }

    public function aksi_edit_program()
    {
        $where = array('id' => $this->input->post('id'));
        $data = array
        (
           
            'create_date' => date("Y-m-d H:i:s"),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'kelas' => $this->input->post('kelas'),
            'keluhan' => $this->input->post('keluhan'),
            'tahun_bulan' => date("Y-m"),
        );
        $valid = $this->Main_model->update_data($where, $data, 'program_klik');
        if ($valid) {
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah');
            redirect(base_url('programklik/'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('programklik/' . $where));
        }
    }

    public function cetak_programklik($id)
    {
        $where = ['id' => $id];
        $data['program'] = $this->Main_model->getwhere($where, 'program_klik')->row_array();
        if ($this->uri->segment(4) == "pdf") {
            $this->load->library('pdf');
            $this->pdf->load_view('programklik/cetak_programklik', $data);
            $this->pdf->render();
            $this->pdf->stream(" Surat Rujukan " . $id . ".pdf", array("Attachment" => false));
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
        // }
    }


    public function hapus_programklik($id)
    {
        $hapus = $this->Main_model->delete_data(['id' => $id], 'program_klik');
        if ($hapus) {
            $this->session->set_flashdata('sukses hapus', 'berhasil');
            redirect(base_url('programklik/'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('programklik/123'));
        }
    }
}