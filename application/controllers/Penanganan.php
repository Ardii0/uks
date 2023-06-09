<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penanganan extends CI_Controller {

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
        
        $data['penanganan'] = $this->Main_model->get('penanganan_pertama')->result();    
        $this->load->view('penanganan/penanganan', $data);
    }


    public function aksi_tambah_penanganan()
    {
        $nama = $this->input->post('nama_penanganan');
        $nama_penanganan = $this->Main_model->total('nama_penanganan', $nama, 'penanganan_pertama');
        if ($nama_penanganan !== 0) { 
            $this->session->set_flashdata('salah', 'Maaf Nama Penanganan Sudah Tersedia');
                redirect(base_url('Penanganan'));
        }else { 
            $data = array
            (
                'nama_penanganan' => $this->input->post('nama_penanganan'),
            );
            $masuk=$this->Main_model->insert_data($data, 'penanganan_pertama');
            if($masuk) {
                $this->session->set_flashdata('yes', 'Berhasil Menambahkan');
                redirect(base_url('Penanganan'));
            }else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Penanganan'));
            }
         }

    }

    // Change data
    public function edit_penanganan($id_penanganan)
    {
        $data = [
            'judul' => 'admin',
            'page' => 'admin',
            'menu' => 'penanganan',
            'submenu'=>''
        ];
        $getwhere=['id'=>$id_penanganan];
        $data['penanganan']=$this->Main_model->getwhere($getwhere, 'penanganan_pertama')->result();
        $this->load->view('penanganan/edit_penanganan', $data);
    }

    public function update_penanganan()
    {
        $data =  [
            'nama_penanganan' => $this->input->post('nama_penanganan')
        ];
        $logged=$this->Main_model->update_data(array('id'=>$this->input->post('id')), $data, 'penanganan_pertama');
        if($logged)
        {
            $this->session->set_flashdata('yes', 'berhasil');
            redirect(base_url('Penanganan'));
        }
        else
        {
            $this->session->set_flashdata('no', 'gagal..');
            redirect(base_url('Penanganan/edit_penanganan/'.$this->input->post('id')));
        }
    }
    
    public function hapus_penanganan($id)
    {
        $hapus=$this->Main_model->hapus('penanganan_pertama', 'id', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Penanganan'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Penanganan'));
        }
    }

}