<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('is_login')!=TRUE) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['akun']=$this->Main_model->by_id('admin', $this->session->userdata('id'))->result();
        $this->load->view('akun/akun', $data);
    }

    public function update_akun()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($password == null) {
                    $data = array (
                        'username' => $this->input->post('username')
                    );
                    $masuk=$this->Main_model->ubah_data('admin', $data, array('id'=>$this->input->post('id')));
                    if($masuk)
                    {
                        $this->session->set_flashdata('sukses', 'Berhasil Mengganti Username');
                        redirect(base_url('akun'));
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Tidak Ada yang Di Ubah');
                        redirect(base_url('akun'));
                    }
            }else {
                $data = array (
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password'))
                );
                $masuk=$this->Main_model->ubah_data('admin', $data, array('id'=>$this->input->post('id')));
                if($masuk)
                {
                    $this->session->set_flashdata('sukses', 'Berhasil Mengganti Data Akun');
                    redirect(base_url('akun'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'gagal..');
                    redirect(base_url('akun'));
                }
            }
        }
}