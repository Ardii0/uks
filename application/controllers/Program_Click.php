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
         $data['guru'] = $this->Main_model->get('guru')->result();
         $data['siswa'] = $this->Main_model->get('siswa')->result();
         $data['karyawan'] = $this->Main_model->get('karyawan')->result();
         $this->load->view('program_click/index', $data);
     }
 
     public function aksi_tambah_program_click()
     {
         $data = array
         (
            'guru_id' => $this->input->post('guru_id'),
            'siswa_id' => $this->input->post('siswa_id'),
            'karyawan_id' => $this->input->post('karyawan_id'),
             'create_date' => date("Y-m-d H:i:s"),
             'keluhan' => $this->input->post('keluhan'),
             'saran' => $this->input->post('saran'),
             'pasien_status' => $this->input->post('pasien_status'),
             'tahun_bulan' => date("Y-m"),
         );
         $masuk = $this->Main_model->insert_data($data,'program_click');
         if ($masuk) {
             $this->session->set_flashdata('sukses', 'Berhasil Menambahkan');
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
             $this->session->set_flashdata('sukses hapus', 'berhasil');
             redirect(base_url('Program_click/'));
         }
         else
         {
             $this->session->set_flashdata('error', 'gagal..');
             redirect(base_url('Program_click/123'));
         }
     }
    }

