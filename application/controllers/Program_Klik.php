<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_Klik extends CI_Controller {

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

     //Program Klik
     public function index()
     {
         $this->load->model('Main_model');
         $data['periksa'] = $this->Main_model->get('program_klik')->result();
         $data['guru'] = $this->Main_model->get('guru')->result();
         $data['siswa'] = $this->Main_model->get('siswa')->result();
         $data['karyawan'] = $this->Main_model->get('karyawan')->result();
         $this->load->view('program_klik/index', $data);
     }
 
     public function aksi_tambah_program_klik()
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
         $masuk = $this->Main_model->insert_data($data,'program_klik');
         if ($masuk) {
             $this->session->set_flashdata('sukses', 'Berhasil Menambahkan');
             redirect(base_url('program_klik/'));
         } else {
             $this->session->set_flashdata('error', 'gagal..');
             redirect(base_url('program_klik/123'));
         }
     }

     public function cetak_program_klik($id)
     {
            $where = ['id' => $id];
            $data['program'] = $this->Main_model->getwhere($where,'program_klik')->row_array();
             if ($this->uri->segment(4) == "pdf") {
                 $this->load->library('pdf');
                 $this->pdf->load_view('program_klik/cetak_program_klik', $data);
                 $this->pdf->render();
                 $this->pdf->stream(" Surat Rujukan ".$id.".pdf", array("Attachment" => false));			
             }else{
                 redirect($_SERVER['HTTP_REFERER']);
             }
         // }
     }
 
     
     public function hapus_program_klik($id)
     {
        $hapus=$this->Main_model->delete_data( ['id'=>$id], 'program_klik');
         if($hapus)
         {
             $this->session->set_flashdata('sukses hapus', 'berhasil');
             redirect(base_url('program_klik/'));
         }
         else
         {
             $this->session->set_flashdata('error', 'gagal..');
             redirect(base_url('program_klik/123'));
         }
     }
    }

