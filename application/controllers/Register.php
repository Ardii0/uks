<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_register');
    date_default_timezone_set('Asia/Jakarta');
    $this->load->helper(array('Form', 'Cookie', 'String'));

  }
//======login=======
  public function index()
  {
    if ($this->session->userdata('status_admin')==='login') {
      redirect(base_url('Admin/'));
    } elseif ($this->session->userdata('status_akademik')==='login') {
      redirect(base_url('Akademik/'));
    } elseif ($this->session->userdata('status_perpustakaan')==='login') {
      redirect(base_url('Perpustakaan/'));
    } elseif ($this->session->userdata('status_nilai')==='login') {
      redirect(base_url('Nilai/'));
    } elseif ($this->session->userdata('status_keuangan')==='login') {
      redirect(base_url('Keuangan/'));
    }
    $sub_data['warning']=$this->session->userdata('warning');
    $this->load->view('petugas/register',$sub_data);
  }
  
  function login_email()
  {
    $this->load->view('petugas/login_email');
  }


//=====Aksi Daftar======
public function aksi_registrasi()
{
    $data = [
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password')),
        'level' => "Alumni",
    ];

    $this->m_register->registrasi('tabel_level', $data);
    redirect(base_url('Login'));
}

  

}