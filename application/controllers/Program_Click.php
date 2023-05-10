<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_Click extends CI_Controller {

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

     //Program Click
     public function index()
     {
         $this->load->model('Main_model');
         $data['periksa'] = $this->Main_model->get('program_click')->result();
         $data['pasien_status'] = $this->Main_model->get('pasien_status')->result();
         $data['siswa'] = $this->Main_model->get('siswa')->result();
         $this->load->view('program_click/index', $data);
     }
 
     public function aksi_tambah_program_click()
     {
         $data = array
         (
             'create_date' => date("Y-m-d H:i:s"),
             'update_date' => date("Y-m-d H:i:s"),
             'status' => 0,  
             'keluhan' => $this->input->post('keluhan'),
             'nama_pasien' => $this->input->post('nama_pasien'),
             'pasien_status_id' => $this->input->post('pasien_status_id'),
         );
         $masuk = $this->Main_model->insert_data($data,'progran_click');
         if ($masuk) {
             $this->session->set_flashdata('sukses', 'berhasil');
             redirect(base_url('Program_click/'));
         } else {
             $this->session->set_flashdata('error', 'gagal..');
             redirect(base_url('Program_click/123'));
         }
     }
 
     
     public function hapus_program_click($id)
     {
        $hapus=$this->Main_model->delete_data( ['id'=>$id], 'program_click');
         if($hapus)
         {
             $this->session->set_flashdata('sukses', 'berhasil');
             redirect(base_url('Program_click/'));
         }
         else
         {
             $this->session->set_flashdata('error', 'gagal..');
             redirect(base_url('Program_click/123'));
         }
     }
    }

