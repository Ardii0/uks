<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_login');
    date_default_timezone_set('Asia/Jakarta');
    $this->load->helper(array('Form', 'Cookie', 'String'));

  }
//======login=======
  public function index()
  {
    $sub_data['warning']=$this->session->userdata('warning');
    $this->load->view('petugas/login',$sub_data);
  }
//======Reset Password=====
  public function lupa_password()
  {
    $this->load->view('reset_password');
  }

  public function reset_phone()
  {
    $where = array(
    'no_hp' => $this->input->post('telp'),
    );
    $row1 = $this->M_login->cek("tabel_user",$where)->row();

    if ($row1) {
      $key = random_string('alnum', 64);
      $pass = substr($key,0,8);
      $update_key = array(
          'password' => md5($pass),
          'username' => $row1->no_hp,
      );
      $where  = array('id_user' => $row1->id_user);
      $this->M_login->update('tabel_user',$update_key,$where);
      $pesan ="Dari Klinik username :".$row1->no_hp." password :".$pass;
      $url="https://reguler.zenziva.net/apps/smsapi.php?userkey=2w4myk&passkey=kuvukiland&nohp=".$row1->no_hp."&pesan=".$pesan;
      $this->session->set_flashdata('send', "reset('$url');");

      redirect(base_url("Login/lupa_password"));
    }else {
      $this->session->set_flashdata('message', 'alert("Nomor tidak terdaftar.");');
        redirect(base_url("Login/lupa_password"));
    }
  }

//=====Aksi Login======
  function aksi_login(){
    $username = $this->input->post('username', TRUE);
    $password = $this->input->post('password', TRUE);
    echo $username."-".$password;
      $where = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        'level' => "1",
        );
      $where2 = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        'level' => "2",
        );
      $where3 = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        'level' => "3",
        );
      $whereKesiswaan = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        'level' => "4",
        );
      $wherePetugasPerpus = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        'level' => "5",
        );
      $whereGuru = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        'level' => "6",
        );
      $whereTU = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        'level' => "7",
        );

    $cek = $this->M_login->cek_login("tabel_admin",$where);
    $cek2 = $this->M_login->cek_login("tabel_admin",$where2);
    $cek3 = $this->M_login->cek_login("tabel_admin",$where3);
    $kesiswaan = $this->M_login->cek_login("tabel_admin",$whereKesiswaan);
    $petugasPerpus = $this->M_login->cek_login("tabel_admin",$wherePetugasPerpus);
    $guru = $this->M_login->cek_login("tabel_admin",$whereGuru);
    $TU = $this->M_login->cek_login("tabel_admin",$whereTU);

    //logika
    if ($cek->num_rows() == 1) {
      foreach ($cek->result() as $sess) {
        // $sess_data['logged_in'] = 'Sudah Loggin';
        $data_session['id_admin'] = $sess->id_admin;
        $data_session['username'] = $sess->username;
        $data_session['password'] = $sess->password;
        $data_session['cdate'] = $sess->cdate;
        $data_session['lv'] = $sess->level;
        $data_session['status_admin'] = "login";
        $data_session['level'] = "Admin";
        $this->session->set_userdata($data_session);

        // $data_session = array('id'=>$sess->id_admin,
        //   'level'=>"Admin",'username'=>$sess->username,'cdate'=>$sess->cdate,'lv'=>$sess->level,
        //   'status_admin'=>"login");
        // $this->session->set_userdata($data_session);
      }
      if ($this->session->userdata('level')=='Admin') {
        $last_login1 = array('last_login' =>date('Y-m-d H:i:s') );
        $where  = array('id_admin'=>$this->session->userdata('id_admin'));
        $this->M_login->last_login($last_login1,$where);

        $this->session->set_userdata('login',$data_session);
        $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
        redirect(base_url()."Admin/");//Controller/function
      }
      }elseif ($cek2->num_rows() == 1) {
        foreach ($cek2->result() as $sess) {
          $data_session['id_admin'] = $sess->id_admin;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          $data_session['cdate'] = $sess->cdate;
          $data_session['lv'] = $sess->level;
          $data_session['status_konsumen'] = "login";
          $data_session['level'] = "Konsumen";
          $this->session->set_userdata($data_session);
        }
        if ($this->session->userdata('level')=='Konsumen') {
          $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_admin'=>$this->session->userdata('id_admin'));
          $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Konsumen/");//Controller/function
        }

  }elseif ($cek3->num_rows() == 1) {
      foreach ($cek3->result() as $sess) {
          $data_session['id_admin'] = $sess->id_admin;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          $data_session['cdate'] = $sess->cdate;
          $data_session['lv'] = $sess->level;
          $data_session['status_pemilik'] = "login";
          $data_session['level'] = "Pemilik";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('level')=='Pemilik') {
          $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_admin'=>$this->session->userdata('id_admin'));
          $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Pemilik/");//Controller/function
        }
  }elseif ($kesiswaan->num_rows() == 1) {
      foreach ($kesiswaan->result() as $sess) {
          $data_session['id_admin'] = $sess->id_admin;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          $data_session['cdate'] = $sess->cdate;
          $data_session['lv'] = $sess->level;
          $data_session['status_akademik'] = "login";
          $data_session['level'] = "Akademik";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('level')=='Akademik') {
          $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_admin'=>$this->session->userdata('id_admin'));
          $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Akademik/");//Controller/function
        }
  }elseif ($petugasPerpus->num_rows() == 1) {
      foreach ($petugasPerpus->result() as $sess) {
          $data_session['id_admin'] = $sess->id_admin;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          $data_session['cdate'] = $sess->cdate;
          $data_session['lv'] = $sess->level;
          $data_session['status_perpustakaan'] = "login";
          $data_session['level'] = "Perpustakaan";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('level')=='Perpustakaan') {
          $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_admin'=>$this->session->userdata('id_admin'));
          $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Perpustakaan/");//Controller/function
        }
  }elseif ($guru->num_rows() == 1) {
      foreach ($guru->result() as $sess) {
          $data_session['id_admin'] = $sess->id_admin;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          $data_session['cdate'] = $sess->cdate;
          $data_session['lv'] = $sess->level;
          $data_session['status_nilai'] = "login";
          $data_session['level'] = "Nilai";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('level')=='Nilai') {
          $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_admin'=>$this->session->userdata('id_admin'));
          $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Nilai/");//Controller/function
        }
  }elseif ($TU->num_rows() == 1) {
      foreach ($TU->result() as $sess) {
          $data_session['id_admin'] = $sess->id_admin;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          $data_session['cdate'] = $sess->cdate;
          $data_session['lv'] = $sess->level;
          $data_session['status_keuangan'] = "login";
          $data_session['level'] = "Keuangan";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('level')=='Keuangan') {
          $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_admin'=>$this->session->userdata('id_admin'));
          $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Keuangan/");//Controller/function
        }
  }else{
    //$this->session->set_userdata('blank',$data_session);
    $this->session->set_flashdata('pesan','<div class="alert alert-danger">Username atau Password yang anda masukan salah!</div>');
    redirect(base_url().'login');
  }
  }

  function logout(){
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
