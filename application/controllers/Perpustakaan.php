<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perpustakaan');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_perpustakaan')!='login') {
            redirect(base_url('Login'));
        }
    }
    
    public function index()
    {
        $this->load->view('perpustakaan/dashboard');

    }

// Rak Buku
    public function rak_buku()
    {
        $this->load->model('M_perpustakaan');
        $data['data_rak_buku'] = $this->m_perpustakaan->get_all_data_rak_buku('data_rak_buku');
        $this->load->view('perpustakaan/rak_buku/rak_buku', $data);
    }

    public function tambah_rak_buku()
    {
        $data['data_rak_buku'] = $this->m_perpustakaan->get_all_data_rak_buku('data_rak_buku');
        $this->load->view('perpustakaan/rak_buku/tambah_rak_buku', $data);
    }

    public function aksi_tambah_rak_buku()
    {
        $data = array
        (
            'nama_rak_buku' => $this->input->post('nama_rak_buku'),
            'keterangan_rak_buku' => $this->input->post('keterangan_rak_buku'),
            'del_flag' => '1',
        );
        $masuk=$this->m_perpustakaan->tambah_rak('table_rak_buku', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/rak_buku'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/tambah_rak_buku'));
        }
    }

    public function edit_rak_buku($id_rak_buku)
    {
        $data['data_rak_buku']=$this->m_perpustakaan->edit_rak('table_rak_buku', $id_rak_buku)->result();
        $this->load->view('perpustakaan/rak_buku/edit_rak_buku', $data);
    }

    public function update_rak_buku()
    {
        $data = array (
            'nama_rak_buku' => $this->input->post('nama_rak_buku'),
            'keterangan_rak_buku' => $this->input->post('keterangan_rak_buku'),
            'del_flag' => '1',
        );
        $masuk=$this->m_perpustakaan->ubah_rak('table_rak_buku', $data, array('id_rak_buku'=>$this->input->post('id_rak_buku')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/rak_buku/rak_buku'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/rak_buku/edit_rak_buku/'.$this->input->post('id_rak_buku')));
        }
    }

    public function hapus_rak_buku($id_rak_buku)
    {
        $hapus=$this->m_perpustakaan->hapus_rak('table_rak_buku', 'id_rak_buku', $id_rak_buku);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Perpustakaan/rak_buku/rak_buku'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/rak_buku/rak_buku'));
        }
    }

// Anggota
    public function kartu_anggota()
    {
        $this->load->view('perpustakaan/anggota/kartu_anggota');
    }

    public function data_anggota()
    {
        $data['data_anggota'] = $this->m_perpustakaan->get_anggota('data_anggota');
        $this->load->view('perpustakaan/anggota/data_anggota', $data);
    }

    public function form_anggota()
    {
        $this->load->model('m_akademik');
        $data['siswa'] = $this->m_akademik->get_siswa('siswa');
        $this->load->view('perpustakaan/anggota/form_anggota', $data);
    }

    public function aksi_tambah_anggota()
    {
        $data = array
        (
            'id_siswa' => $this->input->post('id_siswa'),
            'tgl_daftar' => $this->input->post('tgl_daftar'),
            'status' => '1',
        );
        $masuk=$this->m_perpustakaan->aksi_tambah_anggota('tabel_anggota', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/data_anggota'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/form_anggota'));
        }
    }

    public function edit_anggota($id_anggota)
    {
        $data['data_anggota']=$this->m_perpustakaan->edit_anggota('table_anggota', $id_anggota)->result();
        $this->load->view('perpustakaan/data_anggota/edit_anggota', $data);
    }

    public function update_anggota()
    {
        $data = array
        (
            'nama_anggota' => $this->input->post('nama_anggota'),
            'nisn' => $this->input->post('nisn'),
            'keterangan' => $this->input->post('keterangan'),
            'del_flag' => '1',
        );
        $masuk=$this->m_perpustakaan->ubah_anggota('table_anggota', $data, array('id_anggota'=>$this->input->post('id_anggota')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/data_anggota'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/edit_anggoota/'.$this->input->post('id_anggota')));
        }
    }

    public function hapus_anggota($id_anggota)
    {
        $hapus=$this->m_perpustakaan->hapus_kategori('table_anggota', 'id_anggota', $id_anggota);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Perpustakaan/data_anggota'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/data_anggota'));
        }

    }

// Kategori
    public function kategori_buku()
    {
        $this->load->model('M_perpustakaan');
        $data['data_kategori_buku'] = $this->m_perpustakaan->get_all_data_kategori_buku('data_kategori_buku');
        $this->load->view('perpustakaan/kategori_buku/kategori_buku', $data);
    }

    public function tambah_kategori_buku()
    {
        $data['data_kategori_buku'] = $this->m_perpustakaan->get_all_data_kategori_buku('data_kategori_buku');
        $this->load->view('perpustakaan/kategori_buku/tambah_kategori_buku', $data);
    }

    public function aksi_tambah_kategori_buku()
    {
        $data = array
        (
            'nama_kategori_buku' => $this->input->post('nama_kategori_buku'),
            'keterangan_kategori_buku' => $this->input->post('keterangan_kategori_buku'),
            'del_flag' => '1',
        );
        $masuk=$this->m_perpustakaan->tambah_kategori('table_kategori_buku', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/kategori_buku'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/tambah_kategori_buku'));
        }
    }

    public function edit_kategori_buku($id_kategori_buku)
    {
        $data['data_kategori_buku']=$this->m_perpustakaan->edit_kategori('table_kategori_buku', $id_kategori_buku)->result();
        $this->load->view('perpustakaan/kategori_buku/edit_kategori_buku', $data);
    }

    public function update_kategori_buku()
    {
        $data = array (
            'nama_kategori_buku' => $this->input->post('nama_kategori_buku'),
            'keterangan_kategori_buku' => $this->input->post('keterangan_kategori_buku'),
            'del_flag' => '1',
        );
        $masuk=$this->m_perpustakaan->ubah_kategori('table_kategori_buku', $data, array('id_kategori_buku'=>$this->input->post('id_kategori_buku')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/kategori_buku'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/edit_kategori_buku/'.$this->input->post('id_kategori_buku')));
        }
    }

    public function hapus_kategori_buku($id_kategori_buku)
    {
        $hapus=$this->m_perpustakaan->hapus_kategori('table_kategori_buku', 'id_kategori_buku', $id_kategori_buku);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Perpustakaan/kategori_buku'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/kategori_buku'));
        }

    }
    // Akhir Kategori

// Buku
    public function data_buku()
    {
        $this->load->model('M_perpustakaan');
        $data['data_buku'] = $this->m_perpustakaan->get_all_data_buku('data_buku');
        $this->load->view('perpustakaan/data_buku/data_buku', $data);
    }

    public function tambah_buku()
    {
        $kategori['data_kategori_buku'] = $this->m_perpustakaan->get_all_data_kategori_buku('data_kategori_buku');
        $rak_buku['data_rak_buku'] = $this->m_perpustakaan->get_all_data_rak_buku('data_rak_buku');
        $data['data_buku'] = $this->m_perpustakaan->get_all_data_buku('data_buku');
        $this->load->view('perpustakaan/data_buku/tambah_buku', $data + $kategori + $rak_buku);
    }

    public function aksi_tambah_buku()
    {
        $data = array
        (
            'judul_buku' => $this->input->post('judul_buku'),
            'penerbit_buku' => $this->input->post('penerbit_buku'),
            'penulis_buku' => $this->input->post('penulis_buku'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'keterangan' => $this->input->post('keterangan'),
            'sumber' => $this->input->post('sumber'),
            'kategori_id' => $this->input->post('kategori_id'),
            'rak_buku_id' => $this->input->post('rak_buku_id'),
            'del_flag' => '1',
        );
        $masuk=$this->m_perpustakaan->tambah_buku('table_buku', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/data_buku'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/tambah_buku'));
        }
    }

    public function edit_buku($id_buku)
    {
        $data['data_buku']=$this->m_perpustakaan->edit_buku('table_buku', $id_buku)->result();
        $this->load->view('perpustakaan/data_buku/edit_buku', $data);
    }

    public function update_buku()
    {
        $data = array (
            'judul_buku' => $this->input->post('judul_buku'),
            'penerbit_buku' => $this->input->post('penerbit_buku'),
            'penulis_buku' => $this->input->post('penulis_buku'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'keterangan' => $this->input->post('keterangan'),
            'sumber' => $this->input->post('sumber'),
            'del_flag' => '1',
        );
        $masuk=$this->m_perpustakaan->ubah_buku('table_buku', $data, array('id_buku'=>$this->input->post('id_buku')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/data_buku'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/edit_buku/'.$this->input->post('id_buku')));
        }
    }

    public function hapus_buku($id_buku)
    {
        $hapus=$this->m_perpustakaan->hapus_buku('table_buku', 'id_buku', $id_buku);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Perpustakaan/data_buku'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/data_buku'));
        }

    }
    // Akhir Buku

   
    // Peminjaman Buku
    public function peminjaman()
    {
        $peminjam['data_peminjam'] = $this->m_perpustakaan->get_peminjaman('data_peminjam');
        $this->load->view('perpustakaan/peminjaman/peminjaman', $peminjam);
    }
    
    public function input_peminjaman()
    {
        $buku['data_buku'] = $this->m_perpustakaan->get_all_data_buku('data_buku');
        $anggota['data_anggota'] = $this->m_perpustakaan->get_anggota('data_anggota');
        $this->load->view('perpustakaan/peminjaman/input_peminjaman', $buku + $anggota);
    }

    public function aksi_input_peminjaman()
    {
        $data = array
        (
            'no_pinjaman' => $this->input->post('no_pinjaman'),
            'id_anggota' => $this->input->post('id_anggota'),
            'id_buku' => $this->input->post('id_buku'),
            'tgl_pinjaman' => $this->input->post('tgl_pinjaman'),
            'tgl_kembali' => "0000-00-00",
            'status' => 'DIPINJAM',
        );
        $masuk=$this->m_perpustakaan->tambah_pinjaman('tabel_pinjaman', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/peminjaman'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/input_peminjaman'));
        }
    }

    public function peminjam_id($id_pinjaman)
    {
        $peminjam['data_peminjam']=$this->m_perpustakaan->edit_pinjaman('tabel_pinjaman', $id_pinjaman)->result();
        $this->load->view('perpustakaan/peminjaman/detail_peminjaman', $peminjam);
    }
    
// Pengembalian Buku
    public function pengembalian()
    {
        $peminjam['data_peminjam'] = $this->m_perpustakaan->get_peminjaman('data_peminjam');
        $this->load->view('perpustakaan/pengembalian/pengembalian', $peminjam);
    }

    public function proses_peminjam_id($id_pinjaman)
    {
        $peminjam['data_pinjaman']=$this->m_perpustakaan->edit_pinjaman('tabel_pinjaman', $id_pinjaman)->result();
        $this->load->view('perpustakaan/pengembalian/proses_pengembalian', $peminjam);
    }

    public function proses_pengembalian_pinjaman()
    {
        $data = array (
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'status' => 'DIKEMBALIKAN',
        );
        $masuk=$this->m_perpustakaan->ubah_pinjaman('tabel_pinjaman', $data, array('id_pinjaman'=>$this->input->post('id_pinjaman')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/pengembalian'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/proses_peminjam_id/'.$this->input->post('id_pinjaman')));
        }
    }

// Laporan
    public function laporan()
    {
        $this->load->view('perpustakaan/laporan/laporan');
    }
    
    public function barcode($id_buku)
    {
        require 'vendor/autoload.php';
        $data['buku']=$this->m_perpustakaan->get_bukuById('table_buku', $id_buku)->result();
        $this->load->view('perpustakaan/barcode', $data);
    }
}