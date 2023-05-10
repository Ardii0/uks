<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pojok_Baca extends CI_Controller
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
    
    //Pojok Baca
    public function index()
    {
        $this->load->model('Main_model');
        $data['buku'] = $this->Main_model->get('buku')->result();
        $this->load->view('pojok_baca/index', $data);
    }
    public function tambah_buku()
    {
        $this->load->view('pojok_baca/add');
    }

    public function upload_img_buku($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/pojok_baca/buku/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '100000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }
    public function aksi_tambah_buku()
    {
        $foto = $this->upload_img_buku('foto');
        $data = array
        (
            'foto' => $foto[1],
            'judul_buku' => $this->input->post('judul_buku'),
            'penerbit_buku' => $this->input->post('penerbit_buku'),
            'penulis_buku' => $this->input->post('penulis_buku'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'keterangan' => $this->input->post('keterangan'),
            'sumber' => $this->input->post('sumber'),
            'kategori_id' => $this->input->post('kategori_id'),
            'rak_buku_id' => $this->input->post('rak_buku_id'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'del_flag' => '1',
        );
        $masuk = $this->Main_model->insert_data($data, 'buku');
        if ($masuk) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Pojok_baca/'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Pojok_baca/123'));
        }
    }


    public function hapus_buku($id)
    {
        $hapus=$this->Main_model->delete_data( ['id'=>$id], 'buku');
        if ($hapus) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Pojok_baca/'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Pojok_baca/123'));
        }
    }
}