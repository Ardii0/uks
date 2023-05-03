<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_akademik');
        $this->load->helpers('my_helper');
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
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=> 'akademik'
        ];
        $data['total_kelas'] = $this->m_akademik->total_kelas();
        $data['total_mapel'] = $this->m_akademik->total_mapel();
        $data['total_siswa'] = $this->m_akademik->total_siswa();
        $data['total_guru'] = $this->m_akademik->total_guru();
        $data['total_jabatan_kepsek'] = $this->m_akademik->total_jabatan_guru(1);
        $data['total_jabatan_wakaKur'] = $this->m_akademik->total_jabatan_guru(2);
        $data['total_jabatan_wakaKesis'] = $this->m_akademik->total_jabatan_guru(3);
        $data['total_jabatan_wakaSar'] = $this->m_akademik->total_jabatan_guru(4);
        $data['total_jabatan_sejarah'] = $this->m_akademik->total_jabatan_guru(5);
        $data['total_jabatan_K3TKJ'] = $this->m_akademik->total_jabatan_guru(6);
        $data['total_jabatan_K3TB'] = $this->m_akademik->total_jabatan_guru(7);
        $data['total_jabatan_K3TBSM'] = $this->m_akademik->total_jabatan_guru(8);
        $data['total_jabatan_K3AKL'] = $this->m_akademik->total_jabatan_guru(9);
        $data['total_jabatan_SekreTKJ'] = $this->m_akademik->total_jabatan_guru(10);
        $data['total_jabatan_SekreTabus'] = $this->m_akademik->total_jabatan_guru(11);
        $data['total_jabatan_LabTBSM'] = $this->m_akademik->total_jabatan_guru(12);
        $data['total_jabatan_SekreAKL'] = $this->m_akademik->total_jabatan_guru(13);
        $data['total_jabatan_LabTKJ'] = $this->m_akademik->total_jabatan_guru(14);
        $data['total_jabatan_LabTB'] = $this->m_akademik->total_jabatan_guru(15);
        $data['total_jabatan_SekreTBSM'] = $this->m_akademik->total_jabatan_guru(16);
        $data['total_jabatan_bIndo'] = $this->m_akademik->total_jabatan_guru(17);
        $data['total_jabatan_bJawa'] = $this->m_akademik->total_jabatan_guru(18);
        $data['total_jabatan_mtk'] = $this->m_akademik->total_jabatan_guru(19);
        $data['total_jabatan_pjok'] = $this->m_akademik->total_jabatan_guru(20);
        $data['total_jabatan_bInggris'] = $this->m_akademik->total_jabatan_guru(21);
        $data['total_jabatan_pai'] = $this->m_akademik->total_jabatan_guru(22);
        $data['total_jabatan_bJepang'] = $this->m_akademik->total_jabatan_guru(23);
        $data['total_jabatan_BK'] = $this->m_akademik->total_jabatan_guru(24);
        $data['total_jabatan_humas'] = $this->m_akademik->total_jabatan_guru(25);
        $data['jabatan'] = $this->m_akademik->get_jabatan('jabatan');

        $data['ta'] = $this->m_akademik->get_tahun_ajaran_aktif();
        $data['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
        $this->load->view('akademik/dashboard', $data);
    }
// Tahun Ajar
    public function tahun_ajaran()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'tahun_ajaran',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'tahun_ajaran'
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
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'tahun_ajaran'
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
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'tahun_ajaran'
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
            'keterangan' => $this->input->post('keterangan'),
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
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'jenjang'
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
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'jenjang'
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
            'alamat' => $this->input->post('alamat'),
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
            'alamat' => $this->input->post('alamat'),
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

// Tingkat
    public function tingkat()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'tingkat',
            'menu_submenu_admin'=>'kelas',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'tingkat',
        ];
        $data['tingkat'] = $this->m_akademik->get('tabel_tingkat');
        $this->load->view('akademik/tingkat/tingkat', $data);
    }

    public function tingkat_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'tingkat',
            'menu_submenu_admin'=>'kelas',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'tingkat',
        ];
        $this->load->view('akademik/tingkat/form_tingkat', $data);
    }

    public function tambah_tingkat()
    {
        $data = [
            'nama_tingkat' => $this->input->post('nama_tingkat'),
            'keterangan' => $this->input->post('keterangan'),
            'id_jenjang' => $this->m_akademik->getone('tabel_jenjang', 'id_jenjang'),
        ];
        $this->m_akademik->add('tabel_tingkat', $data);
        redirect(base_url('Akademik/tingkat'));
    }

    public function edit_tingkat($id)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'tingkat',
            'menu_submenu_admin'=>'kelas',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'tingkat',
        ];
        $data['tingkat']=$this->m_akademik->getwhere('tabel_tingkat', array('id_tingkat'=> $id))->result();
        $data['kelas'] = $this->m_akademik->get('tabel_kelas');
        $data['guru'] = $this->m_akademik->get('tabel_guru');
        $data['jenjang'] = $this->m_akademik->get('tabel_jenjang');
        $this->load->view('akademik/tingkat/edit_tingkat', $data);
    }

    public function update_tingkat()
    {
        $data =  [
            'nama_tingkat' => $this->input->post('nama_tingkat'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $logged=$this->m_akademik->update('tabel_tingkat', $data, array('id_tingkat'=>$this->input->post('id_tingkat')));
        if($logged)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/tingkat'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Akademik/tingkat/edit_ta/'.$this->input->post('id_tingkat')));
        }
    }

    public function hapus_tingkat($id)
    {
        $this->m_akademik->delete('tabel_tingkat', 'id_tingkat', $id);
        redirect(base_url('Akademik/tingkat'));
    }

// Kelas
    public function kelas()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'kelas',
            'menu_submenu_admin'=>'kelas',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'kelas',
        ];
        $data['kelas'] = $this->m_akademik->get('tabel_kelas');
        $this->load->view('akademik/kelas/kelas', $data);
    }

    public function kelas_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'kelas',
            'menu_submenu_admin'=>'kelas',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'kelas',
        ];
        $data['tingkat'] = $this->m_akademik->get('tabel_tingkat');
        $data['guru'] = $this->m_akademik->get('tabel_guru');
        $this->load->view('akademik/kelas/form_kelas', $data);
    }

    public function tambah_kelas()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_tingkat' => $this->input->post('id_tingkat'),
            'kuota' => $this->input->post('kuota'),
            'kode_guru' => $this->input->post('kode_guru'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->m_akademik->add('tabel_kelas', $data);
        redirect(base_url('Akademik/kelas'));
    }

    public function edit_kelas($id_kelas)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'kelas',
            'submenu'=>'kelas',
            'menu_submenu_admin'=>'kelas',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'kelas',
        ];
        $data['kelas']=$this->m_akademik->getwhere('tabel_kelas', array('id_kelas' => $id_kelas))->result();
        $data['tingkat'] = $this->m_akademik->get('tabel_tingkat');
        $data['guru'] = $this->m_akademik->get('tabel_guru');
        $this->load->view('akademik/kelas/edit_kelas', $data);
    }

    public function update_kelas()
    {
        $data =  [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_tingkat' => $this->input->post('id_tingkat'),
            'kuota' => $this->input->post('kuota'),
            'kode_guru' => $this->input->post('kode_guru'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->m_akademik->update('tabel_kelas', $data, array('id_kelas'=>$this->input->post('id_kelas')));
        redirect(base_url('Akademik/kelas'));
    }
    
    public function hapus_kelas($id)
    {
        $this->m_akademik->delete('tabel_kelas', 'id_kelas', $id);
        redirect(base_url('Akademik/kelas'));
    }

// Jabatan
public function detail_jabatan($id_jabatan)
{
    $data = [
        'judul' => 'akademik',
        'page' => 'akademik',
        'menu' => 'jabatan',
        'submenu'=>'detail_jabatan',
        'menu_submenu_admin'=>'jabatan',
        'menu_admin' => 'akademik',
        'submenu_admin'=>'detail_jabatan',
    ];
    $data['detail_jabatan']=$this->m_akademik->get_jabatanById('tabel_guru', $id_jabatan)->result();
    $this->load->view('akademik/guru/detail_jabatan_guru', $data);
}

// Guru
    public function guru()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'guru',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'guru',
        ];
        $this->load->model('M_akademik');
        $data['guru'] = $this->m_akademik->get_guru('guru');
        $this->load->view('akademik/guru/guru', $data);
    }

    public function detail_guru($id_guru)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'guru',
            'submenu'=>'data_guru',
            'menu_submenu_admin'=>'guru',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'data_guru',
        ];
        $data['guru']=$this->m_akademik->get_guruById('tabel_guru', $id_guru)->result();
        $this->load->view('akademik/guru/detail_guru', $data);
    }

    public function guru_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'guru',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'guru',
        ];
        $data['acak'] = 'KG'.'-'.$this->acak(6);
        $data['jabatan'] = $this->m_akademik->get_jabatan('jabatan');
        $this->load->view('akademik/guru/form_guru', $data);
    }

    public function tambah_guru()
    {
        $data = [
            'kode_guru' => $this->input->post('kode_guru'),
            'nama_guru' => $this->input->post('nama_guru'),
            'nip' => $this->input->post('nip'),
            'nik' => $this->input->post('nik'),
            'jekel' => $this->input->post('jekel'),
            'no_hp' => $this->input->post('no_hp'),
            'jabatan' => $this->input->post('jabatan'),
            'tmt' => $this->input->post('tmt'),
            'no_sk' => $this->input->post('no_sk'),
            'tgl_sk' => $this->input->post('tgl_sk'),
            'alamat' => $this->input->post('alamat'),
            'id_jabatan' => $this->input->post('jabatan'),
        ];
        $this->m_akademik->tambah_guru('tabel_guru', $data);
        $nilaiAccess = [
            'username' => $this->input->post('nama_guru'),
            'email' => str_replace(' ', '', $this->input->post('nama_guru').'@gmail.com'),
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
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'guru',
        ];
        $data['guru']=$this->m_akademik->get_guruById('tabel_guru', $kode_guru)->result();
        $data['jabatan'] = $this->m_akademik->get_jabatan('jabatan');
        $this->load->view('akademik/guru/edit_guru', $data);
    }

    public function update_guru()
    {
        $data =  [
            'nama_guru' => $this->input->post('nama_guru'),
            'nip' => $this->input->post('nip'),
            'nik' => $this->input->post('nik'),
            'jekel' => $this->input->post('jekel'),
            'no_hp' => $this->input->post('no_hp'),
            'jabatan' => $this->input->post('jabatan'),
            'tmt' => $this->input->post('tmt'),
            'no_sk' => $this->input->post('no_sk'),
            'tgl_sk' => $this->input->post('tgl_sk'),
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
    
    public function hapus_guru($kode_guru)
    {
        $this->m_akademik->hapus_guru('tabel_guru', 'kode_guru', $kode_guru);
        $this->m_akademik->hapus_guru('tabel_level', 'kode_guru', $kode_guru);
        redirect(base_url('Akademik/guru'));
    }

    public function cetak_guru($id_gur)
    {
        $data = [
            'judul' => 'guru',
            'page' => 'guru',
            'menu' => 'guru',
            'submenu'=>'data_guru'
        ];
        $cek = $this->m_akademik->get_guruById("tabel_guru",$id_gur)->result();
         
            $data['data'] = $this->m_akademik->get_guruById("tabel_guru",$id_gur)->result();
            $this->load->library('pdf');
            $this->pdf->load_view('akademik/guru/cetak_guru', $data);
            $this->pdf->render();
            $this->pdf->stream(" Akademik ".$id_gur.".pdf", array("Attachment" => false));		
            
    }
    
// Siswa
 // Pendaftaran Siswa
    public function siswa_pendaftaran()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'siswa_pendaftaran',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'siswa',
        ];
        $this->load->model('M_akademik');
        $data['data_siswa_daftar'] = $this->m_akademik->get_siswa_pendaftaran('data_siswa_daftar');
        $data['tahun_ajaran_aktif'] = $this->m_akademik->get_tahun_ajaran_aktif('tahun_ajaran_aktif');
        $data['data_jenjang'] = $this->m_akademik->get_jenjang('data_jenjang');
        $this->load->view('akademik/siswa/pendaftaran', $data);
    }

    public function detail_pendaftaran($id_daftar)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'siswa_pendaftaran',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'siswa',
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
            'submenu'=>'siswa_pendaftaran',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'siswa',
        ];
        $pilih_jenjang['data_jenjang'] = $this->m_akademik->get_jenjang('data_jenjang');
        $data['data_pendaftaran_siswa'] = $this->m_akademik->get_siswa_pendaftaran('data_pendaftaran_siswa');
        $data['tahun_ajaran_aktif'] = $this->m_akademik->get_tahun_ajaran_aktif('tahun_ajaran_aktif');
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
            $data = array
            (
                'foto' => 'User.png',
                'no_reg' => 'REG'.'-'.$this->acak(6),
                'id_angkatan' => $this->input->post('id_angkatan'),
                'tgl_daftar' => $this->input->post('tgl_daftar'),
                'id_jenjang' => $this->input->post('id_jenjang'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nama' => $this->input->post('nama'),
                'agama' => $this->input->post('agama'),
                'nisn' => $this->input->post('nisn'),
                'nik' => $this->input->post('nik'),
                'kk' => $this->input->post('kk'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'anak_ke' => $this->input->post('anak_ke'),
                'ayah' => $this->input->post('ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'gaji_ayah' => $this->input->post('gaji_ayah'),
                'ibu' => $this->input->post('ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'gaji_ibu' => $this->input->post('gaji_ibu'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jekel' => $this->input->post('jekel'),
                'diterima' => 'P',
            );
            $masuk=$this->m_akademik->tambah_pendaftaran('tabel_daftar', $data);

            $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Akademik/siswa_pendaftaran'));
        }
        else
        {
            $data = array
            (
                'foto' => $foto[1],
                'no_reg' => 'REG'.'-'.$this->acak(6),
                'id_angkatan' => $this->input->post('id_angkatan'),
                'tgl_daftar' => $this->input->post('tgl_daftar'),
                'id_jenjang' => $this->input->post('id_jenjang'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nama' => $this->input->post('nama'),
                'agama' => $this->input->post('agama'),
                'nisn' => $this->input->post('nisn'),
                'nik' => $this->input->post('nik'),
                'kk' => $this->input->post('kk'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'anak_ke' => $this->input->post('anak_ke'),
                'ayah' => $this->input->post('ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'gaji_ayah' => $this->input->post('gaji_ayah'),
                'ibu' => $this->input->post('ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'gaji_ibu' => $this->input->post('gaji_ibu'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jekel' => $this->input->post('jekel'),
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

    public function import_excel()
    {
        $this->load->library('excel');
        if (isset($_FILES["fileExcel"]["name"])) {
            $path = $_FILES["fileExcel"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $date = date('Y-m-d');
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();	
                for($row=2; $row<=$highestRow; $row++)
                {
                    $nik = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $kk = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $nisn = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $agama = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $telepon = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $tempat_lahir = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $anak_ke = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $ayah = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $pekerjaan_ayah = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $gaji_ayah = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $ibu = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $pekerjaan_ibu = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $gaji_ibu = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $tgl_lahir = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $jekel = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $asal_sekolah = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    $temp_data[] = array(
                        'nik' => $nik,
                        'kk' => $kk,
                        'nisn'	=> $nisn,
                        'nama'	=> $nama,
                        'agama'	=> $agama,
                        'telepon'	=> $telepon,
                        'alamat'	=> $alamat,
                        'tempat_lahir'	=> $tempat_lahir,
                        'anak_ke'	=> $anak_ke,
                        'ayah'	=> $ayah,
                        'pekerjaan_ayah'	=> $pekerjaan_ayah,
                        'gaji_ayah'	=> $gaji_ayah,
                        'ibu'	=> $ibu,
                        'pekerjaan_ibu'	=> $pekerjaan_ibu,
                        'gaji_ibu'	=> $gaji_ibu,
                        'tgl_lahir'	=> $tgl_lahir,
                        'jekel'	=> $jekel,
                        'asal_sekolah'	=> $asal_sekolah,
                        'no_reg'	=> 'REG'.'-'.$this->acak(6),
                        'foto'	=> 'User.png',
                        'id_angkatan'	=> $this->input->post('id_angkatan'),
                        'id_jenjang'	=> $this->input->post('id_jenjang'),
                        'tgl_daftar'	=> $date,
                    ); 	
                }
            }
            $this->load->library('excel');
            $this->m_akademik->insert($temp_data);
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Akademik/siswa_pendaftaran'));
        }
    }

    public function export_to_excel()
    {
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->m_akademik->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'No Reg');   
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tahun Ajaran');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Jenjang');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Tanggal Daftar');   
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Asal Sekolah');   
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'NISN');   
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Nama');   
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'No NIK');   
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'No KK');   
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Gender');   
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Tempat Lahir');   
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Anak Ke'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Nama Ayah');   
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Pekerjaan Ayah');   
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Gaji Ayah');   
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Nama Ibu');   
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Pekerjaan Ibu');   
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Gaji Ibu');   
        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Tanggal Lahir');   
        $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Agama');   
        $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Alamat');   
        $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Telepon');   
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->no_reg);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, tampil_tahunangkatan_byid($list->id_angkatan));
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, tampil_namajenjang_byid($list->id_jenjang));
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->tgl_daftar);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->asal_sekolah);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->nisn);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->nama);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->nik);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->kk);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->jekel);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->tempat_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->anak_ke);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->ayah);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $list->pekerjaan_ayah);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $list->gaji_ayah);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $list->ibu);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $list->pekerjaan_ibu);
            $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $list->gaji_ibu);
            $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $list->tgl_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $list->agama);
            $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $list->alamat);
            $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $list->telepon);
            $rowCount++;
        }
        $filename = "data-pendaftaran-peserta-didik-baru.csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
    }

    public function edit_pendaftaran($id_daftar)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'siswa_pendaftaran',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'siswa',
        ];
        $data['data_siswa_daftar']=$this->m_akademik->edit_pendaftaran('tabel_daftar', $id_daftar)->result();
        $this->load->view('akademik/siswa/edit_pendaftaran', $data);
    }

    public function update_pendaftaran()
    {
        $foto = $this->upload_img_pendaftaran_siswa('foto');
        if($foto[0]==false)
        {
            $data = array
            (
                'no_reg' => 'REG'.'-'.$this->acak(6),
                'id_angkatan' => $this->input->post('id_angkatan'),
                'tgl_daftar' => $this->input->post('tgl_daftar'),
                'id_jenjang' => $this->input->post('id_jenjang'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nama' => $this->input->post('nama'),
                'agama' => $this->input->post('agama'),
                'nisn' => $this->input->post('nisn'),
                'nik' => $this->input->post('nik'),
                'kk' => $this->input->post('kk'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'anak_ke' => $this->input->post('anak_ke'),
                'ayah' => $this->input->post('ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'gaji_ayah' => $this->input->post('gaji_ayah'),
                'ibu' => $this->input->post('ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'gaji_ibu' => $this->input->post('gaji_ibu'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jekel' => $this->input->post('jekel'),
                'diterima' => 'P',
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
        else
        {
            $data = array
            (
                'foto' => $foto[1],
                'no_reg' => 'REG'.'-'.$this->acak(6),
                'id_angkatan' => $this->input->post('id_angkatan'),
                'tgl_daftar' => $this->input->post('tgl_daftar'),
                'id_jenjang' => $this->input->post('id_jenjang'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nama' => $this->input->post('nama'),
                'agama' => $this->input->post('agama'),
                'nisn' => $this->input->post('nisn'),
                'nik' => $this->input->post('nik'),
                'kk' => $this->input->post('kk'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'anak_ke' => $this->input->post('anak_ke'),
                'ayah' => $this->input->post('ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'gaji_ayah' => $this->input->post('gaji_ayah'),
                'ibu' => $this->input->post('ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'gaji_ibu' => $this->input->post('gaji_ibu'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jekel' => $this->input->post('jekel'),
                'diterima' => 'P',
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
            'submenu'=>'pembagian_kelas',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'pembagian_kelas',
        ];
        $this->load->model('M_akademik');
        $data['data_siswa_diterima'] = $this->m_akademik->get_siswa_diterima('data_siswa_diterima');
        $kelas['kelas'] = $this->m_akademik->get('tabel_kelas');
        $this->load->view('akademik/siswa/pembagian_kelas', $data + $kelas);
    }

    // public function finter_by_jenjang()
    // {
    //     $data = [
    //         'judul' => 'akademik',
    //         'page' => 'akademik',
    //         'menu' => 'siswa',
    //         'submenu'=>'pembagian_kelas',
    //         'menu_submenu_admin'=>'siswa',
    //         'menu_admin' => 'akademik',
    //         'submenu_admin'=>'pembagian_kelas',
    //     ];
    //     $nama_jenjang = $this->input->post('nama_jenjang');
    //     $nilaifilter = $this->input->post('nilaifilter');
        
    //     if($nilaifilter = 1) {
    //         $jenjang['jenjang'] = $this->m_akademik->get_jenjang('jenjang');
    //         $rombel['rombel'] = $this->m_akademik->get_rombel('rombel');
    //         $data['data_siswa_diterima'] = $this->m_akademik->filterByJenjang($nama_jenjang);
    //         $data['filter']=$this->m_akademik->get_filter('tabel_jenjang', $nama_jenjang)->result();
            
    //         $this->load->view('akademik/siswa/filter/filter_by_jenjang', $data + $jenjang + $rombel);
    //     }
    // }

    public function masuk_kelas()
    {
        $id_kelas = $this->input->post('id_kelas');
        $id_daftar = $this->input->post('id_daftar');

        foreach( $id_daftar as $key => $value){
            $this->db->insert('tabel_siswa', array(
                'id_kelas' => $id_kelas,
                'id_daftar' => $key,
                'nama' => tampil_nama_siswa_byid($key)
            ));
            $this->m_akademik->ubah_pendaftaran('tabel_siswa', array( 
                'id_siswa' => $key, 
                'id_kelas' => $id_kelas 
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
            'submenu'=>'seleksi_siswa',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'seleksi_siswa',
        ];
        $this->load->model('M_akademik');
        $siswa_daftar['data_siswa_daftar'] = $this->m_akademik->get_siswa_pendaftaran('data_siswa_daftar');
        $siswa_diterima['siswa_diterima'] = $this->m_akademik->get_siswa_diterima('siswa_diterima');
        $this->load->view('akademik/siswa/seleksi_siswa', $siswa_daftar + $siswa_diterima+$data);
    }

    public function terima_siswa($id_daftar)
    {
        $approve = array
        (
            "diterima" => "S",
        );

        $approve_siswa=$this->m_akademik->ubah_seleksi('tabel_daftar', $approve, array('id_daftar'=>$id_daftar));
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

    public function tolak_siswa($id_daftar)
    {
        $approve = array
        (
            "diterima" => "R",
        );

        $approve_siswa=$this->m_akademik->ubah_seleksi('tabel_daftar', $approve, array('id_daftar'=>$id_daftar));
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

    public function kembalikan_siswa($id_daftar)
    {
        $data = array
        (
            "diterima" => "P",
        );

        $data_siswa=$this->m_akademik->ubah_seleksi('tabel_daftar', $data, array('id_daftar'=>$id_daftar));
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

    public function terima_all()
    {
        $id_daftar = $this->input->post('id_daftar');

        foreach ($id_daftar as $key => $value) { 
            $this->m_akademik->ubah_pendaftaran('tabel_daftar', array( 
                'id_daftar' => $key, 
                'diterima' => "S", 
            ), array( 
                'id_daftar' => $key 
            )); 
        }
        redirect(base_url('Akademik/siswa_seleksi_siswa'));
    }

    public function kembalikan_all()
    {
        $id_daftar = $this->input->post('id_daftar');

        foreach ($id_daftar as $key => $value) { 
            $this->m_akademik->ubah_pendaftaran('tabel_daftar', array( 
                'id_daftar' => $key, 
                'diterima' => "P", 
            ), array( 
                'id_daftar' => $key 
            )); 
        }
        redirect(base_url('Akademik/siswa_seleksi_siswa'));
    }

 // Data Siswa 
    public function siswa_data()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'data_siswa',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'data_siswa',
        ];
        $this->load->model('M_akademik');
        $data['tingkat'] = $this->m_akademik->get('tabel_tingkat');
        $data['kelas'] = $this->m_akademik->get('tabel_kelas');
        $data['siswa'] = $this->m_akademik->get_siswa('siswa');
        $this->load->view('akademik/siswa/data', $data);
    }

    public function get_kelasByIdTingkat()
    {
        $id_tingkat = $this->input->post('id_tingkat',TRUE);
        $data = $this->m_akademik->get_kelas($id_tingkat)->result();
        echo json_encode($data);
    }

    public function finter_by_kelas_siswa()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'data_siswa',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'data_siswa',
        ];
        $id_kelas = $this->input->post('id_kelas');
        $nilaifilter = $this->input->post('nilaifilter');

        if($nilaifilter = 1) 
            $data['tingkat'] = $this->m_akademik->get('tabel_tingkat');{
            $data['kelas'] = $this->m_akademik->get('tabel_kelas');
            $data['siswa'] = $this->m_akademik->filterByKelas($id_kelas);
            $data['filter']=$this->m_akademik->get_filter_kelas('tabel_kelas', $id_kelas)->result();
            
            $this->load->view('akademik/siswa/filter/filter_by_kelas_siswa', $data);
        }
    }

    public function export_siswa_to_excel()
    {
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->m_akademik->exportSiswa();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Kelas'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'No NIK');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'No KK');  
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'NISN');   
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Nama');   
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Jenis Kelamin');   
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Tempat Lahir');   
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Tanggal Lahir');   
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Alamat');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Agama');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Telepon');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Nama Ayah');   
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Nama Ibu');   

        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, tampil_kelas_byid($list->id_kelas));
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, tampil_nik_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, tampil_kk_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, tampil_nisn_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, tampil_nama_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, tampil_jekel_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, tampil_tempat_lahir_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, tampil_tanggal_lahir_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, tampil_alamat_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, tampil_agama_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, tampil_telepon_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, tampil_nama_ayah_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, tampil_nama_ibu_siswa_byid($list->id_daftar));
            $rowCount++;
        }
        $filename = "data-siswa.csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
    }

    public function export_siswa_kelas_to_excel($kelas)
    {
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->m_akademik->export_siswa_kelas($kelas);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Kelas'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'No NIK');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'No KK');  
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'NISN');   
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Nama');   
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Jenis Kelamin');   
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Tempat Lahir');   
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Tanggal Lahir');   
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Alamat');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Agama');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Telepon');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Nama Ayah');   
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Nama Ibu');   

        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, tampil_kelas_byid($list->id_kelas));
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, tampil_nik_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, tampil_kk_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, tampil_nisn_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, tampil_nama_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, tampil_jekel_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, tampil_tempat_lahir_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, tampil_tanggal_lahir_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, tampil_alamat_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, tampil_agama_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, tampil_telepon_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, tampil_nama_ayah_siswa_byid($list->id_daftar));
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, tampil_nama_ibu_siswa_byid($list->id_daftar));
            $rowCount++;
        }
        $filename = "data-siswa-".tampil_kelas_byid($list->id_kelas).".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
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
            'submenu'=>'data_siswa',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'data_siswa',
        ];
        $data['siswa']=$this->m_akademik->get_siswaById('tabel_siswa', $id_siswa)->result();
        $this->load->view('akademik/siswa/detail_siswa', $data);
    }

    public function edit_siswa_kelas($id_siswa)
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'data_siswa',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'data_siswa',
        ];
        $data['siswa']=$this->m_akademik->get_siswaById('tabel_siswa', $id_siswa)->result();
        $data['kelas'] = $this->m_akademik->get('tabel_kelas');
        $this->load->view('akademik/siswa/edit_siswa_rombel', $data);
    }

    public function update_siswa_kelas()
    {
        $data = array (
            "id_daftar" => $this->input->post("id_daftar"),
            "id_kelas" => $this->input->post("id_kelas"),
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
            'submenu'=>'data_siswa',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'data_siswa',
        ];
        $data['data_siswa_daftar']=$this->m_akademik->edit_pendaftaran('tabel_daftar', $id_daftar)->result();
        $this->load->view('akademik/siswa/edit_siswa', $data);
    }
    
    public function update_siswa()
    {
        $foto = $this->upload_img_pendaftaran_siswa('foto');
        if($foto[0]==false)
        {
            $data = array
            (
                'no_reg' => 'REG'.'-'.$this->acak(6),
                'id_angkatan' => $this->input->post('id_angkatan'),
                'tgl_daftar' => $this->input->post('tgl_daftar'),
                'id_jenjang' => $this->input->post('id_jenjang'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nama' => $this->input->post('nama'),
                'agama' => $this->input->post('agama'),
                'nisn' => $this->input->post('nisn'),
                'nik' => $this->input->post('nik'),
                'kk' => $this->input->post('kk'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'anak_ke' => $this->input->post('anak_ke'),
                'ayah' => $this->input->post('ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'gaji_ayah' => $this->input->post('gaji_ayah'),
                'ibu' => $this->input->post('ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'gaji_ibu' => $this->input->post('gaji_ibu'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jekel' => $this->input->post('jekel'),
                'diterima' => 'A',
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
        else
        {
            $data = array
            (
                'foto' => $foto[1],
                'no_reg' => 'REG'.'-'.$this->acak(6),
                'id_angkatan' => $this->input->post('id_angkatan'),
                'tgl_daftar' => $this->input->post('tgl_daftar'),
                'id_jenjang' => $this->input->post('id_jenjang'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nama' => $this->input->post('nama'),
                'agama' => $this->input->post('agama'),
                'nisn' => $this->input->post('nisn'),
                'nik' => $this->input->post('nik'),
                'kk' => $this->input->post('kk'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'anak_ke' => $this->input->post('anak_ke'),
                'ayah' => $this->input->post('ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'gaji_ayah' => $this->input->post('gaji_ayah'),
                'ibu' => $this->input->post('ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'gaji_ibu' => $this->input->post('gaji_ibu'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jekel' => $this->input->post('jekel'),
                'diterima' => 'P',
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
    }
 //Mutasi
    public function siswa_mutasi()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'mutasi',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'mutasi',
        ];
        $this->load->model('M_akademik');
        $data['siswa'] = $this->m_akademik->get('tabel_siswa');
        $data['kelas'] = $this->m_akademik->get('tabel_kelas');
        $data['kelas2'] = $this->m_akademik->get('tabel_kelas');
        $this->load->view('akademik/siswa/mutasi', $data);
    }

    public function aksi_mutasi_siswa() {
        $option = $this->input->post('option');
        $id_kelas = $this->input->post('id_kelas');
        $id_kelas2 = $this->input->post('id_kelas2');
        $id_daftar = $this->input->post('id_daftar');

        if ($option == 'Naik Kelas') {
            foreach ($id_daftar as $key => $value) {
                $logged=$this->m_akademik->ubah_siswa('tabel_siswa', array(
                    'id_daftar' => $key,
                    'id_kelas' => $id_kelas2
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
                    'id_kelas' => $id_kelas
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
                $id_kelass = tampil_id_kelas_byid($key);
                $logged=$this->m_akademik->tambah_pindah_sekolah('tabel_pindah', array(
                    'id_daftar' => $key,
                    'id_kelas' => $id_kelass,
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
                $id_siswas = tampil_id_siswa_byid($key);
                $this->m_akademik->hapus_siswa('tabel_anggota', 'id_siswa', $id_siswas);
                $this->m_akademik->hapus_siswa('tabel_pembayaran', 'id_siswa', $id_siswas);
                $this->m_akademik->hapus_siswa('tabel_nilai', 'id_siswa', $id_siswas);
                $this->m_akademik->hapus_siswa('tabel_siswa', 'id_siswa', $id_siswas);
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
                $id_kelass = tampil_id_kelas_byid($key);
                $logged=$this->m_akademik->tambah_lulus('tabel_lulus', array(
                    'id_daftar' => $key,
                    'id_kelas' => $id_kelass,
                    'tanggal_lulus' => $tanggal_lulus,
                ));
                
                foreach ($id_daftar as $key => $value) { 
                    $this->m_akademik->ubah_pendaftaran('tabel_daftar', array( 
                        'id_daftar' => $key, 
                        'diterima' => "G", 
                    ), array( 
                        'id_daftar' => $key 
                    )); 
                }
                foreach ($id_daftar as $key => $value) { 
                    $id_siswas = tampil_id_siswa_byid($key);
                    $this->m_akademik->hapus_siswa('tabel_anggota', 'id_siswa', $id_siswas);
                    $this->m_akademik->hapus_siswa('tabel_pembayaran', 'id_siswa', $id_siswas);
                    $this->m_akademik->hapus_siswa('tabel_nilai', 'id_siswa', $id_siswas);
                    $this->m_akademik->hapus_siswa('tabel_siswa', 'id_siswa', $id_siswas);
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
        } else {
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Akademik/siswa_mutasi'));
        }
    }

    public function filter_kelas()
    {
        $id_kelas = $this->input->post('id_kelas');
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'mutasi',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'mutasi',
        ];
        $this->load->model('M_akademik');
        $this->session->set_userdata('id_kelas', $id_kelas);
    
        $data['siswa'] = $this->m_akademik->get_siswaperkelas('tabel_siswa', $id_kelas)->result();
        $data['kelas'] = $this->m_akademik->get('tabel_kelas');
        $this->load->view('akademik/siswa/mutasi', $data);
    }


    public function tampil_data_mutasi()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'siswa',
            'submenu'=>'mutasi',
            'menu_submenu_admin'=>'siswa',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'mutasi',
        ];
        $id = $this->input->post('id_kelas');
        $this->session->set_userdata('id_select', $id);
        $this->load->model('M_akademik');
        $data['kelas'] = $this->m_akademik->get('tabel_kelas');

        if ($id == 1) {
            $data['siswa'] = $this->m_akademik->get_pindah('siswa');
            $this->load->view('akademik/siswa/tampil_data', $data);
        } elseif ($id == 2) {
            $data['siswa'] = $this->m_akademik->get_lulus('siswa');
            $this->load->view('akademik/siswa/tampil_data', $data);
        }
    }

// Pelajaran
 // Mapel
    public function pelajaran()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'mapel',
            'menu_submenu_admin'=>'pelajaran',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'mapel',
        ];
        $data['mapel'] = $this->m_akademik->get_mapel('mapel');
        $this->load->view('akademik/pelajaran/mata_pelajaran', $data);
    }

    public function mapel_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'mapel',
            'menu_submenu_admin'=>'pelajaran',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'mapel',
        ];
        $data['jenismapel'] = $this->m_akademik->get_jenismapel('jenismapel');
        $this->load->view('akademik/pelajaran/form_mapel', $data);
    }

    public function tambah_mapel()
    {
        $data = [
            'nama_mapel' => $this->input->post('nama_mapel'),
            'id_jenismapel' => $this->input->post('id_jenismapel'),
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
            'submenu'=>'mapel',
            'menu_submenu_admin'=>'pelajaran',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'mapel',
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
            'submenu'=>'jenis_mapel',
            'menu_submenu_admin'=>'pelajaran',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'jenis_mapel',
        ];
        $data['jenismapel'] = $this->m_akademik->get_jenismapel('jenismapel');
        $this->load->view('akademik/pelajaran/jenis_pelajaran', $data);
    }

    public function jenismapel_form()
    {
        $data = [
            'judul' => 'akademik',
            'page' => 'akademik',
            'menu' => 'mapel',
            'submenu'=>'jenis_mapel',
            'menu_submenu_admin'=>'pelajaran',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'jenis_mapel',
        ];
        $this->load->view('akademik/pelajaran/form_jenismapel', $data);
    }

    public function tambah_jenismapel()
    {
        $data = [
            'nama_jenismapel' => $this->input->post('nama_jenismapel'),
            'kurikulum' => $this->input->post('kurikulum'),
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
            'submenu'=>'jenis_mapel',
            'menu_submenu_admin'=>'pelajaran',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'jenis_mapel',
        ];
        $data['jenismapel']=$this->m_akademik->get_jenismapelById('tabel_jenismapel', $id_jenismapel)->result();
        $this->load->view('akademik/pelajaran/edit_jenismapel', $data);
    }

    public function update_jenismapel()
    {
        $data =  [
            'nama_jenismapel' => $this->input->post('nama_jenismapel'),
            'kurikulum' => $this->input->post('kurikulum'),
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
            'menu' => 'guru',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'akademik',
            'submenu_admin'=>'guru',
        ];
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
        redirect(base_url('Akademik/alokasi_guru/'.$this->input->post('kode_guru')));
    }
    
    public function get_mapelByAlokasiguru(){
        $id = $this->input->post('id_alokasiguru',TRUE);
        $data = $this->m_akademik->getwhere('tabel_alokasiguru', array('id_alokasiguru' => $id))->result();
        echo json_encode($data);
    }

    public function tambah_jam_mengajar()
    {
        $data =  [
            'id_mapel' => $this->input->post('id_mapel'),
            'jam_mengajar' => $this->input->post('jam_mengajar'),
        ];
        $this->m_akademik->update('tabel_alokasiguru', $data, array('id_alokasiguru'=>$this->input->post('id_alokasiguru')));
        redirect($_SERVER['HTTP_REFERER']);
    }

 // Alok Mapel
    public function alokasi_mapel($id_mapel)
        {
            $data = [
                'judul' => 'akademik',
                'page' => 'akademik',
                'menu' => 'mapel',
                'submenu'=>'alok_mapel',
                'menu_submenu_admin'=>'pelajaran',
                'menu_admin' => 'akademik',
                'submenu_admin'=>'mapel',
            ];
            $data['kelas'] = $this->m_akademik->get('tabel_kelas');
            $data['mapel']=$this->m_akademik->get_mapelById('tabel_mapel', $id_mapel)->result();
            $data['alokasimapel'] = $this->m_akademik->get_alokasimapelByIdMapel('tabel_alokasimapel', $id_mapel);
            $this->load->view('akademik/alokasi/alokasi_mapel/alokasi_mapel', $data);
        }
    public function tambah_alokasimapel()
        {
            $kelas = $this->input->post('id_kelas');
            $mapel = $this->input->post('id_mapel');
            foreach( $kelas as $key => $value){
                $this->db->insert('tabel_alokasimapel', array(
                    'id_kelas' => $key,
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
            redirect(base_url('Akademik/alokasi_mapel/'.$this->input->post('id_mapel')));
        }

        public function get_mapelByAlokasimapel(){
            $id = $this->input->post('id_alokasimapel',TRUE);
            $data = $this->m_akademik->getwhere('tabel_alokasimapel', array('id_alokasimapel' => $id))->result();
            echo json_encode($data);
        }
    
        public function tambah_jam_belajar()
        {
            $data =  [
                'semester' => $this->input->post('semester'),
                'jam_belajar' => $this->input->post('jam_belajar'),
            ];
            $this->m_akademik->update('tabel_alokasimapel', $data, array('id_alokasimapel'=>$this->input->post('id_alokasimapel')));
            redirect($_SERVER['HTTP_REFERER']);
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
                'submenu_admin'=>'',
            ];
            $data['user']=$this->m_akademik->get_userByLogin('tabel_level')->result();
            $this->load->view('akademik/akun/akun', $data);
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
                    $masuk=$this->m_akademik->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                    if($masuk)
                    {
                        $this->session->set_flashdata('sukses', 'berhasil update email dan username');
                        redirect(base_url('Akademik/akun'));
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'gagal..');
                        redirect(base_url('Akademik/akun'));
                    }
            }else if($password_baru !== null){
                if($password_baru !== $password_baru2){
                    $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                    redirect(base_url('Akademik/akun'));
                }else{
                    $data = array
                    (
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password_baru')),
                    );
                    $masuk=$this->m_akademik->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                    if($masuk)
                    {
                        $this->session->set_flashdata('sukses', 'berhasil update email, username, dan password');
                        redirect(base_url('Akademik/akun'));
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'gagal update email, username, dan password');
                        redirect(base_url('Akademik/akun'));
                    }
                }
            }else {
                    $data = array
                    (
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password_baru')),
                    );
                    $masuk=$this->m_akademik->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                    if($masuk)
                    {
                        $this->session->set_flashdata('sukses', 'berhasil update akun');
                        redirect(base_url('Akademik/akun'));
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'gagal update akun');
                        redirect(base_url('Akademik/akun'));
                    }
            }
        }
}