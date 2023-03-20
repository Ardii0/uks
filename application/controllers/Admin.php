<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('status_admin')!='login') {
            redirect(base_url('Login'));
        }
    }
    public function index()
    {
        // $data['total_paket_wedding'] = $this->M_admin->paket_wedding_total_rows();
        // $data['total_konsumen'] = $this->M_admin->konsumen_total_rows();
        // $data['total_pesanan'] = $this->M_admin->pesanan_total_rows();
        // $data['total_pembayaran_dp'] = $this->M_admin->pembayaran_dp_total_rows();
        // $data['total_pembayaran_pelunasan'] = $this->M_admin->pembayaran_pelunasan_total_rows();
        // $data['total_pembayaran_lunas'] = $this->M_admin->pembayaran_lunas_total_rows();
        $this->load->view('petugas/dashboard');
    }

    // Setting
    public function upload_image($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/admin/setting_sekolah/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value))
        {
            return array( false, '' );
        }
        else
        {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array( true, $nama );
        }
    }

    public function update_setting_sekolah()
    {
        $foto = $this->upload_image('foto');
        if($foto[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload foto.');
            redirect(base_url('Admin/error'));
        }
        else
        {
            $data = array
            (
            'foto' => $foto[1],
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'tanggal_regristasi' => $this->input->post('tanggal_regristasi'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'alamat' => $this->input->post('alamat'),
            'email_sekolah' => $this->input->post('email_sekolah'),
            );
            // $masuk=$this->m_akademik->ubah_setting_sekolah('tabel_sekolah', $data);
            $masuk=$this->M_admin->ubah_setting_sekolah('tabel_sekolah', $data, array('id_sekolah'=>$this->input->post('id_sekolah')));
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Admin/setting'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Admin/setting'));
            }
        }
    }

    public function setting()
    {
        $data['hak_akses'] = $this->M_admin->get_hak_akses('hak_akses');
        $data['data_user'] = $this->M_admin->get_user('data_user');
        $data['setting_perpustakan']=$this->M_admin->get_setting_perpus('setting_perpustakaan')->result();
        $data['sekolah']=$this->M_admin->get_sekolah('tabel_sekolah')->result();
        $data['user']=$this->M_admin->get_userByLogin('tabel_level')->result();
        $this->load->view('petugas/setting/setting', $data);
    }

    public function aksi_tambah_user()
    {
        $data = array
        (
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),
            'id_hak_akses' => $this->input->post('id_hak_akses'),
        );
        $masuk=$this->M_admin->tambah_user('tabel_level', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Admin/setting'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/setting'));
        }
    }

    public function delete_user($id_level)
    {
        $hapus=$this->M_admin->delete_user('tabel_level', 'id_level', $id_level);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Admin/setting'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/setting/error'));
        }

    }

    public function changepassword()
    {
        // $data['user'] = $this->db->get('tabel_level', ['username' => $this->session->userdata('username')])->result();
        $data['user']=$this->M_admin->get_userByLogin('tabel_level')->result();
        // $this->form_validation->set_rules('current_password', 'Password Sekarang', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|matches[password_baru]');
            // $current_password = $this->input->post('current_password');
            $password_baru = $this->input->post('password_baru');
            $password_baru2 = $this->input->post('password_baru2');
            // foreach($data['user'] as $item)
            // {
            // if(md5($current_password)!==$item->password){
            //     $this->session->set_flashdata('message', 'Password yang anda masukan tidak sama dengan yang ada di database');
            //     redirect(base_url('Admin/setting'));
            // }
            // else{
                if($password_baru !== $password_baru2){
                    $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                    redirect(base_url('Admin/setting'));
                }else{
                    // $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', md5($password_baru));
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('tabel_level');
                    $this->session->set_flashdata('message', 'berhasil');
                    redirect(base_url('Admin/setting'));
                }
            // } 
            // }
    }

    public function hak_akses($id_level)
    {
        $data['hak_akses'] = $this->M_admin->get_hak_akses('hak_akses');
        $data['user']=$this->M_admin->get_user_by_id($id_level)->result();
        $this->load->view('petugas/setting/hak_akses', $data);
    }

    public function update_hak_akses()
    {
        $data =  [
            'id_hak_akses' => $this->input->post('id_hak_akses'),
        ];
        $logged=$this->M_admin->ubah_hak_akses('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Admin/hak_akses/'.$this->input->post('id_level')));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/hak_akses/'.$this->input->post('id_level')));
        }
    }

    public function setting_perpustakaan()
    {
        $data['perpus']=$this->M_admin->get_setting_perpus('setting_perpustakaan')->result();
        $this->load->view('petugas/setting/setting_perpustakaan', $data);
    }

    public function update_setting_perpustakaan()
    {
        $data =  [
            'maksimal_pengembalian_hari' => $this->input->post('maksimal_pengembalian_hari'),
            'denda' => $this->input->post('denda'),
        ];
        $logged=$this->M_admin->ubah_setting_perpus('setting_perpustakaan', $data, array('id_setting_perpus'=>$this->input->post('id_setting_perpus')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Admin/setting'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/setting/'.$this->input->post('id_setting_perpus')));
        }
    }

    //end===
}