<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_register');
    date_default_timezone_set('Asia/Jakarta');
    $this->load->helper(array('Form', 'Cookie', 'String'));

  }
  
//======register=======
  public function index()
  {
    $sub_data['warning']=$this->session->userdata('warning');
    $this->load->view('auth/register',$sub_data);
  }


//=====Aksi Daftar======
public function aksi_registrasi()
{
  $data =[
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post("password")),
  ];
  $this->M_register->registrasi('admin', $data);
  $this->session->set_flashdata('register', 'Register Sukses');
  redirect(base_url('login'));
}

}