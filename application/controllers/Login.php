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
    } elseif ($this->session->userdata('status_alumni')==='login') {
      redirect(base_url('Alumni/'));
    } elseif ($this->session->userdata('status_petugasalumni')==='login') {
      redirect(base_url('PetugasAlumni/'));
    }
    $sub_data['warning']=$this->session->userdata('warning');
    $this->load->view('petugas/login',$sub_data);
  }
  function login_email()
  {
    $this->load->view('petugas/login_email');
  }

//=====Aksi Login======
  function aksi_login(){
    $username = $this->input->post('username', TRUE);
    $email = $this->input->post('email', TRUE);
    $password = $this->input->post('password', TRUE);
    echo $email.$username."-".$password;
    
      $where = array(
        // 'email' => $email,
        'username' => $username,
        'password' => md5($password),
        // 'level' => "Admin",
        'id_hak_akses' => "2",
        );
      $whereKesiswaan = array(
        // 'email' => $email,
        'username' => $username,
        'password' => md5($password),
        // 'level' => "Kesiswaan",
        'id_hak_akses' => "3",
        );
      $wherePetugasPerpus = array(
        // 'email' => $email,
        'username' => $username,
        'password' => md5($password),
        // 'level' => "PetugasPerpus",
        'id_hak_akses' => "4",
        );
      $whereGuru = array(
        // 'email' => $email,
        'username' => $username,
        'password' => md5($password),
        // 'level' => "Guru",
        'id_hak_akses' => "5",
        );
      $whereTU = array(
        // 'email' => $email,
        'username' => $username,
        'password' => md5($password),
        // 'level' => "TU",
        'id_hak_akses' => "6",
        );
      $wherePetugasAlumni = array(
        // 'email' => $email,
        'username' => $username,
        'password' => md5($password),
        'level' => "PetugasAlumni",
        );
      $whereAlumni = array(
        // 'email' => $email,
        'username' => $username,
        'password' => md5($password),
        'level' => "Alumni",
        );

    $cek = $this->M_login->cek_login("tabel_level",$where);
    $kesiswaan = $this->M_login->cek_login("tabel_level",$whereKesiswaan);
    $petugasPerpus = $this->M_login->cek_login("tabel_level",$wherePetugasPerpus);
    $guru = $this->M_login->cek_login("tabel_level",$whereGuru);
    $TU = $this->M_login->cek_login("tabel_level",$whereTU);
    $PetugasAlumni = $this->M_login->cek_login("tabel_level",$wherePetugasAlumni);
    $Alumni = $this->M_login->cek_login("tabel_level",$whereAlumni);

    //logika
    if ($cek->num_rows() == 1) {
      foreach ($cek->result() as $sess) {
        // $sess_data['logged_in'] = 'Sudah Loggin';
        $data_session['id_level'] = $sess->id_level;
        $data_session['username'] = $sess->username;
        // $data_session['email'] = $sess->email;
        $data_session['password'] = $sess->password;
        // $data_session['cdate'] = $sess->cdate;
        // $data_session['lv'] = $sess->level;
        $data_session['status_admin'] = "login";
        $data_session['status_akademik'] = "login";
        $data_session['status_perpustakaan'] = "login";
        $data_session['status_nilai'] = "login";
        $data_session['status_keuangan'] = "login";
        $data_session['status_petugasalumni'] = "login";
        $data_session['level'] = "Admin";
        $data_session['id_hak_akses'] = "2";
        $this->session->set_userdata($data_session);

        // $data_session = array('id'=>$sess->id_level,
        //   'level'=>"Admin",'username'=>$sess->username,'cdate'=>$sess->cdate,'lv'=>$sess->level,
        //   'status_admin'=>"login");
        // $this->session->set_userdata($data_session);
      }
      if ($this->session->userdata('id_hak_akses')=='2') {
        // $last_login1 = array('last_login' =>date('Y-m-d H:i:s') );
        $where  = array('id_level'=>$this->session->userdata('id_level'));
        // // $this->M_login->last_login($last_login1,$where);

        $this->session->set_userdata('login',$data_session);
        $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
        redirect(base_url()."Admin/");//Controller/function
      }
      }elseif ($kesiswaan->num_rows() == 1) {
      foreach ($kesiswaan->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_akademik'] = "login";
          $data_session['level'] = "Akademik";
          $data_session['id_hak_akses'] = "3";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('id_hak_akses')=='3') {
          // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_level'=>$this->session->userdata('id_level'));
          // // $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Akademik/");//Controller/function
        }
    }elseif ($petugasPerpus->num_rows() == 1) {
        foreach ($petugasPerpus->result() as $sess) {
            $data_session['id_level'] = $sess->id_level;
            $data_session['username'] = $sess->username;
            $data_session['password'] = $sess->password;
            // $data_session['cdate'] = $sess->cdate;
            // $data_session['lv'] = $sess->level;
            $data_session['status_perpustakaan'] = "login";
            $data_session['level'] = "Perpustakaan";
            $data_session['id_hak_akses'] = "4";
            $this->session->set_userdata($data_session);
          }
        if ($this->session->userdata('id_hak_akses')=='4') {
            // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
            $where  = array('id_level'=>$this->session->userdata('id_level'));
            // // $this->M_login->last_login($last_login,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
            redirect(base_url()."Perpustakaan/");//Controller/function
          }
    }elseif ($guru->num_rows() == 1) {
        foreach ($guru->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          $data_session['kode_guru'] = $sess->kode_guru;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_nilai'] = "login";
          $data_session['level'] = "Nilai";
          $data_session['id_hak_akses'] = "5";
          $this->session->set_userdata($data_session);
          }
        if ($this->session->userdata('id_hak_akses')=='5') {
            // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
            $where  = array('id_level'=>$this->session->userdata('id_level'));
            // // $this->M_login->last_login($last_login,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
            redirect(base_url()."Nilai/");//Controller/function
          }
    }elseif ($TU->num_rows() == 1) {
      foreach ($TU->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['email'] = $sess->email;
          // $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_keuangan'] = "login";
          $data_session['level'] = "Keuangan";
          $data_session['id_hak_akses'] = "6";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('id_hak_akses')=='6') {
          // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_level'=>$this->session->userdata('id_level'));
          // // $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Keuangan/");//Controller/function
        }
    }elseif ($PetugasAlumni->num_rows() == 1) {
      foreach ($PetugasAlumni->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['email'] = $sess->email;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_petugasalumni'] = "login";
          $data_session['level'] = "PetugasAlumni";
          $this->session->set_userdata($data_session);
        }
        if ($this->session->userdata('level')=='PetugasAlumni') {
            // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
            $where  = array('id_level'=>$this->session->userdata('id_level'));
            // // $this->M_login->last_login($last_login,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
            redirect(base_url()."PetugasAlumni/");//Controller/function
          }
    }elseif ($Alumni->num_rows() == 1) {
      foreach ($Alumni->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['email'] = $sess->email;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_alumni'] = "login";
          $data_session['level'] = "Alumni";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('level')=='Alumni') {
          // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_level'=>$this->session->userdata('id_level'));
          // // $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Alumni/");//Controller/function
        }
  }
  else{
    //$this->session->set_userdata('blank',$data_session);
    $this->session->set_flashdata('pesan','<div class="alert alert-danger">Username atau Password yang anda masukan salah!</div>');
    redirect(base_url().'login');
  }
  }

  function aksi_login_email(){
    $username = $this->input->post('username', TRUE);
    $email = $this->input->post('email', TRUE);
    $password = $this->input->post('password', TRUE);
    echo $email.$username."-".$password;
    
      $where = array(
        'email' => $email,
        // 'username' => $username,
        'password' => md5($password),
        // 'level' => "Admin",
        'id_hak_akses' => "2",
        );
      $whereKesiswaan = array(
        'email' => $email,
        // 'username' => $username,
        'password' => md5($password),
        // 'level' => "Kesiswaan",
        'id_hak_akses' => "3",
        );
      $wherePetugasPerpus = array(
        'email' => $email,
        // 'username' => $username,
        'password' => md5($password),
        // 'level' => "PetugasPerpus",
        'id_hak_akses' => "4",
        );
      $whereGuru = array(
        'email' => $email,
        // 'username' => $username,
        'password' => md5($password),
        // 'level' => "Guru",
        'id_hak_akses' => "5",
        );
      $whereTU = array(
        'email' => $email,
        // 'username' => $username,
        'password' => md5($password),
        // 'level' => "TU",
        'id_hak_akses' => "6",
        );
      $wherePetugasAlumni = array(
        'email' => $email,
        // 'username' => $username,
        'password' => md5($password),
        'level' => "PetugasAlumni",
        );
      $whereAlumni = array(
        'email' => $email,
        // 'username' => $username,
        'password' => md5($password),
        'level' => "Alumni",
        );

    $cek = $this->M_login->cek_login("tabel_level",$where);
    $kesiswaan = $this->M_login->cek_login("tabel_level",$whereKesiswaan);
    $petugasPerpus = $this->M_login->cek_login("tabel_level",$wherePetugasPerpus);
    $guru = $this->M_login->cek_login("tabel_level",$whereGuru);
    $TU = $this->M_login->cek_login("tabel_level",$whereTU);
    $PetugasAlumni = $this->M_login->cek_login("tabel_level",$wherePetugasAlumni);
    $Alumni = $this->M_login->cek_login("tabel_level",$whereAlumni);

    //logika
    if ($cek->num_rows() == 1) {
      foreach ($cek->result() as $sess) {
        // $sess_data['logged_in'] = 'Sudah Loggin';
        $data_session['id_level'] = $sess->id_level;
        $data_session['username'] = $sess->username;
        // $data_session['email'] = $sess->email;
        $data_session['password'] = $sess->password;
        // $data_session['cdate'] = $sess->cdate;
        // $data_session['lv'] = $sess->level;
        $data_session['status_admin'] = "login";
        $data_session['status_akademik'] = "login";
        $data_session['status_perpustakaan'] = "login";
        $data_session['status_nilai'] = "login";
        $data_session['status_keuangan'] = "login";
        $data_session['status_petugasalumni'] = "login";
        $data_session['level'] = "Admin";
        $data_session['id_hak_akses'] = "2";
        $this->session->set_userdata($data_session);

        // $data_session = array('id'=>$sess->id_level,
        //   'level'=>"Admin",'username'=>$sess->username,'cdate'=>$sess->cdate,'lv'=>$sess->level,
        //   'status_admin'=>"login");
        // $this->session->set_userdata($data_session);
      }
      if ($this->session->userdata('id_hak_akses')=='2') {
        // $last_login1 = array('last_login' =>date('Y-m-d H:i:s') );
        $where  = array('id_level'=>$this->session->userdata('id_level'));
        // // $this->M_login->last_login($last_login1,$where);

        $this->session->set_userdata('login',$data_session);
        $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
        redirect(base_url()."Admin/");//Controller/function
      }
      }elseif ($kesiswaan->num_rows() == 1) {
      foreach ($kesiswaan->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_akademik'] = "login";
          $data_session['level'] = "Akademik";
          $data_session['id_hak_akses'] = "3";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('id_hak_akses')=='3') {
          // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_level'=>$this->session->userdata('id_level'));
          // // $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Akademik/");//Controller/function
        }
    }elseif ($petugasPerpus->num_rows() == 1) {
        foreach ($petugasPerpus->result() as $sess) {
            $data_session['id_level'] = $sess->id_level;
            $data_session['username'] = $sess->username;
            $data_session['password'] = $sess->password;
            // $data_session['cdate'] = $sess->cdate;
            // $data_session['lv'] = $sess->level;
            $data_session['status_perpustakaan'] = "login";
            $data_session['level'] = "Perpustakaan";
            $data_session['id_hak_akses'] = "4";
            $this->session->set_userdata($data_session);
          }
        if ($this->session->userdata('id_hak_akses')=='4') {
            // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
            $where  = array('id_level'=>$this->session->userdata('id_level'));
            // // $this->M_login->last_login($last_login,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
            redirect(base_url()."Perpustakaan/");//Controller/function
          }
    }elseif ($guru->num_rows() == 1) {
        foreach ($guru->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          $data_session['kode_guru'] = $sess->kode_guru;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_nilai'] = "login";
          $data_session['level'] = "Nilai";
          $data_session['id_hak_akses'] = "5";
          $this->session->set_userdata($data_session);
          }
        if ($this->session->userdata('id_hak_akses')=='5') {
            // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
            $where  = array('id_level'=>$this->session->userdata('id_level'));
            // // $this->M_login->last_login($last_login,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
            redirect(base_url()."Nilai/");//Controller/function
          }
    }elseif ($TU->num_rows() == 1) {
      foreach ($TU->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['email'] = $sess->email;
          // $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_keuangan'] = "login";
          $data_session['level'] = "Keuangan";
          $data_session['id_hak_akses'] = "6";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('id_hak_akses')=='6') {
          // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_level'=>$this->session->userdata('id_level'));
          // // $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Keuangan/");//Controller/function
        }
    }elseif ($PetugasAlumni->num_rows() == 1) {
      foreach ($PetugasAlumni->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['email'] = $sess->email;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_petugasalumni'] = "login";
          $data_session['level'] = "PetugasAlumni";
          $this->session->set_userdata($data_session);
        }
        if ($this->session->userdata('level')=='PetugasAlumni') {
            // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
            $where  = array('id_level'=>$this->session->userdata('id_level'));
            // // $this->M_login->last_login($last_login,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
            redirect(base_url()."PetugasAlumni/");//Controller/function
          }
    }elseif ($Alumni->num_rows() == 1) {
      foreach ($Alumni->result() as $sess) {
          $data_session['id_level'] = $sess->id_level;
          $data_session['email'] = $sess->email;
          $data_session['username'] = $sess->username;
          $data_session['password'] = $sess->password;
          // $data_session['cdate'] = $sess->cdate;
          // $data_session['lv'] = $sess->level;
          $data_session['status_alumni'] = "login";
          $data_session['level'] = "Alumni";
          $this->session->set_userdata($data_session);
        }
      if ($this->session->userdata('level')=='Alumni') {
          // // $last_login = array('last_login' =>date('Y-m-d H:i:s') );
          $where  = array('id_level'=>$this->session->userdata('id_level'));
          // // $this->M_login->last_login($last_login,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success">Login sukses.</div>');
          redirect(base_url()."Alumni/");//Controller/function
        }
  }
  else{
    //$this->session->set_userdata('blank',$data_session);
    $this->session->set_flashdata('pesan','<div class="alert alert-danger">Username atau Password yang anda masukan salah!</div>');
    redirect(base_url().'login');
  }
  }

  function logout(){
    $this->session->sess_destroy();
    redirect(base_url('Login'));
  }

}