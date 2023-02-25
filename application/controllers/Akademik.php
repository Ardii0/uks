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
        $this->load->view('akademik/dashboard');

    }
// Tahun Ajar
    public function tahun_ajaran()
    {
        $this->load->model('M_akademik');
        $data['tahunajar'] = $this->m_akademik->get_tahun_ajaran('tahunajar');
        $this->load->view('akademik/tahun_ajaran/tahun_ajaran', $data);
    }

    public function tahun_ajaran_form()
    {
        $this->load->model('M_akademik');
        $this->load->view('akademik/tahun_ajaran/form_tahun_ajaran');
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
    
    public function hapus_ta($id_angkatan)
    {
        $this->m_akademik->hapus_ta('tabel_tahunajaran', 'id_angkatan', $id_angkatan);
        redirect(base_url('Akademik/tahun_ajaran'));
    }

// Jenjang
    public function jenjang()
    {
        $this->load->model('M_akademik');
        $data['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
        $this->load->view('akademik/jenjang/jenjang', $data);
    }

    public function jenjang_form()
    {
        $this->load->model('M_akademik');
        $this->load->view('akademik/jenjang/form_jenjang');
    }

    public function tambah_jenjang()
    {
        $data = [
            'nama_jenjang' => $this->input->post('nama_jenjang'),
            'kd_jenjang' => $this->input->post('kd_jenjang'),
            'paket' => $this->input->post('paket'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->m_akademik->tambah_jenjang('tabel_jenjang', $data);
        redirect(base_url('Akademik/jenjang'));
    }

    public function edit_jenjang($id_jenjang)
    {
        $data['jenjang']=$this->m_akademik->get_jenjangById('tabel_jenjang', $id_jenjang)->result();
        $this->load->view('akademik/jenjang/edit_jenjang', $data);
    }

    public function update_jenjang()
    {
        $data =  [
            'nama_jenjang' => $this->input->post('nama_jenjang'),
            'kd_jenjang' => $this->input->post('kd_jenjang'),
            'paket' => $this->input->post('paket'),
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
        $this->load->model('M_akademik');
        $data['kelas'] = $this->m_akademik->get_kelas('kelas');
        $this->load->view('akademik/kelas/kelas', $data);
    }

    public function kelas_form()
    {
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
        $this->load->model('M_akademik');
        $data['rombel'] = $this->m_akademik->get_rombel('rombel');
        $this->load->view('akademik/rombel/rombel', $data);
    }

    public function rombel_form()
    {
        $this->load->model('M_akademik');
        $data['kelas'] = $this->m_akademik->get_kelas('kelas');
        $data['guru'] = $this->m_akademik->get_guru('guru');
        $data['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
        $this->load->view('akademik/rombel/form_rombel', $data);
    }

    public function tambah_rombel()
    {
        $data = [
            'nama_rombel' => $this->input->post('nama_rombel'),
            'kode_guru' => $this->input->post('kode_guru'),
            'id_kelas' => $this->input->post('id_kelas'),
            'id_jenjang' => $this->input->post('id_jenjang'),
            'kuota' => $this->input->post('kuota'),
            'nip' => $this->input->post('nip'),
        ];
        $this->m_akademik->tambah_rombel('tabel_rombel', $data);
        redirect(base_url('Akademik/rombel'));
    }

    public function edit_rombel($id_rombel)
    {
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
            'id_jenjang' => $this->input->post('id_jenjang'),
            'kuota' => $this->input->post('kuota'),
            'nip' => $this->input->post('nip'),
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
        $this->load->model('M_akademik');
        $data['guru'] = $this->m_akademik->get_guru('guru');
        $this->load->view('akademik/guru/guru', $data);
    }

    public function guru_form()
    {
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
        redirect(base_url('Akademik/guru'));
    }

    public function edit_guru($kode_guru)
    {
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
        redirect(base_url('Akademik/guru'));
    }
    
// Siswa
 // Pendaftaran Siswa
    public function siswa_pendaftaran()
    {
     $this->load->model('M_akademik');
     $data['data_siswa_daftar'] = $this->m_akademik->get_siswa_pendaftaran('data_siswa_daftar');
     $this->load->view('akademik/siswa/pendaftaran', $data);
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
        $pilih_jenjang['data_jenjang'] = $this->m_akademik->get_jenjang('data_jenjang');
        $data['data_pendaftaran_siswa'] = $this->m_akademik->get_siswa_pendaftaran('data_pendaftaran_siswa');
        $this->load->view('akademik/siswa/form_pendaftaran', $pilih_jenjang + $data);
    }
    
    public function aksi_tambah_pendaftaran_siswa()
    {
        $foto = $this->upload_img_pendaftaran_siswa('foto');
        if($foto[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload foto.');
            redirect(base_url('Admin/form_pendaftaran'));
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

    public function siswa_pembagian_kelas()
    {
        $this->load->view('akademik/siswa/pembagian_kelas');
    }

 //Seleksi Siswa
 public function siswa_seleksi_siswa()
 {
     $this->load->view('akademik/siswa/seleksi_siswa');
 }
 
 //Data Siswa 
    public function siswa_data()
    {
        $this->load->model('M_akademik');
        $data['siswa'] = $this->m_akademik->get_siswa('siswa');
        $this->load->view('akademik/siswa/data', $data);
    }

    public function siswa_mutasi()
    {
        $this->load->view('akademik/siswa/mutasi');
    }

// Pelajaran
 // Mapel
    public function pelajaran()
    {
        $this->load->model('M_akademik');
        $data['mapel'] = $this->m_akademik->get_mapel('mapel');
        $this->load->view('akademik/pelajaran/mata_pelajaran', $data);
    }

    public function mapel_form()
    {
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
 // Jenis
    public function jenis_pelajaran()
    {
        $this->load->model('M_akademik');
        $data['jenismapel'] = $this->m_akademik->get_jenismapel('jenismapel');
        $this->load->view('akademik/pelajaran/jenis_pelajaran', $data);
    }

    public function jenismapel_form()
    {
        $this->load->model('M_akademik');
        $this->load->view('akademik/pelajaran/form_jenismapel');
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

}