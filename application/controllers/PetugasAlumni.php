<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PetugasAlumni extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_alumni');
        $this->load->model('m_petugasalumni');
        $this->load->helpers('my_helper');
        if ($this->session->userdata('status_petugasalumni') != 'login') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'petugasAlumni',
            'submenu'=>'petugasAlumni',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'petugasAlumni',
            'submenu_admin'=> 'petugasAlumni'
            ];
        $query_event = "SELECT * from tabel_event where status = 'aktif' AND DATE(tanggal_event) >= DATE(NOW()) ORDER BY tanggal_posting DESC";
        $query_lowongan = "SELECT * from tabel_lowongan where is_tampil = 'Ya' AND DATE(akhir_waktu) >= DATE(NOW()) ORDER BY tanggal_posting DESC";
        $data['count_alumni'] = $this->m_petugasalumni->get_num_row_data('level', 'Alumni', 'tabel_level');
        $data['count_event'] = $this->db->query($query_event)->num_rows();
        $data['count_lowker'] = $this->db->query($query_lowongan)->num_rows();
        $data['event'] = $this->db->query($query_event)->result();
        $data['bursa_kerja'] = $this->db->query($query_lowongan)->result();
        $this->load->view('petugasalumni/dashboard', $data);
    }

    // Data Angkatan
    public function data_angkatan()
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'data_angkatan',
            'submenu'=>'data_angkatan',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'data_angkatan',
            'submenu_admin'=> 'data_angkatan'
            ];
        $data['tahun_lulus'] = $this->m_alumni->count_group_by('tahun_lulus, COUNT(tahun_lulus) AS jumlah_lulusan', 'tahun_lulus', 'data_diri')->result();
        $this->load->view('petugasalumni/data_angkatan/data_angkatan', $data);
    }

    public function detail_data_angkatan($id)
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'data_angkatan',
            'submenu'=>'data_angkatan',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'data_angkatan',
            'submenu_admin'=> 'data_angkatan'
            ];
        $where = array('tahun_lulus' => $id);
        $row = $this->m_alumni->where_orderby_data('jurusan_sekolah DESC', $where, 'data_diri')->row_array();
        if (isset($row['tahun_lulus'])) {
            $data['user'] = $this->m_alumni->query_single_join('data_diri', 'tabel_level', 'id_level', 'id_level', 'id_data_diri', 'Desc', $where)->result();

            $this->load->view('petugasalumni/data_angkatan/detail_angkatan', $data);
        }
    }

    public function detail_alumni($id)
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'data_angkatan',
            'submenu'=>'data_angkatan',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'data_angkatan',
            'submenu_admin'=> 'data_angkatan'
            ];
        $where = array('id_data_diri' => $id);
        $row = $this->m_alumni->getwhere('data_diri', $where)->row_array();

        if (isset($row['id_level'])) {
            $data['jurusan_sekolah'] = set_value('jurusan_sekolah', $row['jurusan_sekolah']);
            $data['id_daftar'] = set_value('id_daftar', $row['id_daftar']);
            $data['nik'] = set_value('nik', $row['nik']);
            $data['alamat'] = set_value('alamat', $row['alamat']);
            $data['no_telp'] = set_value('no_telp', $row['no_telp']);
            $data['tahun_lulus'] = set_value('tahun_lulus', $row['tahun_lulus']);
            $data['status'] = set_value('status', $row['status']);
            $data['nama_instansi'] = set_value('nama_instansi', $row['nama_instansi']);
            $data['jabatan'] = set_value('jabatan', $row['jabatan']);
            $data['tanggal_kerja'] = set_value('tanggal_kerja', $row['tanggal_kerja']);
            $data['nama_instansi2'] = set_value('nama_instansi2', $row['nama_instansi2']);
            $data['jabatan2'] = set_value('jabatan2', $row['jabatan2']);
            $data['tanggal_kerja2'] = set_value('tanggal_kerja2', $row['tanggal_kerja2']);
            $data['nama_usaha'] = set_value('nama_usaha', $row['nama_usaha']);
            $data['jenis_usaha'] = set_value('jenis_usaha', $row['jenis_usaha']);
            $data['tahun_usaha'] = set_value('tahun_usaha', $row['tahun_usaha']);
            $data['nama_perguruan'] = set_value('nama_perguruan', $row['nama_perguruan']);
            $data['jurusan'] = set_value('jurusan', $row['jurusan']);
            $data['tahun_perguruan'] = set_value('tahun_perguruan', $row['tahun_perguruan']);
            $data['id_data_diri'] = set_value('id_data_diri', $row['id_data_diri']);

            $this->load->view('petugasalumni/data_angkatan/detail_alumni', $data);
        }
    }

    // Event
    public function event()
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'manajement',
            'submenu'=>'event',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'manajement',
            'submenu_admin'=> 'event'
            ];
        $this->load->model('M_alumni');
        $data['data_event'] = $this->m_alumni->get_data('tabel_event');
        $this->load->view('petugasalumni/event/event', $data);
    }

    public function tambah_event()
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'manajement',
            'submenu'=>'event',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'manajement',
            'submenu_admin'=> 'event'
            ];
        $this->load->view('petugasalumni/event/tambah_event', $data);
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
            redirect(base_url('petugasAlumni/event'));
        } else {
            $data = array
            (
                'id_user' => $this->input->post('id_user'),
                'event_title' => $this->input->post('event_title'),
                'event_slug' => strtolower($this->input->post('event_title')),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal_event' => $this->input->post('tanggal_event'),
                'tanggal_posting' => date("Y-m-d H:i:s"),
                'status' => 'aktif',
                'gambar' => $gambar[1]
            );
            $event = $this->m_alumni->input_data('tabel_event', $data);
            if ($event) {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('petugasalumni/event/event'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('petugasalumni/event/tambah_event'));
            }
        }
    }

    public function edit_event($id)
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'manajement',
            'submenu'=>'event',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'manajement',
            'submenu_admin'=> 'event'
            ];
        $this->load->model('M_petugasalumni');
        $data['data_event'] = $this->m_petugasalumni->get_data_id('tabel_event', 'id_event', $id)->result();
        $this->load->view('petugasalumni/event/edit_event', $data);
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
                redirect(base_url('petugasalumni/event/event'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('petugasalumni/event/edit_event' . $this->input->post('id_event')));
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
                redirect(base_url('petugasalumni/event/event'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('petugasalumni/event/edit_event' . $this->input->post('id_event')));
            }
        }
    }

    public function activate_event($id)
    {
        $data = array (
            'status' => 'aktif',
        );
        $this->m_alumni->edit_data('tabel_event', $data, array('id_event'=>$id));
        redirect(base_url('petugasalumni/event'));
    }

    public function nonactivate_event($id)
    {
        $data = array (
            'status' => 'nonaktif',
        );
        $this->m_alumni->edit_data('tabel_event', $data, array('id_event'=>$id));
        redirect(base_url('petugasalumni/event'));
    }

    public function hapus_event($id_event)
    {
        $hapus = $this->m_alumni->delete_data('tabel_event', 'id_event', $id_event);
        if ($hapus) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('petugasalumni/event/event'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('petugasalumni/event/event/' . $this->input->post('id_event')));
        }
    }

    // Bursa Kerja
    public function upload_img($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/petugas_alumni/bursa_kerja/';
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

    public function bursa_kerja()
    {
    $data = [
        'judul' => 'petugasAlumni',
        'page' => 'petugasAlumni',
        'menu' => 'manajement',
        'submenu'=>'bursa_kerja',
        'menu_submenu_admin'=>'',
        'menu_admin' => 'manajement',
        'submenu_admin'=> 'bursa_kerja'
        ];
        $data['bursa_kerja'] = $this->m_petugasalumni->get_filter_data('tanggal_posting', 'DESC', 'tabel_lowongan')->result();
        $this->load->view('petugasalumni/bursa_kerja/bursa_kerja', $data);
    }

    public function tambah_bursa_kerja()
    {
    $data = [
        'judul' => 'petugasAlumni',
        'page' => 'petugasAlumni',
        'menu' => 'manajement',
        'submenu'=>'bursa_kerja',
        'menu_submenu_admin'=>'',
        'menu_admin' => 'manajement',
        'submenu_admin'=> 'bursa_kerja'
        ];
        $data['dt'] = $this->m_petugasalumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->row();
        $this->load->view('petugasalumni/bursa_kerja/tambah_bursa_kerja', $data);
    }

    public function aksi_tambah_bursa_kerja()
    {
        $gambar = $this->upload_img('gambar');
        if ($gambar[0] == false) {
            $data = array
            (
                'gambar' => null,
                'id_user' => $this->input->post('id_user'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'bidang_usaha' => $this->input->post('bidang_usaha'),
                'job_title' => $this->input->post('job_title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'akhir_waktu' => $this->input->post('akhir_waktu'),
                'is_tampil' => $this->input->post('is_tampil'),
            );


            $masuk = $this->m_petugasalumni->input_data('tabel_lowongan', $data);
            if ($masuk) {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('PetugasAlumni/bursa_kerja'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('PetugasAlumni/tambah_bursa_kerja'));
            }
        } else {
            $data = array
            (
                'gambar' => $gambar[1],
                'id_user' => $this->input->post('id_user'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'bidang_usaha' => $this->input->post('bidang_usaha'),
                'job_title' => $this->input->post('job_title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'akhir_waktu' => $this->input->post('akhir_waktu'),
                'is_tampil' => $this->input->post('is_tampil'),
            );


            $masuk = $this->m_petugasalumni->input_data('tabel_lowongan', $data);
            if ($masuk) {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('PetugasAlumni/bursa_kerja'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('PetugasAlumni/tambah_bursa_kerja'));
            }
        }
    }

    public function edit_bursa_kerja($id_lowongan)
    {
        $data['dt'] = $this->m_petugasalumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->row();
        $data['bursa_kerja'] = $this->m_petugasalumni->get_data_id('tabel_lowongan', 'id_lowongan', $id_lowongan)->result();
        $this->load->view('petugasalumni/bursa_kerja/edit_bursa_kerja', $data);
    }

    public function aksi_edit_bursa_kerja()
    {
        $gambar = $this->upload_img('gambar');
        if ($gambar[0] == false) {
            $data = array
            (
                'gambar' => null,
                'id_user' => $this->input->post('id_user'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'bidang_usaha' => $this->input->post('bidang_usaha'),
                'job_title' => $this->input->post('job_title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'akhir_waktu' => $this->input->post('akhir_waktu'),
                'is_tampil' => $this->input->post('is_tampil'),
            );


            $masuk = $this->m_petugasalumni->edit_data('tabel_lowongan', $data, array('id_lowongan' => $this->input->post('id_lowongan')));
            if ($masuk) {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('PetugasAlumni/bursa_kerja'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('PetugasAlumni/edit_bursa_kerja/') . $this->input->post('id_lowongan'));
            }
        } else {
            $data = array
            (
                'gambar' => $gambar[1],
                'id_user' => $this->input->post('id_user'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'bidang_usaha' => $this->input->post('bidang_usaha'),
                'job_title' => $this->input->post('job_title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'akhir_waktu' => $this->input->post('akhir_waktu'),
                'is_tampil' => $this->input->post('is_tampil'),
            );


            $masuk = $this->m_petugasalumni->edit_data('tabel_lowongan', $data, array('id_lowongan' => $this->input->post('id_lowongan')));
            if ($masuk) {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('PetugasAlumni/bursa_kerja'));
            } else {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('PetugasAlumni/tambah_bursa_kerja'));
            }
        }
    }

    public function hapus_bursa_kerja($id_lowongan)
    {
        $this->m_petugasalumni->delete_data('tabel_lowongan', 'id_lowongan', $id_lowongan);
        redirect(base_url('PetugasAlumni/bursa_kerja'));
    }

    //KRITIK
    public function admin_kritik()
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'manajement',
            'submenu'=>'kritik',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'manajement',
            'submenu_admin'=> 'kritik'
            ];
        $data['count_belum_ditanggapi'] = $this->m_alumni->count_field('tanggal_respon =' . NULL, 'tabel_kritik');
        $data['count_ditanggapi'] = $this->m_alumni->count_field('tanggal_respon !=' . NULL, 'tabel_kritik');
        $data['count_all'] = $this->m_alumni->count_all('tabel_kritik');
        $data['kritik']=$this->m_alumni->get_kritik('tabel_kritik')->result();
        $this->load->view('PetugasAlumni/kritik/adm_kritik', $data);
    }
    public function tanggapan_kritik($id_kritik) 
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'manajement',
            'submenu'=>'kritik',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'manajement',
            'submenu_admin'=> 'kritik'
        ];
        $data['dt'] = $this->m_petugasalumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->row();
        $data['detail']=$this->m_alumni->get_detail_kritik('tabel_kritik', $id_kritik)->result();
        $this->load->view('PetugasAlumni/kritik/tang_kritik', $data);
    }
    public function aksi_tanggapan_kritik()
    {
        $date = date('Y-m-d H:i:s');
        $data = array (
            'tanggal_respon' => $date,
            'respon' => $this->input->post('respon'),
        
        );
        $masuk=$this->m_petugasalumni->edit_data('tabel_kritik', $data, array('id_kritik'=>$this->input->post('id_kritik')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('PetugasAlumni/admin_kritik'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('PetugasAlumni/kritik/tang_kritik'.$this->input->post('id_kritik')));
        }
    }

    //SARAN
    public function admin_saran()
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'manajement',
            'submenu'=>'saran',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'manajement',
            'submenu_admin'=> 'saran'
        ];
        $data['count_belum_ditanggapi'] = $this->m_alumni->count_field('tanggal_respon =' . NULL, 'tabel_saran');
        $data['count_ditanggapi'] = $this->m_alumni->count_field('tanggal_respon !=' . NULL, 'tabel_saran');
        $data['count_all'] = $this->m_alumni->count_all('tabel_saran');
        $data['saran']=$this->m_alumni->get_saran('tabel_saran')->result();
        $this->load->view('PetugasAlumni/saran/adm_saran', $data);
    }
    public function tanggapan_saran($id_saran) 
    {
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'manajement',
            'submenu'=>'saran',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'manajement',
            'submenu_admin'=> 'saran'
        ];
        $data['dt'] = $this->m_petugasalumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->row();
        $data['detail']=$this->m_alumni->get_detail_saran('tabel_saran', $id_saran)->result();
        $this->load->view('PetugasAlumni/saran/tang_saran', $data);
    }

    public function aksi_tanggapan_saran()
    {
        $date = date('Y-m-d H:i:s');
        $data = array (
            'tanggal_respon' => $date,
            'respon' => $this->input->post('respon'),
           
        );
        $masuk=$this->m_petugasalumni->edit_data('tabel_saran', $data, array('id_saran'=>$this->input->post('id_saran')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('PetugasAlumni/admin_saran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('PetugasAlumni/saran/tang_saran'.$this->input->post('id_saran')));
        }
    }

    // Akun
    public function akun()
    {
        $data = [
            'judul' => '',
            'page' => '',
            'menu' => '',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => '',
            'submenu_admin'=> ''
            ];
        $data['user']=$this->m_alumni->get_userByLogin('tabel_level')->result();
        $this->load->view('PetugasAlumni/akun/akun', $data);
    }

    public function update_akun()
    {
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password_baru = $this->input->post('password_baru');
        $password_baru2 = $this->input->post('password_baru2');
        if ($password_baru == null) {
            $data = array
            (
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            );
            $masuk=$this->m_alumni->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil update email dan username');
                redirect(base_url('PetugasAlumni/akun'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('PetugasAlumni/akun'));
            }
        }else if($password_baru !== null){
            if($password_baru !== $password_baru2){
                $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                redirect(base_url('PetugasAlumni/akun'));
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
                    redirect(base_url('PetugasAlumni/akun'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'gagal update email, username, dan password');
                    redirect(base_url('PetugasAlumni/akun'));
                }
            }
        }else {
            $data = array
            (
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password_baru')),
            );
            $masuk=$this->m_alumni->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil update akun');
                redirect(base_url('PetugasAlumni/akun'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal update akun');
                redirect(base_url('PetugasAlumni/akun'));
            }
        }
    }

    // Testimoni 
    public function testimoni() 
    { 
        $data = [
            'judul' => 'petugasAlumni',
            'page' => 'petugasAlumni',
            'menu' => 'manajement',
            'submenu'=>'testimoni',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'manajement',
            'submenu_admin'=> 'testimoni'
        ];
        $data['dt'] = $this->m_petugasalumni->getwhere('tabel_level', array('id_level' => $this->session->userdata('id_level')))->row();
        $data['testimoni'] = $this->m_alumni->get_testimoni('testimoni'); 
        $this->load->view('petugasalumni/testimoni/testimoni', $data); 
    } 
   
    public function active($id_testimoni) 
    { 
        $req=[ 
            'tampil'=> 'YES' 
        ]; 
        $this->m_alumni->update_status('tabel_testimoni', $req, array('id_testimoni'=>$id_testimoni)); 
        redirect(base_url('PetugasAlumni/testimoni')); 
    } 

    public function nonactive($id_testimoni) 
    {
        $req=[ 
            'tampil'=> 'NO' 
        ]; 
        $this->m_alumni->update_status('tabel_testimoni', $req, array('id_testimoni'=>$id_testimoni)); 
        redirect(base_url('PetugasAlumni/testimoni')); 
    } 

    public function hapus_testimoni($id_testimoni) 
    { 
        $this->m_alumni->hapus_testimoni('tabel_testimoni', 'id_testimoni', $id_testimoni); 
        redirect(base_url('PetugasAlumni/testimoni')); 
    }

    //Pengguna


    public function pengguna()
 {
    $data = [
        'judul' => 'petugasAlumni',
        'page' => 'petugasAlumni',
        'menu' => 'manajement',
        'submenu'=>'pengguna',
        'menu_submenu_admin'=>'',
        'menu_admin' => 'manajement',
        'submenu_admin'=> 'pengguna'
        ];
        $this->load->model( 'M_alumni' );
        $data[ 'pengguna' ] = $this->m_alumni->get_data( 'tabel_level' );
        $this->load->view( 'petugasalumni/pengguna/pengguna', $data );
    }

    public function tambah_pengguna()
 {
    $data = [
        'judul' => 'petugasAlumni',
        'page' => 'petugasAlumni',
        'menu' => 'manajement',
        'submenu'=>'pengguna',
        'menu_submenu_admin'=>'',
        'menu_admin' => 'manajement',
        'submenu_admin'=> 'pengguna'
        ];
        $this->load->view( 'petugasalumni/pengguna/tambah_pengguna', $data);
    }

    public function aksi_tambah_pengguna() 
 {
        $data = array
        (
            'username' => $this->input->post( 'username' ),
            'email' => $this->input->post( 'email' ),
            'password' => md5( $this->input->post( 'password' ) ),
            'level' => $this->input->post( 'level' ),
            'id_hak_akses' => $this->input->post( 'id_hak_akses' ),
        );
        $masuk = $this->m_petugasalumni->input_data( 'tabel_level', $data );
        if ( $masuk )
 {
            $this->session->set_flashdata( 'sukses', 'berhasil' );
            redirect( base_url( 'PetugasAlumni/pengguna' ) );
        } else {
            $this->session->set_flashdata( 'error', 'gagal..' );
            redirect( base_url( 'PetugasAlumni/pengguna' ) );
        }
    }

    public function edit_pengguna( $id )
 {
        $this->load->model( 'M_petugasalumni' );
        $data[ 'pengguna' ] = $this->m_petugasalumni->get_data_id( 'tabel_level', 'id_level', $id )->result();
        $this->load->view( 'petugasalumni/pengguna/edit_pengguna', $data );
    }

    public function aksi_edit_pengguna() 
    {
           $data = array
           (
               'username' => $this->input->post( 'username' ),
               'email' => $this->input->post( 'email' ),
               'password' => md5( $this->input->post( 'password' ) ),
               'level' => $this->input->post( 'level' ),
               'id_hak_akses' => $this->input->post( 'id_hak_akses' ),
           );
           $masuk = $this->m_alumni->edit_data( 'tabel_level', $data, array( 'id_level' => $this->input->post( 'id_level' ) ) );
           if ( $masuk )
    {
               $this->session->set_flashdata( 'sukses', 'berhasil' );
               redirect( base_url( 'PetugasAlumni/pengguna' ) );
           } else {
               $this->session->set_flashdata( 'error', 'gagal..' );
               redirect( base_url( 'PetugasAlumni/pengguna' ) );
           }
       }

       public function hapus_pengguna( $id_level )
       {
              $this->m_petugasalumni->delete_data( 'tabel_level', 'id_level', $id_level );
              redirect( base_url( 'PetugasAlumni/pengguna' ) );
          }
}