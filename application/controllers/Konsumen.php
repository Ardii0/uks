<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konsumen');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_konsumen')!='login') {
            redirect(base_url('Login'));
        }
    }
    
    public function index()
    {
        $isi['menu_paket'] = $this->db->get('menu_paket')->result();
        $this->load->view('konsumen/dashboard', $isi);

    }

    //=================================================================================================

    public function paket_wedding()
    {
        $this->load->model('m_konsumen');
        $data['data_paket_wedding'] = $this->m_konsumen->get_all_data_paket_wedding('paket_wedding');
        $this->load->view('konsumen/paket_wedding/data_paket_wedding', $data);
    }

    public function lihat_paket_wedding($id_paket_wedding)
    {
        $data['paket_wedding']=$this->m_konsumen->edit_paket_wedding('tabel_paket_wedding', $id_paket_wedding)->result();
        $this->load->view('konsumen/paket_wedding/lihat_paket_wedding', $data);
    }

    public function pesanan($id_paket_wedding)
    {
        $data['paket_wedding']=$this->m_konsumen->edit_paket_wedding('tabel_paket_wedding', $id_paket_wedding)->result();
        $data['dt'] = $this->m_konsumen->ambil('tabel_admin',array('id_admin'=>$this->session->userdata('id_admin')))->row();
        $this->load->view('konsumen/paket_wedding/pesan_paket_wedding', $data);
    }

    public function aksi_tambah_pesanan()
    {
        $data = array
            (
                'gambar_pw' => $this->input->post('gambar_pw'),
                'judul_pw' => $this->input->post('judul_pw'),
                'harga_pw' => $this->input->post('harga_pw'),
                'dp_pw' => $this->input->post('dp_pw'),
                'pelunasan_pw' => $this->input->post('pelunasan_pw'),
                'deskripsi_pw' => $this->input->post('deskripsi_pw'),
                'decoration_pw' => $this->input->post('decoration_pw'),
                'makeup_artist_pw' => $this->input->post('makeup_artist_pw'),
                'documentation_pw' => $this->input->post('documentation_pw'),
                'catering_pw' => $this->input->post('catering_pw'),
                'entertainment_pw' => $this->input->post('entertainment_pw'),
                'efek_flashmob_pw' => $this->input->post('efek_flashmob_pw'),
                'exclusive_pw' => $this->input->post('exclusive_pw'),
                'nama_pemesan' => $this->input->post('nama_pemesan'),
                'tanggal_acara' => $this->input->post('tanggal_acara'),
                'no_telp_pemesan' => $this->input->post('no_telp_pemesan'),
                'email_pemesan' => $this->input->post('email_pemesan'),
                'alamat_pemesan' => $this->input->post('alamat_pemesan'),
                'id_paket_wedding' => $this->input->post('id_paket_wedding'),
                'id_admin' => $this->input->post('id_admin'),
                'username' => $this->input->post('username'),
                'tanggal_pesanan' => date('Y-m-d H:i:s'),
                'status' => '0',
                'del_flag' => '1',
            );
            $data1 = array (
                'nama_pemesan' => $this->input->post('nama_pemesan'),
                'no_telp_pemesan' => $this->input->post('no_telp_pemesan'),
                'email_pemesan' => $this->input->post('email_pemesan'),
                'alamat_pemesan' => $this->input->post('alamat_pemesan'),
                'judul_pw' => $this->input->post('judul_pw'),
                'tanggal_acara' => $this->input->post('tanggal_acara'),
                'harga_pw' => $this->input->post('harga_pw'),
                'dp_pw' => $this->input->post('dp_pw'),
                'pelunasan_pw' => $this->input->post('pelunasan_pw'),
                'tanggal_pesanan' => date('Y-m-d H:i:s'),
            );
            $masuk1=$this->m_konsumen->ubah('tabel_admin', $data1, array('id_admin'=>$this->input->post('id_admin')));
            $masuk=$this->m_konsumen->tambah('tabel_pesanan', $data, $masuk1);
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Konsumen/paket_wedding'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Konsumen/tambah_paket_wedding'));
            }
    }

//===================================================================================================

    public function pembayaran()
      {
          $data['dt'] = $this->m_konsumen->ambil('tabel_admin',array('id_admin'=>$this->session->userdata('id_admin')))->row();
          $this->load->view('konsumen/pembayaran/data_pembayaran',$data);
      }

    public function dp_pesanan()
      {
          $data['dt'] = $this->m_konsumen->ambil('tabel_admin',array('id_admin'=>$this->session->userdata('id_admin')))->row();
          $this->load->view('konsumen/pembayaran/dp_pesanan',$data);
      }

    public function konfirmasi_pembayaran_dp()
      {
          $data['dt'] = $this->m_konsumen->ambil('tabel_admin',array('id_admin'=>$this->session->userdata('id_admin')))->row();
          $this->load->view('konsumen/pembayaran/konfirmasi_pembayaran_dp',$data);
      }

    public function konfirmasi_dp()
    {
        $bukti_pembayaran_dp = $this->upload_img_bukti_pembayaran_dp('bukti_pembayaran_dp');
        if($bukti_pembayaran_dp[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'Gagal Upload Bukti Pembayaran.');
            redirect(base_url('konsumen/konfirmasi_pembayaran_dp'));
        }
        else
        {
        
        $data = array (
                'bukti_pembayaran_dp' => $bukti_pembayaran_dp[1],
                'no_invoice_dp' => $this->input->post('no_invoice_dp'),
                'nama_bank_dp' => $this->input->post('nama_bank_dp'),
                'tanggal_bayar_dp' => $this->input->post('tanggal_bayar_dp'),
                'bayar_dp' => $this->input->post('bayar_dp'),
                'status_pembayaran_dp' => '1',
                'level' => '2',
            );
            $masuk=$this->m_konsumen->ubah('tabel_admin', $data, array('id_admin'=>$this->input->post('id_admin')));
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('konsumen/pembayaran'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('konsumen/konfirmasi_pembayaran_dp/'));
            }
        }
    }

    public function pelunasan_pesanan()
      {
          $data['dt'] = $this->m_konsumen->ambil('tabel_admin',array('id_admin'=>$this->session->userdata('id_admin')))->row();
          $this->load->view('konsumen/pembayaran/pelunasan_pesanan',$data);
      }

    public function konfirmasi_pembayaran_pelunasan()
      {
          $data['dt'] = $this->m_konsumen->ambil('tabel_admin',array('id_admin'=>$this->session->userdata('id_admin')))->row();
          $this->load->view('konsumen/pembayaran/konfirmasi_pembayaran_pelunasan',$data);
      }

    public function konfirmasi_pelunasan()
    {
        $bukti_pembayaran_pelunasan = $this->upload_img_bukti_pembayaran_pelunasan('bukti_pembayaran_pelunasan');
        if($bukti_pembayaran_pelunasan[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'Gagal Upload Bukti Pembayaran.');
            redirect(base_url('konsumen/konfirmasi_pembayaran_dp'));
        }
        else
        {
        
        $data = array (
                'bukti_pembayaran_pelunasan' => $bukti_pembayaran_pelunasan[1],
                'no_invoice_pelunasan' => $this->input->post('no_invoice_pelunasan'),
                'nama_bank_pelunasan' => $this->input->post('nama_bank_pelunasan'),
                'tanggal_bayar_pelunasan' => $this->input->post('tanggal_bayar_pelunasan'),
                'bayar_pelunasan' => $this->input->post('bayar_pelunasan'),
                'status_pembayaran_pelunasan' => '1',
                'level' => '2',
            );
            $masuk=$this->m_konsumen->ubah('tabel_admin', $data, array('id_admin'=>$this->input->post('id_admin')));
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('konsumen/pembayaran'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('konsumen/konfirmasi_pembayaran_dp/'));
            }
        }
    }

    public function riwayat()
      {
          $data['dt'] = $this->m_konsumen->ambil('tabel_admin',array('id_admin'=>$this->session->userdata('id_admin')))->row();
          $this->load->view('konsumen/pembayaran/riwayat',$data);
      }
    

//====================================================================================================

    public function profil()
      {
          $data['dt'] = $this->m_konsumen->ambil('tabel_admin',array('id_admin'=>$this->session->userdata('id_admin')))->row();
          $this->load->view('konsumen/profile/profil',$data);
      }

    public function update_profil()
    {
        $data = array (
            'nama' => $this->input->post('nama'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'level' => '2',
        );
        $masuk=$this->m_konsumen->ubah('tabel_admin', $data, array('id_admin'=>$this->input->post('id_admin')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('konsumen/profil'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('konsumen/profil/'));
        }
    }

    public function update_profil_password()
    {
        $data = array (
            'password' => md5($this->input->post('password')),
            'level' => '2',
        );
        $masuk=$this->m_konsumen->ubah('tabel_admin', $data, array('id_admin'=>$this->input->post('id_admin')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('konsumen/profil'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('konsumen/profil/'));
        }
    }

//=============================================================================================================
     public function upload_excel($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['max_size'] = '5000'; //max file kurang lebih 5mb
        $config['overwrite'] = true;
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value))
            {
                return array( false, '' );
            }
        else {
                $fn = $this->upload->data();
                $nama = $fn['file_name'];
                return array( true, $nama );
        }
    }

//==================upload img===========
    public function upload_img_bukti_pembayaran_dp($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/admin/bukti_transfer_dp/';
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

    public function upload_img_bukti_pembayaran_pelunasan($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/admin/bukti_transfer_pelunasan/';
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

    //end===
}