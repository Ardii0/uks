<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarobat extends CI_Controller {

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
        
        $data['obat'] = $this->Main_model->get('daftar_obat')->result();    
        $this->load->view('daftarobat/daftar_obat', $data);
    }

    public function aksi_tambah_daftar_obat()
    {
        $nama = $this->input->post('nama_obat');
        $nama_obat = $this->Main_model->total('nama_obat', $nama, 'daftar_obat');
        if ($nama_obat !== 0) { 
            $this->session->set_flashdata('salah', 'Maaf Nama Obat Sudah Tersedia');
                redirect(base_url('daftarobat/'));
        }else { 
            $data = array
        (
            'nama_obat' => $this->input->post('nama_obat'),
            'stocks' => $this->input->post('stocks_obat'),
            'satuan' => $this->input->post('satuan_obat'),
            'expired' => $this->input->post('expired_obat'),
        );
        $masuk=$this->Main_model->insert_data($data, 'daftar_obat');
        if($masuk){
                $this->session->set_flashdata('yes', 'Berhasil Menambahkan');
                redirect(base_url('daftarobat/'));
            }else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('daftarobat/'));
            }
         }

    }

    // Change data
    public function edit_daftar_obat($id_obat)
    {
        $data = [
            'judul' => 'admin',
            'page' => 'admin',
            'menu' => 'daftar_obat',
            'submenu'=>''
        ];
        $getwhere=['id'=>$id_obat];
        $data['obat']=$this->Main_model->getwhere($getwhere, 'daftar_obat')->result();
        $this->load->view('daftarobat/edit_daftar_obat', $data);
    }

    public function update_daftar_obat()
    {
        $data =  [
            'nama_obat' => $this->input->post('nama_obat'),
            'stocks' => $this->input->post('stocks_obat'),
            'satuan' => $this->input->post('satuan'),
            'expired' => $this->input->post('expired_obat')
        ];
        $logged=$this->Main_model->update_data(array('id'=>$this->input->post('id')), $data, 'daftar_obat');
        if($logged)
        {
            $this->session->set_flashdata('yes', 'berhasil');
            redirect(base_url('daftarobat/'));
        }
        else
        {
            $this->session->set_flashdata('salah', 'gagal..');
            redirect(base_url('daftarobat/edit_daftar_obat/'.$this->input->post('id')));
        }
    }
    
    public function hapus_daftar_obat($id_obat)
    {
        $hapus=$this->Main_model->delete_data( ['id'=>$id_obat], 'daftar_obat');
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('daftarobat/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('daftarobat/'));
        }

    }

}