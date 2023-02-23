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
        $this->load->view('akademik/kelas/form_kelas');
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
        $this->load->view('akademik/kelas/edit_kelas', $data);
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
    public function siswa_pendaftaran()
    {
        $this->load->model('M_akademik');
        $data['data_siswa_daftar'] = $this->m_akademik->get_siswa_pendaftaran('data_siswa_daftar');
        $this->load->view('akademik/siswa/pendaftaran', $data);
    }

    public function form_pendaftaran()
    {
        $pilih_jenjang['data_jenjang'] = $this->m_akademik->get_jenjang('data_jenjang');
        $data['data_pendaftaran_siswa'] = $this->m_akademik->get_siswa_pendaftaran('data_pendaftaran_siswa');
        $this->load->view('akademik/siswa/form_pendaftaran', $pilih_jenjang + $data);
    }

    public function aksi_tambah_paket_wedding()
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
                'id_angkatan' => $this->input->post('id_angkatan'),
                'id_jenjang' => $this->input->post('id_jenjang'),
                'tgl_daftar' => $this->input->post('tgl_daftar'),
                'nisn' => $this->input->post('nisn'),
                'nama' => $this->input->post('nama'),
                'jekel' => $this->input->post('jekel'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon'),
                'diterima' => 'P',
            );
            $masuk=$this->M_admin->tambah('tabel_paket_wedding', $data);
            if($masuk)
            {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Admin/paket_wedding'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Admin/tambah_paket_wedding'));
            }
        }
    }

    public function siswa_pembagian_kelas()
    {
        $this->load->view('akademik/siswa/pembagian_kelas');
    }

    public function siswa_data()
    {
        $this->load->view('akademik/siswa/data');
    }

    public function siswa_mutasi()
    {
        $this->load->view('akademik/siswa/mutasi');
    }

    public function pelajaran()
    {
        $this->load->view('akademik/pelajaran/mata_pelajaran');
    }

    public function jenis_pelajaran()
    {
        $this->load->view('akademik/pelajaran/jenis_pelajaran');
    }

}