<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('is_login')!= TRUE ) {
            redirect(base_url('Login'));
        }
    }
    public function index()
    {
        $data['diagnosa'] = $this->Main_model->get('diagnosa')->result();
        $this->load->view('diagnosa/diagnosa', $data);
    }

    public function diagnosa()
    {
        $data = [
            'judul' => 'admin',
            'page' => 'admin',
            'menu' => 'diagnosa',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'admin',
            'submenu_admin'=>'diagnosa'
        ];
        $data['diagnosa'] = $this->Main_model->get('diagnosa')->result();
        $this->load->view('diagnosa/diagnosa', $data);
    }


    public function aksi_tambah_diagnosa()
    {
        $nama = $this->input->post('name_penyakit');
        $nama_diagnosa = $this->Main_model->total('nama', $nama, 'diagnosa');
        if ($nama_diagnosa !== 0) { 
            $this->session->set_flashdata('salah', 'Maaf Nama Diagnosa Penyakit Sudah Tersedia');
                redirect(base_url('Diagnosa/diagnosa'));
        } else { 
            $data = array
            (
                'nama' => $this->input->post('name_penyakit'),
            );
            $masuk=$this->Main_model->insert_data($data, 'diagnosa');
            if ($masuk) {
                $this->session->set_flashdata('yes', 'Berhasil Menambahkan');
                redirect(base_url('Diagnosa/diagnosa'));
            }else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Diagnosa/diagnosa'));
            }
         }
    }
       
   

    // Change data
    public function edit_diagnosa($id)
    {
        $data = [
            'judul' => 'admin',
            'page' => 'admin',
            'menu' => 'diagnosa',
            'submenu'=>''
        ];
        $getwhere=['id'=>$id];
        $data['diagnosa']=$this->Main_model->getwhere($getwhere, 'diagnosa')->result();
        $this->load->view('diagnosa/edit_diagnosa', $data);
    }

    public function update_diagnosa()
    {
        $data =  [
            'nama' => $this->input->post('nama')
        ];
        $logged=$this->Main_model->update_data(array('id'=>$this->input->post('id')), $data, 'diagnosa');
        if($logged)
        {
            $this->session->set_flashdata('yes', 'Berhasil');
                redirect(base_url('Diagnosa/diagnosa'));
        }
        else
        {
            $this->session->set_flashdata('no', 'gagal..');
            redirect(base_url('diagnosa/edit_diagnosa'.$this->input->post('id')));
        }
    }

    public function hapus_diagnosa($id)
    {
        $hapus=$this->Main_model->delete_data( ['id'=>$id], 'diagnosa');
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Diagnosa/diagnosa'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Diagnosa/diagnosa'));
        }

    }

    
    }