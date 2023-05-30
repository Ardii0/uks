<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Programkerjauks extends CI_Controller
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

    //Struktur
    public function struktur()
    {
        $this->load->model('Main_model');
        $data['struktur'] = $this->Main_model->get('struktur')->result();
        $this->load->view('programkerjauks/struktur/index',$data);
    }

    public function upload_img_struktur($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/programkerjauks/struktur/';
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
    public function aksi_tambah_struktur()
    {
        $foto = $this->upload_img_struktur('foto');
        if ($foto[0] == false) {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload gambar.');
            redirect(base_url('programkerjauks/add'));
        } else {
            $data = array
            (
                'foto' => $foto[1],
                'created_at' => date("Y-m-d H:i:s"),
            );
            $masuk = $this->Main_model->insert_data($data, 'struktur');
            if ($masuk) {
                $this->session->set_flashdata('sukses', 'Berhasil Menambahkan');
                redirect(base_url('programkerjauks/struktur'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('programkerjauks/123'));
            }
        }
    }
    
    //Program Kerja UKS
    public function index()
    {
        $this->load->model('Main_model');
        $data['program'] = $this->Main_model->get('program_kerja')->result();
        $this->load->view('programkerjauks/index', $data);
    }
 
    public function upload_img_program($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/programkerjauks/foto/';
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
    public function aksi_tambah_program()
    {
        $foto = $this->upload_img_program('foto');
        if ($foto[0] == false) {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload gambar.');
            redirect(base_url('programkerjauks/add'));
        } else {
            $data = array
            (
                'foto' => $foto[1],
                'nama_program' => $this->input->post('nama_program'),
                'tanggal' => $this->input->post('tanggal'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            $masuk = $this->Main_model->insert_data($data, 'program_kerja');
            if ($masuk) {
                $this->session->set_flashdata('sukses', 'Berhasil Menambahkan');
                redirect(base_url('programkerjauks/'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('programkerjauks/123'));
            }
        }
    }

    public function aksi_edit_program()
    {
        $where = array('id' => $this->input->post('id'));
        $_id = $this->Main_model->getwhere($where, 'program_kerja')->row();
        $foto = $this->upload_img_program('foto');
        if($foto[0]==false) {
            $data = array
            (
                'nama_program' => $this->input->post('nama_program'),
                'tanggal' => $this->input->post('tanggal'),
                'deskripsi' => $this->input->post('deskripsi')
            );
        } else {
            $data = array
            (
                'foto' => $foto[1],
                'nama_program' => $this->input->post('nama_program'),
                'tanggal' => $this->input->post('tanggal'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            if ($_id->foto != '') {
                unlink('./uploads/programkerjauks/buku/'.$_id->foto);
            }
        }
        $valid = $this->Main_model->update_data($where, $data, 'program_kerja');
        if($valid)
        {
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah');
            redirect(base_url('programkerjauks/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('programkerjauks/'.$where));
        }
    }


    public function hapus_program($id)
    {
        $foto = tampil_foto_byid($id);
        $path = './uploads/programkerjauks/foto/'.$foto;
        unlink($path); 
        $hapus=$this->Main_model->delete_data( ['id'=>$id], 'program_kerja');
        if ($hapus) {
            $this->session->set_flashdata('sukses hapus', 'berhasil');
            redirect(base_url('programkerjauks/'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('programkerjauks/123'));
        }
    }
}