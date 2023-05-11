<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

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
    public function data_inventaris()
    {
        $data = [
            'judul' => 'uks',
            'page' => 'inventaris',
            'menu' => 'inventaris',
            'submenu'=>'',
        ];
        $data['daf_invent'] = $this->Main_model->get("inventaris")->result();
        $this->load->view('inventaris/inventaris', $data);
    }

    public function aksi_tambah()
    {
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'asal_barang' => $this->input->post('asal_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'tgl_barang_masuk' => date('Y-m-d  H:i:s'),
      ];
      $masuk=$this->Main_model->tambah("inventaris", $data);
      if($masuk)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('inventaris/data_inventaris/'));
        }
    }

    public function edit_invent($id)
    {
       
        $data['daf_invent']=$this->Main_model->by_id('inventaris', $id)->result();
        $this->load->view('inventaris/edit_inventaris', $data, $id);
    }

    public function ubah_invent()
    {
        $data = array (
            'nama_barang' => $this->input->post('nama_barang'),
          'asal_barang' => $this->input->post('asal_barang'),
          'jumlah_barang' => $this->input->post('jumlah_barang'),
          'update_barang' => date('Y-m-d  H:i:s'),
        );
        $masuk=$this->Main_model->ubah_data('inventaris', $data, array('id'=>$this->input->post('id')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('inventaris/data_inventaris'));
        }
    }

    public function hapus_invent($id)
    {
        $hapus=$this->Main_model->hapus('inventaris', 'id', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('inventaris/data_inventaris'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('inventaris/data_inventaris'));
        }
    }
}