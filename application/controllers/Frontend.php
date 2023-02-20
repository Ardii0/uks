<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_frontend');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
    }

    public function index()
    {
        $isi['menu_paket'] = $this->db->get('menu_paket')->result();
        $isi['foto'] = $this->db->get('foto')->result();
        $this->load->view('frontend/style/dashboard', $isi);
    }

    public function register()
      {
        $this->load->view('frontend/register');
      }

    public function simpan_register()
        {
        $cek = $this->db->where('username',$this->input->post('username'))->get('tabel_admin')->num_rows();
        $cek1 = $this->db->where('email',$this->input->post('email'))->get('tabel_admin')->num_rows();
        if ($cek>0) {
          $this->session->set_flashdata('username_duplikat','<div class="alert alert-danger">Username sudah terdaftar!</div>');
          redirect('Frontend/register');
        }elseif ($cek1>0) {
          $this->session->set_flashdata('email_duplikat','<div class="alert alert-danger">Email sudah terdaftar!</div>');
          redirect('Frontend/register');
        }else {
            $data   = array(
                'nama'          => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat'        => $this->input->post('alamat'),
                'no_telp'       => $this->input->post('no_telp'),
                'email'         => $this->input->post('email'),
                'del_flag'      => '1',
                'level'         => '2',
                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password')));
            $masuk=$this->M_frontend->tambah('tabel_admin', $data);
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Frontend/register'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Frontend/register'));
            }
        }
    }
}