<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_akademik');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_akademik')!='login') {
            redirect(base_url());
        }
    }
    
    public function index()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'dashboard',
            'submenu'=>''
        ];
        $data['total_kelas'] = $this->m_akademik->total_kelas();
        $data['total_mapel'] = $this->m_akademik->total_mapel();
        $data['total_siswa'] = $this->m_akademik->total_siswa();
        $data['total_guru'] = $this->m_akademik->total_guru();
        $data['ta'] = $this->m_akademik->get_tahun_ajaran();
        $this->load->view('akademik/dashboard', $data);
    }
// Tahun Ajar
    public function tahun_ajaran()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'tahun_ajaran',
            'submenu'=>''
        ];
        $this->load->model('M_akademik');
        $data['tahunajar'] = $this->m_akademik->get_tahun_ajaran('tahunajar');
        $this->load->view('akademik/tahun_ajaran/tahun_ajaran', $data);
    }

    public function tahun_ajaran_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'tahun_ajaran',
            'submenu'=>''
        ];
        $this->load->model('M_akademik');
        $this->load->view('akademik/tahun_ajaran/form_tahun_ajaran', $data);
    }

    public function tambah_ta()
    {
        $data = [
            'nama_angkatan' => $this->input->post('nama_angkatan'),
            'kd_angkatan' => $this->input->post('kd_angkatan'),
            'tgl_a' => $this->input->post('tgl_a'),
            'tgl_b' => $this->input->post('tgl_b'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->m_akademik->tambah_ta('tabel_tahunajaran', $data);
        redirect(base_url('Akademik/tahun_ajaran'));
    }

    public function edit_ta($id_angkatan)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'tahun_ajaran',
            'submenu'=>''
        ];
        $data['tahunajar']=$this->m_akademik->get_taById('tabel_tahunajaran', $id_angkatan)->result();
        $this->load->view('akademik/tahun_ajaran/edit_tahunajaran', $data);
    }

    public function update_ta()
    {
        $data = array (
            'nama_angkatan' => $this->input->post('nama_angkatan'),
            'kd_angkatan' => $this->input->post('kd_angkatan'),
            'tgl_a' => $this->input->post('tgl_a'),
            'tgl_b' => $this->input->post('tgl_b'),
            // 'aktif' => $this->input->post('aktif'),
            'keterangan' => $this->input->post('keterangan'),
            // 'status' => $this->input->post('status'),
        );
        $logged=$this->m_akademik->ubah_ta('tabel_tahunajaran', $data, array('id_angkatan'=>$this->input->post('id_angkatan')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/tahun_ajaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/tahun_ajaran/edit_ta/'.$this->input->post('id_angkatan')));
        }
    }

    public function activate_ta($act)
    {
        $data = array (
            'aktif' => '1',
            'status' => 'AKTIF',
        );
        $this->m_akademik->ubah_ta('tabel_tahunajaran', $data, array('id_angkatan'=>$act));
            redirect(base_url('Akademik/tahun_ajaran'));
    }

    public function nonactivate_ta($act)
    {
        $data = array (
            'aktif' => '0',
            'status' => 'NONAKTIF',
        );
        $this->m_akademik->ubah_ta('tabel_tahunajaran', $data, array('id_angkatan'=>$act));
            redirect(base_url('Akademik/tahun_ajaran'));
    }
    
    public function hapus_ta($id_angkatan)
    {
            $this->m_akademik->hapus_ta('tabel_tahunajaran', 'id_angkatan', $id_angkatan);
            redirect(base_url('Akademik/tahun_ajaran'));
    }
// Paket Jenjang
    public function tambah_paketjenjang()
    {
        $data = [
            'nama_paket' => $this->input->post('nama_paket'),
            'kode_paket' => $this->input->post('kode_paket')
        ];
        $this->m_akademik->tambah_jenjang('tabel_paketjenjang', $data);
        redirect(base_url('Akademik/jenjang'));
    }

// Jenjang
    public function jenjang()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'jenjang',
            'submenu'=>''
        ];
        $this->load->model('M_akademik');
        $data['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
        $this->load->view('akademik/jenjang/jenjang', $data);
    }
    
    public function jenjang_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'jenjang',
            'submenu'=>''
        ];
        $data['paket'] = $this->m_akademik->get_paketjenjang('paket');
        $this->load->view('akademik/jenjang/form_jenjang', $data);
    }

    public function tambah_jenjang()
    {
        $data = [
            'nama_jenjang' => $this->input->post('nama_jenjang'),
            'kd_jenjang' => $this->input->post('kd_jenjang'),
            'id_paket' => $this->input->post('id_paket'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->m_akademik->tambah_jenjang('tabel_jenjang', $data);
        redirect(base_url('Akademik/jenjang'));
    }

    public function edit_jenjang($id_jenjang)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'jenjang',
            'submenu'=>''
        ];
        $data['paket'] = $this->m_akademik->get_paketjenjang('paket');
        $data['jenjang']=$this->m_akademik->get_jenjangById('tabel_jenjang', $id_jenjang)->result();
        $this->load->view('akademik/jenjang/edit_jenjang', $data);
    }

    public function update_jenjang()
    {
        $data =  [
            'nama_jenjang' => $this->input->post('nama_jenjang'),
            'kd_jenjang' => $this->input->post('kd_jenjang'),
            'id_paket' => $this->input->post('id_paket'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $logged=$this->m_akademik->ubah_jenjang('tabel_jenjang', $data, array('id_jenjang'=>$this->input->post('id_jenjang')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/jenjang'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/jenjang/edit_ta/'.$this->input->post('id_jenjang')));
        }
    }
    
    public function hapus_jenjang($id_jenjang)
    {
        $this->m_akademik->hapus_jenjang('tabel_jenjang', 'id_jenjang', $id_jenjang);
        redirect(base_url('Akademik/jenjang'));
    }
    
// Kelas
    public function kelas()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'kelas',
        ];
        $this->load->model('M_akademik');
        $data['kelas'] = $this->m_akademik->get_kelas('kelas');
        $this->load->view('akademik/kelas/kelas', $data);
    }

    public function kelas_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'kelas'
        ];
        $this->load->model('M_akademik');
        $data['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
        $this->load->view('akademik/kelas/form_kelas', $data);
    }

    public function tambah_kelas()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_jenjang' => $this->input->post('id_jenjang'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->m_akademik->tambah_kelas('tabel_kelas', $data);
        redirect(base_url('Akademik/kelas'));
    }

    public function edit_kelas($id_kelas)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'kelas'
        ];
        $data['kelas']=$this->m_akademik->get_kelasById('tabel_kelas', $id_kelas)->result();
        $jenjang['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
        $this->load->view('akademik/kelas/edit_kelas', $data + $jenjang);
    }

    public function update_kelas()
    {
        $data =  [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_jenjang' => $this->input->post('id_jenjang'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $logged=$this->m_akademik->ubah_kelas('tabel_kelas', $data, array('id_kelas'=>$this->input->post('id_kelas')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/kelas'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/kelas/edit_ta/'.$this->input->post('id_kelas')));
        }
    }
    
    public function hapus_kelas($id_kelas)
    {
        $this->m_akademik->hapus_kelas('tabel_kelas', 'id_kelas', $id_kelas);
        redirect(base_url('Akademik/kelas'));
    }

// Rombel
    public function rombel()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'rombel',
        ];
        $this->load->model('M_akademik');
        $data['rombel'] = $this->m_akademik->get_rombel('rombel');
        $this->load->view('akademik/rombel/rombel', $data);
    }

    public function rombel_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'rombel'
        ];
        $this->load->model('M_akademik');
        $data['kelas'] = $this->m_akademik->get_kelas('kelas');
        $data['guru'] = $this->m_akademik->get_guru('guru');
        $this->load->view('akademik/rombel/form_rombel', $data);
    }

    public function tambah_rombel()
    {
        $data = [
            'nama_rombel' => $this->input->post('nama_rombel'),
            'kode_guru' => $this->input->post('kode_guru'),
            'id_kelas' => $this->input->post('id_kelas'),
            'kuota' => $this->input->post('kuota'),
        ];
        $this->m_akademik->tambah_rombel('tabel_rombel', $data);
        redirect(base_url('Akademik/rombel'));
    }

    public function edit_rombel($id_rombel)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'rombel'
        ];
        $data['rombel']=$this->m_akademik->get_rombelById('tabel_rombel', $id_rombel)->result();
        $kelas['kelas'] = $this->m_akademik->get_kelas('kelas');
        $guru['guru'] = $this->m_akademik->get_guru('guru');
        $jenjang['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
        $this->load->view('akademik/rombel/edit_rombel', $data + $kelas + $guru + $jenjang);
    }

    public function update_rombel()
    {
        $data =  [
            'nama_rombel' => $this->input->post('nama_rombel'),
            'kode_guru' => $this->input->post('kode_guru'),
            'id_kelas' => $this->input->post('id_kelas'),
            'kuota' => $this->input->post('kuota'),
        ];
        $logged=$this->m_akademik->ubah_rombel('tabel_rombel', $data, array('id_rombel'=>$this->input->post('id_rombel')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/rombel'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/rombel/edit_ta/'.$this->input->post('id_rombel')));
        }
    }

    public function hapus_rombel($id_rombel)
    {
        $this->m_akademik->hapus_rombel('tabel_rombel', 'id_rombel', $id_rombel);
        redirect(base_url('Akademik/rombel'));
    }

// Guru
    public function guru()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'guru',
            'submenu'=>''
        ];
        $this->load->model('M_akademik');
        $data['guru'] = $this->m_akademik->get_guru('guru');
        $this->load->view('akademik/guru/guru', $data);
    }

    public function guru_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'guru',
            'submenu'=>''
        ];
        $this->load->model('M_akademik');
        $this->load->view('akademik/guru/form_guru');
    }

    public function tambah_guru()
    {
        $data = [
            'nama_guru' => $this->input->post('nama_guru'),
            'nip' => $this->input->post('nip'),
            'jekel' => $this->input->post('jekel'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->m_akademik->tambah_guru('tabel_guru', $data);
        $nilaiAccess = [
            'username' => $this->input->post('nama_guru'),
            'email' => $this->input->post('nama_guru').'@gmail.com',
            'password' => md5($this->input->post('nip')),
            'level' => 'Guru',
            'kode_guru' => $this->input->post('kode_guru'),
            'id_hak_akses' => '5',
        ];
        $this->m_akademik->tambah_guru('tabel_level', $nilaiAccess);

        redirect(base_url('Akademik/guru'));
    }

    public function edit_guru($kode_guru)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'guru',
            'submenu'=>''
        ];
        $data['guru']=$this->m_akademik->get_guruById('tabel_guru', $kode_guru)->result();
        $this->load->view('akademik/guru/edit_guru', $data);
    }

    public function update_guru()
    {
        $data =  [
            'nama_guru' => $this->input->post('nama_guru'),
            'nip' => $this->input->post('nip'),
            'jekel' => $this->input->post('jekel'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
        ];
        $logged=$this->m_akademik->ubah_guru('tabel_guru', $data, array('kode_guru'=>$this->input->post('kode_guru')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/guru'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/guru/edit_ta/'.$this->input->post('kode_guru')));
        }
    }
    
    public function hapus_guru($id_guru)
    {
        $this->m_akademik->hapus_guru('tabel_guru', 'kode_guru', $id_guru);
        $this->m_akademik->hapus_guru('tabel_level', 'kode_guru', $id_guru);
        redirect(base_url('Akademik/guru'));
    }
    
// Siswa
 // Pendaftaran Siswa
    public function siswa_pendaftaran()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'siswa_pendaftaran'
        ];
     $this->load->model('M_akademik');
     $data['data_siswa_daftar'] = $this->m_akademik->get_siswa_pendaftaran('data_siswa_daftar');
     $this->load->view('akademik/siswa/pendaftaran', $data);
    }

    public function detail_pendaftaran($id_daftar)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'siswa_pendaftaran'
        ];
        $data['daftar']=$this->m_akademik->get_daftarById('tabel_daftar', $id_daftar)->result();
        $this->load->view('akademik/siswa/detail_pendaftaran', $data);
    }
    
    public function upload_img_pendaftaran_siswa($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/akademik/pendaftaran_siswa/';
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

    public function form_pendaftaran()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'siswa_pendaftaran'
        ];
        $pilih_jenjang['data_jenjang'] = $this->m_akademik->get_jenjang('data_jenjang');
        $data['data_pendaftaran_siswa'] = $this->m_akademik->get_siswa_pendaftaran('data_pendaftaran_siswa');
        $this->load->view('akademik/siswa/form_pendaftaran', $pilih_jenjang + $data);
    }
    
    public function acak($long)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$string = '';
		for ($i=0; $i < $long; $i++) { 			
			$pos = rand(0, strlen($char)-1);
			$string .= $char[$pos];
		}
		return $string;
	}

    public function aksi_tambah_pendaftaran_siswa()
    {
        $foto = $this->upload_img_pendaftaran_siswa('foto');
        if($foto[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload foto.');
            redirect(base_url('Akademik/form_pendaftaran'));
        }
        else
        {
            $data = array
            (
                'foto' => $foto[1],
                'no_reg' => $this->input->post('no_reg'),
                'id_angkatan' => '1',
                'id_jenjang' => $this->input->post('id_jenjang'),
                'tgl_daftar' => $this->input->post('tgl_daftar'),
                'nisn' => $this->input->post('nisn'),
                'nama' => $this->input->post('nama'),
                'jekel' => $this->input->post('jekel'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'anak_ke' => $this->input->post('anak_ke'),
                'saudara_kandung' => $this->input->post('saudara_kandung'),
                'saudara_angkat' => $this->input->post('saudara_angkat'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon'),
                'warga_negara' => $this->input->post('warga_negara'),
                'diterima' => 'P',
            );
            $masuk=$this->m_akademik->tambah_pendaftaran('tabel_daftar', $data);
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Akademik/siswa_pendaftaran'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Akademik/form_pendaftaran'));
            }
        }
    }

    public function edit_pendaftaran($id_daftar)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'siswa_pendaftaran'
        ];
        $data['data_siswa_daftar']=$this->m_akademik->edit_pendaftaran('tabel_daftar', $id_daftar)->result();
        $this->load->view('akademik/siswa/edit_pendaftaran', $data);
    }

    public function update_pendaftaran()
    {
        $data = array (
            "nisn" => $this->input->post("nisn"),
            "nama" => $this->input->post("nama"),
            "tempat_lahir" => $this->input->post("tempat_lahir"),
            "tgl_lahir" => $this->input->post("tgl_lahir"),
            "agama" => $this->input->post("agama"),
            "alamat" => $this->input->post("alamat"),
            "telepon" => $this->input->post("telepon"),
            'anak_ke' => $this->input->post('anak_ke'),
            'saudara_kandung' => $this->input->post('saudara_kandung'),
            'saudara_angkat' => $this->input->post('saudara_angkat'),
            "diterima" => "P",
        );
        $masuk = $this->m_akademik->ubah_pendaftaran("tabel_daftar", $data, array("id_daftar" => $this->input->post("id_daftar")));
        if ($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/siswa_pendaftaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/edit_pendaftaran/'.$this->input->post('id_daftar')));
        }
    }

    public function hapus_pendaftaran($id_daftar)
    {
        $hapus=$this->m_akademik->hapus_pendaftaran('tabel_daftar', 'id_daftar', $id_daftar);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Akademik/siswa_pendaftaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/siswa_pendaftaran'));
        }

    }

 // Pembagian Kelas
    public function siswa_pembagian_kelas()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'pembagian_kelas'
        ];
        $this->load->model('M_akademik');
        $data['data_siswa_diterima'] = $this->m_akademik->get_siswa_diterima('data_siswa_diterima');
        $jenjang['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
        $rombel['rombel'] = $this->m_akademik->get_rombel('rombel');
        $this->load->view('akademik/siswa/pembagian_kelas', $data + $jenjang + $rombel);
    }

    public function finter_by_jenjang()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'pembagian_kelas'
        ];
        $nama_jenjang = $this->input->post('nama_jenjang');
        $nilaifilter = $this->input->post('nilaifilter');
        
        if($nilaifilter = 1) {
            $jenjang['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
            $rombel['rombel'] = $this->m_akademik->get_rombel('rombel');
            $data['data_siswa_diterima'] = $this->m_akademik->filterByJenjang($nama_jenjang);
            $data['filter']=$this->m_akademik->get_filter('tabel_jenjang', $nama_jenjang)->result();
            
            $this->load->view('akademik/siswa/filter/filter_by_jenjang', $data + $jenjang + $rombel);
        }
    }

    public function masuk_kelas()
    {
        $id_rombel = $this->input->post('id_rombel');
        $id_daftar = $this->input->post('id_daftar');

        foreach( $id_daftar as $key => $value){
            $this->db->insert('tabel_siswa', array(
                'id_rombel' => $id_rombel,
                'id_daftar' => $key
            ));
            $this->m_akademik->ubah_pendaftaran('tabel_siswa', array( 
                'id_siswa' => $key, 
                'id_rombel' => $id_rombel 
            ), array( 
                'id_siswa' => $key 
            )); 
        }
        foreach ($id_daftar as $key => $value) { 
            $this->m_akademik->ubah_pendaftaran('tabel_daftar', array( 
                'id_daftar' => $key, 
                'diterima' => "A", 
            ), array( 
                'id_daftar' => $key 
            )); 
        }
        redirect(base_url('Akademik/siswa_pembagian_kelas'));
    }

 // Seleksi Siswa
    public function siswa_seleksi_siswa()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'seleksi_siswa'
        ];
        $this->load->model('M_akademik');
        $siswa_daftar['data_siswa_daftar'] = $this->m_akademik->get_siswa_pendaftaran('data_siswa_daftar');
        $siswa_diterima['siswa_diterima'] = $this->m_akademik->get_siswa_diterima('siswa_diterima');
        $this->load->view('akademik/siswa/seleksi_siswa', $siswa_daftar + $siswa_diterima+$data);
    }

    public function terima_siswa()
    {
        $approve = array
        (
            "diterima" => "Y",
        );

        $approve_siswa=$this->m_akademik->ubah_seleksi('tabel_daftar', $approve, array('id_daftar'=>$this->input->post('id_daftar')));
        if($approve_siswa)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/siswa_seleksi_siswa'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/siswa_seleksi_siswa'));
        }
    }

    public function kembalikan_siswa()
    {
        $data = array
        (
            "diterima" => "P",
        );

        $data_siswa=$this->m_akademik->ubah_seleksi('tabel_daftar', $data, array('id_daftar'=>$this->input->post('id_daftar')));
        if($data_siswa)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/siswa_seleksi_siswa'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/siswa_seleksi_siswa'));
        }
    }
 
 // Data Siswa 
    public function siswa_data()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'data_siswa'
        ];
        $this->load->model('M_akademik');
        $data['siswa'] = $this->m_akademik->get_siswa('siswa');
        $this->load->view('akademik/siswa/data', $data);
    }
    
    public function hapus_siswa($id_siswa)
    { 
        $this->m_akademik->hapus_siswa('tabel_siswa', 'id_siswa', $id_siswa);
        redirect(base_url('Akademik/siswa_data'));
    }
    
    public function detail_siswa($id_siswa)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'data_siswa'
        ];
        $data['siswa']=$this->m_akademik->get_siswaById('tabel_siswa', $id_siswa)->result();
        $this->load->view('akademik/siswa/detail_siswa', $data);
    }

    public function edit_siswa_rombel($id_siswa)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'data_siswa'
        ];
        $data['siswa']=$this->m_akademik->get_siswaById('tabel_siswa', $id_siswa)->result();
        $data['rombel'] = $this->m_akademik->get_rombel('rombel');
        $this->load->view('akademik/siswa/edit_siswa_rombel', $data);
    }

    public function update_siswa_rombel()
    {
        $data = array (
            "id_daftar" => $this->input->post("id_daftar"),
            "id_rombel" => $this->input->post("id_rombel"),
            "saldo_tabungan" => $this->input->post("saldo_tabungan"),
        );
        $masuk = $this->m_akademik->ubah_siswa("tabel_siswa", $data, array("id_siswa" => $this->input->post("id_siswa")));
        if ($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/siswa_data'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/edit_siswa_rombel/'.$this->input->post('id_siswa')));
        }
    }


    public function edit_siswa($id_daftar)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'data_siswa'
        ];
        $data['data_siswa_daftar']=$this->m_akademik->edit_pendaftaran('tabel_daftar', $id_daftar)->result();
        $this->load->view('akademik/siswa/edit_siswa', $data);
    }
    
    public function update_siswa()
    {
        $data = array (
            "nisn" => $this->input->post("nisn"),
            "nama" => $this->input->post("nama"),
            "tempat_lahir" => $this->input->post("tempat_lahir"),
            "tgl_lahir" => $this->input->post("tgl_lahir"),
            "agama" => $this->input->post("agama"),
            "alamat" => $this->input->post("alamat"),
            "telepon" => $this->input->post("telepon"),
            'anak_ke' => $this->input->post('anak_ke'),
            'saudara_kandung' => $this->input->post('saudara_kandung'),
            'saudara_angkat' => $this->input->post('saudara_angkat'),
            "diterima" => "Y",
        );
        $masuk = $this->m_akademik->ubah_pendaftaran("tabel_daftar", $data, array("id_daftar" => $this->input->post("id_daftar")));
        if ($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/siswa_data'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/edit_siswa/'.$this->input->post('id_daftar')));
        }
    }

    //Mutasi
    public function siswa_mutasi()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'mutasi'
        ];
        $this->load->model('M_akademik');
        $siswa['siswa'] = $this->m_akademik->get_siswa('siswa');
        $rombel['rombel'] = $this->m_akademik->get_rombel('rombel');
        $kelas['kelas'] = $this->m_akademik->get_kelas('kelas');
        $this->load->view('akademik/siswa/mutasi', $siswa + $rombel + $kelas + $data);
    }

    public function aksi_mutasi_siswa() {
        $option = $this->input->post('option');
        $id_rombel = $this->input->post('id_rombel');
        $id_daftar = $this->input->post('id_daftar');

        if ($option == 'Naik Kelas') {
            foreach ($id_daftar as $key => $value) {
                $logged=$this->m_akademik->ubah_siswa('tabel_siswa', array(
                    'id_daftar' => $key,
                    'id_rombel' => $id_rombel
                ), array(
                    'id_daftar' => $key
                ));
            }

            if($logged)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Akademik/siswa_mutasi'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Akademik/siswa_mutasi/'.$key));
            }
        } elseif ($option == 'Pindah Kelas') {
            foreach ($id_daftar as $key => $value) {
                $logged=$this->m_akademik->ubah_siswa('tabel_siswa', array(
                    'id_daftar' => $key,
                    'id_rombel' => $id_rombel
                ), array(
                    'id_daftar' => $key
                ));
            }
    
            if($logged)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Akademik/siswa_mutasi'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Akademik/siswa_mutasi/'.$key));
            }
        } elseif ($option == 'Pindah Sekolah') {
            $nama_sekolah = $this->input->post('nama_sekolah');

            foreach ($id_daftar as $key => $value) {
                $logged=$this->m_akademik->tambah_pindah_sekolah('tabel_pindah', array(
                    'id_daftar' => $key,
                    'id_rombel' => $id_rombel,
                    'nama_sekolah' => $nama_sekolah,
                ));
                
            foreach ($id_daftar as $key => $value) { 
                $this->m_akademik->ubah_pendaftaran('tabel_daftar', array( 
                    'id_daftar' => $key, 
                    'diterima' => "M", 
                ), array( 
                    'id_daftar' => $key 
                )); 
            }

            foreach ($id_daftar as $key => $value) { 
                $this->m_akademik->hapus_siswa('tabel_siswa', 'id_daftar', $key);
            }
            }
    
            if($logged)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Akademik/siswa_mutasi'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Akademik/siswa_mutasi/'.$key));
            }
        } elseif ($option == 'Lulus') {
            $tanggal_lulus = $this->input->post('tanggal_lulus');

            foreach ($id_daftar as $key => $value) {
                $logged=$this->m_akademik->tambah_lulus('tabel_lulus', array(
                    'id_daftar' => $key,
                    'id_rombel' => $id_rombel,
                    'tanggal_lulus' => $tanggal_lulus,
                ));
                
                foreach ($id_daftar as $key => $value) { 
                    $this->m_akademik->ubah_pendaftaran('tabel_daftar', array( 
                        'id_daftar' => $key, 
                        'diterima' => "L", 
                    ), array( 
                        'id_daftar' => $key 
                    )); 
                }
                foreach ($id_daftar as $key => $value) { 
                    $this->m_akademik->hapus_siswa('tabel_siswa', 'id_daftar', $key);
                }
            }
    
            if($logged)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Akademik/siswa_mutasi'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Akademik/siswa_mutasi/'.$key));
            }
        }
    }

    public function filter_kelas($id_rombel)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'mutasi'
        ];
        $this->load->model('M_akademik');
        $siswa['siswa'] = $this->m_akademik->get_siswaperkelas('tabel_siswa', $id_rombel)->result();
        $rombel['rombel'] = $this->m_akademik->get_rombel('rombel');
        $kelas['kelas'] = $this->m_akademik->get_kelas('kelas');
        $this->load->view('akademik/siswa/mutasi', $siswa + $rombel + $kelas + $data);
    }
    

    function naik_kelas($id){
        $this->db->set('id_kelas', 'id_kelas+1', FALSE);
        $this->db->where('id_siswa', $id);
        $this->db->update('tabel_siswa');
        $siswa['siswa'] = $this->m_akademik->get_siswa('siswa');
        $this->load->view('akademik/siswa/mutasi', $siswa);
    }


// Pelajaran
 // Mapel
    public function pelajaran()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'mapel'
        ];
        $this->load->model('M_akademik');
        $data['mapel'] = $this->m_akademik->get_mapel('mapel');
        $this->load->view('akademik/pelajaran/mata_pelajaran', $data);
    }

    public function mapel_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'mapel'
        ];
        $this->load->model('M_akademik');
        $data['jenismapel'] = $this->m_akademik->get_jenismapel('jenismapel');
        $this->load->view('akademik/pelajaran/form_mapel', $data);
    }

    public function tambah_mapel()
    {
        $data = [
            'nama_mapel' => $this->input->post('nama_mapel'),
            'id_jenismapel' => $this->input->post('id_jenismapel'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->m_akademik->tambah_mapel('tabel_mapel', $data);
        redirect(base_url('Akademik/pelajaran'));
    }

    public function edit_mapel($id_mapel)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'mapel'
        ];
        $data['mapel']=$this->m_akademik->get_mapelById('tabel_mapel', $id_mapel)->result();
        $jenis['jenismapel'] = $this->m_akademik->get_jenismapel('jenismapel');
        $this->load->view('akademik/pelajaran/edit_mapel', $data + $jenis);
    }

    public function update_mapel()
    {
        $data =  [
            'nama_mapel' => $this->input->post('nama_mapel'),
            'id_jenismapel' => $this->input->post('id_jenismapel'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $logged=$this->m_akademik->ubah_mapel('tabel_mapel', $data, array('id_mapel'=>$this->input->post('id_mapel')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/pelajaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/pelajaran/edit_mapel/'.$this->input->post('id_mapel')));
        }
    }
    
    public function hapus_mapel($id_mapel)
    {
        $this->m_akademik->hapus_mapel('tabel_mapel', 'id_mapel', $id_mapel);
        redirect(base_url('Akademik/pelajaran'));
    }
 // Jenis Mapel
    public function jenis_pelajaran()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'jenis_mapel'
        ];
        $this->load->model('M_akademik');
        $data['jenismapel'] = $this->m_akademik->get_jenismapel('jenismapel');
        $this->load->view('akademik/pelajaran/jenis_pelajaran', $data);
    }

    public function jenismapel_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'jenis_mapel'
        ];
        $this->load->model('M_akademik');
        $this->load->view('akademik/pelajaran/form_jenismapel', $data);
    }

    public function tambah_jenismapel()
    {
        $data = [
            'nama_jenismapel' => $this->input->post('nama_jenismapel'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->m_akademik->tambah_jenismapel('tabel_jenismapel', $data);
        redirect(base_url('Akademik/jenis_pelajaran'));
    }

    public function edit_jenismapel($id_jenismapel)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'jenis_mapel'
        ];
        $data['jenismapel']=$this->m_akademik->get_jenismapelById('tabel_jenismapel', $id_jenismapel)->result();
        $this->load->view('akademik/pelajaran/edit_jenismapel', $data);
    }

    public function update_jenismapel()
    {
        $data =  [
            'nama_jenismapel' => $this->input->post('nama_jenismapel'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $logged=$this->m_akademik->ubah_jenismapel('tabel_jenismapel', $data, array('id_jenismapel'=>$this->input->post('id_jenismapel')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/jenis_pelajaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/jenismapel/edit_jenismapel/'.$this->input->post('id_jenismapel')));
        }
    }
    
    public function hapus_jenismapel($id_jenismapel)
    {
        $this->m_akademik->hapus_jenismapel('tabel_jenismapel', 'id_jenismapel', $id_jenismapel);
        redirect(base_url('Akademik/jenis_pelajaran'));
    }

// Alokasi
 // Alok Guru
    public function alokasi_guru($kode_guru)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'alok_mapel'
        ];
        $this->load->model('M_akademik');
        $data['guru']=$this->m_akademik->get_guruById('tabel_guru', $kode_guru)->result();
        $data['mapel'] = $this->m_akademik->get_mapel('mapel');
        $data['alokasiguru'] = $this->m_akademik->get_alokasiguruByIdGuru('tabel_alokasiguru', $kode_guru);
        $this->load->view('akademik/alokasi/alokasi_guru/alokasi_guru', $data);
    }

    public function tambah_alokasiguru()
    {
        $guru = $this->input->post('kode_guru');
        $mapel = $this->input->post('id_mapel');
        foreach( $mapel as $key => $value){
            $this->db->insert('tabel_alokasiguru', array(
                'kode_guru' => $guru,
                'id_mapel' => $key,
            ));
        }
        redirect(base_url('Akademik/alokasi_guru/'.$this->input->post('kode_guru')));
    }
    
    public function hapus_alokasiguru()
    {
        $id_alokasiguru = $this->input->post('id_alokasiguru');

        foreach ($id_alokasiguru as $key => $value) { 
            $this->m_akademik->hapus_alokasiguru('tabel_alokasiguru', 'id_alokasiguru', $key); 
        }
        redirect(base_url('Akademik/guru/'));
    }
    
 // Alok Mapel
    public function alokasi_mapel($id_mapel)
        {
            $data = [
                'judul' => 'akademik',
                'page' => 'akademik',
                'menu' => 'mapel',
                'submenu'=>'alok_mapel'
            ];
            $data['rombel'] = $this->m_akademik->get_rombel('rombel');
            $data['mapel']=$this->m_akademik->get_mapelById('tabel_mapel', $id_mapel)->result();
            $data['alokasimapel'] = $this->m_akademik->get_alokasimapelByIdMapel('tabel_alokasimapel', $id_mapel);
            $this->load->view('akademik/alokasi/alokasi_mapel/alokasi_mapel', $data);
        }
    public function tambah_alokasimapel()
        {
            $rombel = $this->input->post('id_rombel');
            $mapel = $this->input->post('id_mapel');
            foreach( $rombel as $key => $value){
                $this->db->insert('tabel_alokasimapel', array(
                    'id_rombel' => $key,
                    'id_mapel' => $mapel,
                ));
            }
            redirect(base_url('Akademik/alokasi_mapel/'.$this->input->post('id_mapel')));
        }
    public function hapus_alokasimapel()
        {
            $id = $this->input->post('id_alokasimapel');

            foreach ($id as $key => $value) { 
                $this->m_akademik->hapus_alokasimapel('tabel_alokasimapel', 'id_alokasimapel', $key); 
            }
            // $this->m_akademik->hapus_alokasimapel('tabel_alokasimapel', 'id_alokasimapel', $id_alokasimapel);
            redirect(base_url('Akademik/pelajaran/'));
        }
    

}