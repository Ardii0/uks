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
    if ($this->session->userdata('is_login') === TRUE) {
      redirect(base_url('Admin/'));
    }
    $this->load->view('auth/login');
  }

//=====Aksi Login======
  function aksi_login(){
    $username = $this->input->post('username', TRUE);
    $password = $this->input->post('password', TRUE);
    echo $username."-".$password;
    
    $where = array(
      // 'email' => $email,
      'username' => $username,
      'password' => md5($password),
      // 'level' => "Admin",
      );
    $cek = $this->M_login->getwhere($where,"admin");

    //logika
    if ($cek->num_rows() == 1) {
      foreach ($cek->result() as $sess) {
        // $sess_data['logged_in'] = 'Sudah Loggin';
        $data_session['id'] = $sess->id;
        $data_session['username'] = $sess->username;
        // $data_session['email'] = $sess->email;
        $data_session['password'] = $sess->password;
        // $data_session['cdate'] = $sess->cdate;
        // $data_session['lv'] = $sess->level;
        $data_session['is_login'] = TRUE;
        $this->session->set_userdata($data_session);

        // $data_session = array('id'=>$sess->id_level,
        //   'level'=>"Admin",'username'=>$sess->username,'cdate'=>$sess->cdate,'lv'=>$sess->level,
        //   'status_admin'=>"login");
        // $this->session->set_userdata($data_session);
      }
      if ($this->session->userdata('is_login') == TRUE) {
        $this->session->set_flashdata('yeay', 'Login Sukses');
        // $last_login1 = array('last_login' =>date('Y-m-d H:i:s') );
        $where  = array('id'=>$this->session->userdata('id'));
        // // $this->M_login->last_login($last_login1,$where);

        $this->session->set_userdata('login',$data_session);
        redirect(base_url()."Admin/");//Controller/function
      }
      }
  else{
    //$this->session->set_userdata('blank',$data_session);
    $this->session->set_flashdata('salah','Username atau Password salah!</div>');
    redirect(base_url());
  }
  }

  function logout(){
    $this->session->sess_destroy();
    redirect(base_url('Login'));
  }
}