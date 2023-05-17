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
        if ($foto[0] == false) {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload gambar.');
            redirect(base_url('pojok_baca/add'));
        } else {
            $data = array
            (
                'foto' => $foto[1],
                'judul_buku' => $this->input->post('judul_buku'),
                'penerbit_buku' => $this->input->post('penerbit_buku'),
                'penulis_buku' => $this->input->post('penulis_buku'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'keterangan' => $this->input->post('keterangan'),
                'sumber' => $this->input->post('sumber'),
                'created_at' => $this->input->post('tgl_masuk'),
            );
            $masuk = $this->Main_model->insert_data($data, 'buku');
            if ($masuk) {
                $this->session->set_flashdata('sukses', 'Berhasil Menambahkan');
                redirect(base_url('Pojok_baca/'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Pojok_baca/123'));
            }
        }
    }

    public function detail($id)
    {
        $this->load->model('Main_model');
        $where = ['id_buku' => $id];
        $data['buku'] = $this->Main_model->getwhere($where,'buku')->row_array();
        $this->load->view('pojok_baca/detail', $data);
    }

    public function edit_buku($id)
    {
        $this->load->model('Main_model');
        $where = ['id_buku' => $id];
        $data['buku'] = $this->Main_model->getwhere($where,'buku')->row_array();
        $this->load->view('pojok_baca/edit', $data);
    }

    public function aksi_edit_buku($id)
    {
        $where = array('id_buku' => $id);
        $_id = $this->Main_model->getwhere($where, 'buku')->row();
        $foto = $this->upload_img_buku('foto');
        if($foto[0]==false) {
            $data = array
            (
                'judul_buku' => $this->input->post('judul_buku'),
                'penerbit_buku' => $this->input->post('penerbit_buku'),
                'penulis_buku' => $this->input->post('penulis_buku'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'keterangan' => $this->input->post('keterangan'),
                'sumber' => $this->input->post('sumber'),
                'created_at' => $this->input->post('tgl_masuk'),
            );
        } else {
            $data = array
            (
                'foto' => $foto[1],
                'judul_buku' => $this->input->post('judul_buku'),
                'penerbit_buku' => $this->input->post('penerbit_buku'),
                'penulis_buku' => $this->input->post('penulis_buku'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'keterangan' => $this->input->post('keterangan'),
                'sumber' => $this->input->post('sumber'),
                'created_at' => $this->input->post('tgl_masuk'),
            );
            if ($_id->foto != '') {
                unlink('./uploads/pojok_baca/buku/'.$_id->foto);
            }
        }
        $valid = $this->Main_model->update_data($where, $data, 'buku');
        if($valid)
        {
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah');
            redirect(base_url('pojok_baca/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('pojok_baca/'.$id));
        }
    }
    public function hapus_buku($id)
    {
        $foto = tampil_cover_byid($id);
        $path = './uploads/pojok_baca/buku/'.$foto;
        unlink($path); 
        $hapus=$this->Main_model->delete_data( ['id_buku'=>$id], 'buku');
        if ($hapus) {
            $this->session->set_flashdata('sukses hapus', 'berhasil');
            redirect(base_url('Pojok_baca/'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Pojok_baca/123'));
        }
    }
}