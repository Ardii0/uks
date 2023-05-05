<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_alumni');
        $this->load->model('m_petugasalumni');
        $this->load->helpers('my_helper');
        $this->load->helper('text');
        if ($this->session->userdata('status_alumni')!='login') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'alumni',
            'submenu'=>'alumni',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'alumni',
            'submenu_admin'=> 'alumni'
            ];
        $query_event = "SELECT * from tabel_event where status = 'aktif' AND DATE(tanggal_event) >= DATE(NOW()) ORDER BY tanggal_posting DESC";
        $query_lowongan = "SELECT * from tabel_lowongan where is_tampil = 'Ya' AND DATE(akhir_waktu) >= DATE(NOW()) ORDER BY tanggal_posting DESC";
        $data['count_alumni'] = $this->m_petugasalumni->get_num_row_data('level', 'Alumni', 'tabel_level');
        $data['count_event'] = $this->db->query($query_event)->num_rows();
        $data['count_lowker'] = $this->db->query($query_lowongan)->num_rows();
        $data['event'] = $this->db->query($query_event)->result();
        $data['bursa_kerja'] = $this->db->query($query_lowongan)->result();
        $this->load->view('alumni/dashboard', $data);
    }
// Data Diri
    public function data_diri()
    {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'data_diri',
            'submenu'=>'data_diri',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'data_diri',
            'submenu_admin'=> 'data_diri'
            ];
        $this->load->view('alumni/data_diri/data_diri', $data);
    }

    public function get_daftarByNisn(){
        $id_daftar = $this->input->post('id_daftar',TRUE);
        $data = $this->m_alumni->getwhere('tabel_daftar', array('id_daftar' => $id_daftar))->result();
        echo json_encode($data);
    }

    public function bekerja()
    {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'data_diri',
            'submenu'=>'data_diri',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'data_diri',
            'submenu_admin'=> 'data_diri'
            ];
        $data['data'] = $this->m_alumni->getwhere('tabel_daftar', array('diterima' => 'G'))->result();
        $data['user'] = $this->m_alumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readydata'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readystatus'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Bekerja'))->result();
        $this->load->view('alumni/data_diri/bekerja/bekerja', $data);
    }

    public function wirausaha()
    {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'data_diri',
            'submenu'=>'data_diri',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'data_diri',
            'submenu_admin'=> 'data_diri'
            ];
        $data['data'] = $this->m_alumni->getwhere('tabel_daftar', array('diterima' => 'G'))->result();
        $data['user'] = $this->m_alumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readydata'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readystatus'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Wirausaha'))->result();
        $this->load->view('alumni/data_diri/wirausaha/wirausaha', $data);
    }

    public function kuliah()
    {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'data_diri',
            'submenu'=>'data_diri',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'data_diri',
            'submenu_admin'=> 'data_diri'
            ];
        $data['data'] = $this->m_alumni->getwhere('tabel_daftar', array('diterima' => 'G'))->result();
        $data['user'] = $this->m_alumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readydata'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readystatus'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Kuliah'))->result();
        $this->load->view('alumni/data_diri/kuliah/kuliah', $data);
    }

    public function lainnya()
    {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'data_diri',
            'submenu'=>'data_diri',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'data_diri',
            'submenu_admin'=> 'data_diri'
            ];
        $data['data'] = $this->m_alumni->getwhere('tabel_daftar', array('diterima' => 'G'))->result();
        $data['user'] = $this->m_alumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readydata'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level')))->result();
        $data['readystatus'] = $this->m_alumni->getwhere('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Lainnya'))->result();
        $this->load->view('alumni/data_diri/lainnya/lainnya', $data);
    }

    public function tambah_datadiri()
    {
        $data = [
            'id_level' => $this->session->userdata('id_level'),
            'id_daftar' => $this->input->post('id_daftar'),
            'jurusan_sekolah' => $this->input->post('jurusan_sekolah'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'status' => $this->input->post('status'),
            'nama_instansi' => $this->input->post('nama_instansi'),
            'jabatan' => $this->input->post('jabatan'),
            'tanggal_kerja' => $this->input->post('tanggal_kerja'),
            'bidang_instansi' => $this->input->post('bidang_instansi'),
            'lokasi_instansi' => $this->input->post('lokasi_instansi'),
            'nama_instansi2' => $this->input->post('nama_instansi2'),
            'jabatan2' => $this->input->post('jabatan2'),
            'tanggal_kerja2' => $this->input->post('tanggal_kerja2'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'jenis_usaha' => $this->input->post('jenis_usaha'),
            'tahun_usaha' => $this->input->post('tahun_usaha'),
            'nama_perguruan' => $this->input->post('nama_perguruan'),
            'jurusan' => $this->input->post('jurusan'),
            'tahun_perguruan' => $this->input->post('tahun_perguruan'),
        ];
        $this->m_alumni->input_data('data_diri', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_datadiri()
    {
        $data = array (
            'jurusan_sekolah' => $this->input->post('jurusan_sekolah'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'status' => $this->input->post('status'),
            'nama_instansi' => $this->input->post('nama_instansi'),
            'jabatan' => $this->input->post('jabatan'),
            'tanggal_kerja' => $this->input->post('tanggal_kerja'),
            'bidang_instansi' => $this->input->post('bidang_instansi'),
            'lokasi_instansi' => $this->input->post('lokasi_instansi'),
            'nama_instansi2' => $this->input->post('nama_instansi2'),
            'jabatan2' => $this->input->post('jabatan2'),
            'tanggal_kerja2' => $this->input->post('tanggal_kerja2'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'jenis_usaha' => $this->input->post('jenis_usaha'),
            'tahun_usaha' => $this->input->post('tahun_usaha'),
            'nama_perguruan' => $this->input->post('nama_perguruan'),
            'jurusan' => $this->input->post('jurusan'),
            'tahun_perguruan' => $this->input->post('tahun_perguruan'),
        );
        $this->m_alumni->edit_data('data_diri', $data, array('id_level' => $this->session->userdata('id_level')));
        redirect($_SERVER['HTTP_REFERER']);
    }

    //  Bursa Kerja
    public function bursa_kerja()
    {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'bursa_kerja',
            'submenu'=>'bursa_kerja',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'bursa_kerja',
            'submenu_admin'=> 'bursa_kerja'
            ];
        $this->load->model('M_alumni');
        $data['bursakerja'] = $this->m_alumni->get_bursa_kerja('bursakerja');
        $this->load->view('alumni/bursa_kerja/bursa_kerja', $data);
    }

    public function detail_bursaKerja($id_lowongan)
    {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'bursa_kerja',
            'submenu'=>'bursa_kerja',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'bursa_kerja',
            'submenu_admin'=> 'bursa_kerja'
            ];
        $data['lowongan']=$this->m_alumni->get_bursaById('tabel_lowongan', $id_lowongan)->result();
        $bursaKerja['bursaKerja'] = $this->m_alumni->get_bursa_kerja('bursaKerja');
        $this->load->view('alumni/bursa_kerja/bursakerja_detail', $data + $bursaKerja);
    }


  //  Events
  public function event()
  {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'event',
            'submenu'=>'event',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'event',
            'submenu_admin'=> 'event'
            ];
      $this->load->model('M_alumni');
      $data['event'] = $this->m_alumni->get_event('event');
      $this->load->view('alumni/event/event', $data);
  }

  public function tambah_event()
  {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'event',
            'submenu'=>'event',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'event',
            'submenu_admin'=> 'event'
            ];
      $this->load->view('alumni/event/tambah_event', $data);
  }

  public function upload_img_event($value)
  {
      $kode = round(microtime(true) * 1000);
      $config['upload_path'] = './uploads/alumni/event/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_size'] = '100000';
      $config['file_name'] = $kode;
      $this->upload->initialize($config);
      if (!$this->upload->do_upload($value)) {
          return array(false, '');
      } else {
          $fn = $this->upload->data();
          $nama = $fn['file_name'];
          return array(true, $nama);
      }
  }

  public function aksi_tambah_event()
  {
      $gambar = $this->upload_img_event('gambar');
      if ($gambar[0] == false) {
          //$this->upload->display_errors();
          $this->session->set_flashdata('error', 'gagal upload gambar.');
          redirect(base_url('alumni/event'));
      } else {
          $data = array
          (
              'id_user' => $this->input->post('id_user'),
              'event_title' => $this->input->post('event_title'),
              'event_slug' => strtolower($this->input->post('event_title')),
              'deskripsi' => $this->input->post('deskripsi'),
              'tanggal_event' => $this->input->post('tanggal_event'),
              'tanggal_posting' => date("Y-m-d H:i:s"),
              'status' => 'nonaktif',
              'gambar' => $gambar[1]
          );
          $event = $this->m_alumni->input_data('tabel_event', $data);
          if ($event) {
              $this->session->set_flashdata('sukses', 'berhasil');
              redirect(base_url('alumni/event/event'));
          } else {
              $this->session->set_flashdata('error', 'gagal..');
              redirect(base_url('alumni/event/tambah_event'));
          }
      }
  }

  public function edit_event($id)
  {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'event',
            'submenu'=>'event',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'event',
            'submenu_admin'=> 'event'
            ];
      $this->load->model('M_alumni');
      $data['data_event'] = $this->m_alumni->get_data_id('tabel_event', 'id_event', $id)->result();
      $this->load->view('alumni/event/edit_event', $data);
  }
  public function aksi_edit_event()
  {
      // echo '<script>console.log("Hola")</script>';
      $gambar = $this->upload_img_event('gambar');
      if ($gambar[0] == false) {
          $data = array
          (
              'id_user' => $this->input->post('id_user'),
              'event_title' => $this->input->post('event_title'),
              'event_slug' => strtolower($this->input->post('event_title')),
              'deskripsi' => $this->input->post('deskripsi'),
              'tanggal_event' => $this->input->post('tanggal_event'),
              'tanggal_posting' => date("Y-m-d H:i:s"),
          );
          $event = $this->m_alumni->edit_data('tabel_event', $data, array('id_event' => $this->input->post('id_event')));
          if ($event) {
              $this->session->set_flashdata('sukses', 'berhasil');
              redirect(base_url('alumni/event/event'));
          } else {
              $this->session->set_flashdata('error', 'gagal..');
              redirect(base_url('alumni/event/edit_event' . $this->input->post('id_event')));
          }
      } else {
          $data = array
          (
              'id_user' => $this->input->post('id_user'),
              'event_title' => $this->input->post('event_title'),
              'event_slug' => strtolower($this->input->post('event_title')),
              'deskripsi' => $this->input->post('deskripsi'),
              'tanggal_event' => $this->input->post('tanggal_event'),
              'tanggal_posting' => date("Y-m-d H:i:s"),
              'gambar' => $gambar[1]
          );
          $event = $this->m_alumni->edit_data('tabel_event', $data, array('id_event' => $this->input->post('id_event')));
          if ($event) {
              $this->session->set_flashdata('sukses', 'berhasil');
              redirect(base_url('alumni/event/event'));
          } else {
              $this->session->set_flashdata('error', 'gagal..');
              redirect(base_url('alumni/event/edit_event' . $this->input->post('id_event')));
          }
      }
  }

  public function activate_event($id)
  {
      $data = array (
          'status' => 'aktif',
      );
      $this->m_alumni->edit_data('tabel_event', $data, array('id_event'=>$id));
      redirect(base_url('alumni/event'));
  }

  public function nonactivate_event($id)
  {
      $data = array (
          'status' => 'nonaktif',
      );
      $this->m_alumni->edit_data('tabel_event', $data, array('id_event'=>$id));
      redirect(base_url('alumni/event'));
  }

  public function hapus_event($id_event)
  {
      $hapus = $this->m_alumni->delete_data('tabel_event', 'id_event', $id_event);
      if ($hapus) {
          $this->session->set_flashdata('sukses', 'berhasil');
          redirect(base_url('alumni/event/event'));
      } else {
          $this->session->set_flashdata('error', 'gagal..');
          redirect(base_url('alumni/event/event/' . $this->input->post('id_event')));
      }
  }
 
  public function detail_event($id_event)
  {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'event',
            'submenu'=>'event',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'event',
            'submenu_admin'=> 'event'
            ];
      $data['event']=$this->m_alumni->get_eventById('tabel_event', $id_event)->result();
      $events['events'] = $this->m_alumni->get_event('events');
      $this->load->view('alumni/event/event_detail', $data + $events);
  }

// Testimoni
    public function testimoni()
    {
        $data = [
            'judul' => 'alumni',
            'page' => 'alumni',
            'menu' => 'testimoni',
            'submenu'=>'testimoni',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'testimoni',
            'submenu_admin'=> 'testimoni'
            ];
        $data['testimoni']=$this->m_alumni->get_testimoni_byId('tabel_testimoni')->result();
        $this->load->view('alumni/testimoni/testimoni', $data);
    }
    

    public function delete_testimoni($id_testimoni)
    {
        $hapus=$this->m_alumni->delete_testimoni('tabel_testimoni', 'id_testimoni', $id_testimoni);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Alumni/testimoni'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Alumni/testimoni/error'));
        }

    }

    public function aksi_tambah_testimoni()
    {
        $data = array
        (
            'id_level' => $this->input->post('id_level'),
            'pesan' => $this->input->post('pesan'),
            'tampil' => 'NO',
        );
        $masuk=$this->m_alumni->tambah_testimoni('tabel_testimoni', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Alumni/testimoni'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Alumni/testimoni'));
        }
    }

    // Akun
    public function akun()
    {
        $data['user']=$this->m_alumni->get_userByLogin('tabel_level')->result();
        $this->load->view('alumni/akun/akun', $data);
    }

    public function upload_image($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/alumni/akun/';
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

    public function update_akun()
    {
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password_baru = $this->input->post('password_baru');
        $password_baru2 = $this->input->post('password_baru2');
        $foto = $this->upload_image('foto');
        if ($password_baru == null && $foto[0] == false) {
            $data = array
                (
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                );
                $masuk=$this->m_alumni->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                if($masuk)
                {
                    $this->session->set_flashdata('sukses', 'berhasil update email dan username');
                    redirect(base_url('Alumni/akun'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'gagal..');
                    redirect(base_url('Alumni/akun'));
                }
        }else if($password_baru !== null && $foto[0] == false){
            if($password_baru !== $password_baru2){
                $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                redirect(base_url('Alumni/akun'));
            }else{
                $data = array
                (
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password_baru')),
                );
                $masuk=$this->m_alumni->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                if($masuk)
                {
                    $this->session->set_flashdata('sukses', 'berhasil update email, username, dan password');
                    redirect(base_url('Alumni/akun'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'gagal update email, username, dan password');
                    redirect(base_url('Alumni/akun'));
                }
            }
        }else if($password_baru == null && $foto[0] == true){
            $foto = $this->upload_image('foto');
            if($foto[0]==false)
            {
                $this->session->set_flashdata('error', 'gagal upload foto.');
                redirect(base_url('Alumni/akun'));
            }
            else
            {
                $data = array
                (
                'foto' => $foto[1],
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                );
                $masuk=$this->m_alumni->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                if($masuk)
                {
                    $this->session->set_flashdata('sukses', 'berhasil update foto');
                    redirect(base_url('Alumni/akun'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'gagal update foto');
                    redirect(base_url('Alumni/akun'));
                }
            }
        }else {
            $foto = $this->upload_image('foto');
            if($foto[0]==false)
            {
                $this->session->set_flashdata('error', 'gagal upload foto.');
                redirect(base_url('Alumni/akun'));
            }
            else
            {
                $data = array
                (
                'foto' => $foto[1],
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password_baru')),
                );
                $masuk=$this->m_alumni->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                if($masuk)
                {
                    $this->session->set_flashdata('sukses', 'berhasil update akun');
                    redirect(base_url('Alumni/akun'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'gagal update akun');
                    redirect(base_url('Alumni/akun'));
                }
            }
        }
    }

    //kritik & saran
 //kritik
  public function user_kritik()
  {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'ks',
            'submenu'=>'kritik',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'ks',
            'submenu_admin'=> 'kritik'
            ];
      $data['kritik']=$this->m_alumni->get_kritik_ByUser('tabel_kritik')->result();
      $this->load->view('alumni/kritik/daf_kritik', $data);
  }

  public function form_kritik()
  {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'ks',
            'submenu'=>'kritik',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'ks',
            'submenu_admin'=> 'kritik'
            ];
      $this->load->view('alumni/kritik/tambah_kritik', $data);
  }

  public function aksi_add_kritik()
  {
      $date = date('Y-m-d H:i:s');
      $data = [
          'kritik' => $this->input->post('kritik'),
          'id_user' => $this->input->post('id_user'),
          'tanggal_posting' => $date,
      ];
      $this->m_alumni->tambah_kritik('tabel_kritik', $data);
      redirect(base_url('alumni/user_kritik'));
  }
  
  public function detail_kritik($id_kritik) 
  {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'ks',
            'submenu'=>'kritik',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'ks',
            'submenu_admin'=> 'kritik'
            ];
      $data['detail']=$this->m_alumni->get_detail_kritik('tabel_kritik', $id_kritik)->result();
      $this->load->view('alumni/kritik/detail_kritik', $data);
  }
  
  public function hapus_kritik($id_kritik)
  {
      $hapus=$this->m_alumni->delete_kritik('tabel_kritik', 'id_kritik', $id_kritik);
      if($hapus)
      {
          $this->session->set_flashdata('sukses', 'Berhasil..');
          redirect(base_url('Alumni/user_kritik'));
      }
      else
      {
          $this->session->set_flashdata('error', 'gagal..');
          redirect(base_url('Alumni/kritik/error'));
      }
  }

 //saran
 
  
  public function user_saran()
  {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'ks',
            'submenu'=>'saran',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'ks',
            'submenu_admin'=> 'saran'
            ];
    $data['saran']=$this->m_alumni->get_saran_ByUser('tabel_saran')->result();
    $this->load->view('alumni/saran/daf_saran', $data);
  }

  public function form_saran()
  {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'ks',
            'submenu'=>'saran',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'ks',
            'submenu_admin'=> 'saran'
            ];
      $this->load->view('alumni/saran/tambah_saran', $data);
  }

  public function aksi_add_saran()
  {
      $date = date('Y-m-d H:i:s');
      $data = [
          'saran' => $this->input->post('saran'),
          'id_user' => $this->input->post('id_user'),
          'tanggal_posting' => $date,
      ];
      $this->m_alumni->tambah_saran('tabel_saran', $data);
      redirect(base_url('alumni/user_saran/'));
  }

  public function detail_saran($id_saran) 
  {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'ks',
            'submenu'=>'saran',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'ks',
            'submenu_admin'=> 'saran'
            ];
      $data['detail']=$this->m_alumni->get_detail_saran('tabel_saran', $id_saran)->result();
      $this->load->view('alumni/saran/detail_saran', $data);
  }

  public function hapus_saran($id_saran)
  {
      $hapus=$this->m_alumni->delete_saran('tabel_saran', 'id_saran', $id_saran);
      if($hapus)
      {
          $this->session->set_flashdata('sukses', 'Berhasil..');
          redirect(base_url('Alumni/user_saran'));
      }
      else
      {
          $this->session->set_flashdata('error', 'gagal..');
          redirect(base_url('Alumni/saran/error'));
      }
  }
}