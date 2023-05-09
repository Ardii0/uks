<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan extends CI_Controller {

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
        
        $data['tindakan'] = $this->Main_model->get('tindakan')->result();    
        $this->load->view('tindakan/tindakan', $data);
    }

    
    public function tindakan()
    {
        $data = [
            'judul' => 'admin',
            'page' => 'admin',
            'menu' => 'tindakan',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'tindakan',
            'submenu_admin'=> 'tindakan'
        ];
        
        $data['tindakan'] = $this->Main_model->get('tindakan')->result();
        $this->load->view('tindakan/tindakan', $data);
    }

    public function aksi_tambah_tindakan()
    {
        $data = array
        (
            'nama' => $this->input->post('nama_tindakan'),
        );
        $masuk=$this->Main_model->insert_data($data, 'tindakan');
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Tindakan/tindakan'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Tindakan/tindakan'));
        }
    }

    // Change data
    public function edit_tindakan($id_tindakan)
    {
        $data = [
            'judul' => 'admin',
            'page' => 'admin',
            'menu' => 'tindakan',
            'submenu'=>''
        ];
        $getwhere=['id'=>$id_tindakan];
        $data['tindakan']=$this->Main_model->getwhere($getwhere, 'tindakan')->result();
        $this->load->view('tindakan/edit_tindakan', $data);
    }

    public function update_tindakan()
    {
        $data =  [
            'nama' => $this->input->post('nama_tindakan')
        ];
        $logged=$this->Main_model->update_data(array('id'=>$this->input->post('id')), $data, 'tindakan');
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Tindakan/tindakan'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Tindakan/edit_tindakan/'.$this->input->post('id')));
        }
    }
    
    public function hapus_tindakan($id_tindakan)
    {
        $hapus=$this->Main_model->delete_data( ['id'=>$id_tindakan], 'tindakan');
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Tindakan/tindakan'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Tindakan/tindakan'));
        }

    }

}