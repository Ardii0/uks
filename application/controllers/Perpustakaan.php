<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use Picqer as Picqer;

class Perpustakaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('m_perpustakaan');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_perpustakaan')!='login') {
            redirect(base_url('Login'));
        }
    }
    
    public function index()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'dashboard',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'perpustakaan'
        ];
        $data['total_buku'] = $this->m_perpustakaan->total_buku();
        $data['total_rak_buku'] = $this->m_perpustakaan->total_rak_buku();
        $data['total_kategori_buku'] = $this->m_perpustakaan->total_kategori_buku();
        $data['total_anggota'] = $this->m_perpustakaan->total_anggota();
        $data['data_anggota'] = $this->m_perpustakaan->get_anggota('data_anggota');
        $this->load->view('perpustakaan/dashboard', $data);

    }

// Rak Buku
    public function rak_buku()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'rak',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'rak_buku'
        ];
        $this->load->model('M_perpustakaan');
        $data['data_rak_buku'] = $this->m_perpustakaan->get_all_data_rak_buku('data_rak_buku');
        $this->load->view('perpustakaan/rak_buku/rak_buku', $data);
    }

    public function tambah_rak_buku()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'rak',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'rak_buku'
        ];
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
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'rak',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'rak_buku'
        ];
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
    public function tambah_anggota()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'anggota',
            'submenu'=>'',
            'menu_submenu_admin'=>'data_anggota',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'daftar_anggota'
        ];
        $this->load->view('perpustakaan/anggota/tambah_anggota');
    }

    public function kartu_anggota($id_anggota)
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'anggota',
            'submenu'=>'anggota',
            'menu_submenu_admin'=>'data_anggota',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'daftar_anggota'
        ];
        $data['anggota']=$this->m_perpustakaan->get_anggotaById('tabel_anggota', $id_anggota)->result();
        $this->load->view('perpustakaan/anggota/kartu_anggota', $data);
    }

    public function data_anggota()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'anggota',
            'submenu'=>'anggota',
            'menu_submenu_admin'=>'data_anggota',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'daftar_anggota'
        ];
        $data['data_anggota'] = $this->m_perpustakaan->get_anggota('data_anggota');
        $this->load->view('perpustakaan/anggota/data_anggota', $data);
    }

    public function form_anggota()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'anggota',
            'submenu'=>'form_anggota',
            'menu_submenu_admin'=>'data_anggota',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'form_anggota'
        ];
        $this->load->model('m_akademik');
        $data['siswa'] = $this->m_akademik->get_siswa('siswa');
        $this->load->view('perpustakaan/anggota/form_anggota', $data);
    }

    public function acak_anggota($long)
	{
		$char = '1234567890';
		$string = '';
		for ($i=0; $i < $long; $i++) { 			
			$pos = rand(0, strlen($char)-1);
			$string .= $char[$pos];
		}
		return $string;
	}

    public function aksi_tambah_anggota()
    {
        $data = array
        (
            'id_anggota' => $this->acak_anggota(5),
            'id_siswa' => $this->input->post('id_siswa'),
            'status' => '1',
        );
        $this->m_perpustakaan->aksi_tambah_anggota('tabel_anggota', $data);
        redirect(base_url('Perpustakaan/data_anggota'));
    }

    public function edit_anggota($id_anggota)
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'anggota',
            'submenu'=>'anggota'
        ];
        $data['data_anggota']=$this->m_perpustakaan->edit_anggota('tabel_anggota', $id_anggota)->result();
        $this->load->view('perpustakaan/data_anggota/edit_anggota', $data);
    }

    public function hapus_anggota($id_anggota)
    {
        $hapus=$this->m_perpustakaan->hapus_kategori('tabel_anggota', 'id_anggota', $id_anggota);
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
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'kategori',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'kategori_buku'
        ];
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
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'kategori',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'kategori_buku'
        ];
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
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'buku',
            'submenu'=>'buku',
            'menu_submenu_admin'=>'data_buku',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'buku'
        ];
        $this->load->model('M_perpustakaan');
        $data['data_buku'] = $this->m_perpustakaan->get_all_data_buku('data_buku');
        $this->load->view('perpustakaan/data_buku/data_buku', $data);
    }

    public function tambah_buku()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'buku',
            'submenu'=>'form_buku',
            'menu_submenu_admin'=>'data_buku',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'form_buku'
        ];
        $kategori['data_kategori_buku'] = $this->m_perpustakaan->get_all_data_kategori_buku('data_kategori_buku');
        $rak_buku['data_rak_buku'] = $this->m_perpustakaan->get_all_data_rak_buku('data_rak_buku');
        $data['data_buku'] = $this->m_perpustakaan->get_all_data_buku('data_buku');
        $this->load->view('perpustakaan/data_buku/tambah_buku', $data + $kategori + $rak_buku);
    }

    public function detail_index_buku($id_buku)
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'buku',
            'submenu'=>'buku',
            'menu_submenu_admin'=>'data_buku',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'buku'
        ];
        require 'vendor/autoload.php';
        $data['buku']=$this->m_perpustakaan->get_bukuById('table_buku', $id_buku)->result();
        $detail_index_buku['stok']=$this->m_perpustakaan->get_all_detail_index_buku('table_detail_index_buku', $id_buku)->result();
        $this->load->view('perpustakaan/data_buku/detail_index_buku', $data + $detail_index_buku );
    }

    public function aksi_tambah_stok_buku()
    {
        $data = array
        (
            'id_detail_index_buku' => $this->input->post('id_detail_index_buku'),
            'id_buku' => $this->input->post('id_buku'),
            'status' => 'Di Rak Buku',
        );
        $masuk=$this->m_perpustakaan->tambah_stok_buku('table_detail_index_buku', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Perpustakaan/detail_index_buku/'.$this->input->post('id_buku')));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/detail_index_buku/'.$this->input->post('id_buku')));
        }
    }

    public function delete_detail_index_buku($id_stok)
    {
        $this->m_perpustakaan->delete_detail_index_buku('table_detail_index_buku', 'id_stok', $id_stok);
        redirect(base_url('Perpustakaan/data_buku/detail_index_buku'));
    }

    public function upload_img_buku($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/perpustakaan/buku/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '100000';
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

    public function aksi_tambah_buku()
    {
        $foto = $this->upload_img_buku('foto');
        if($foto[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload foto.');
            redirect(base_url('Perpustakaan/tambah_buku'));
        }
        else
        {
            $data = array
            (
                'foto' => $foto[1],
                'judul_buku' => $this->input->post('judul_buku'),
                'penerbit_buku' => $this->input->post('penerbit_buku'),
                'penulis_buku' => $this->input->post('penulis_buku'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'keterangan' => $this->input->post('keterangan'),
                'sumber' => $this->input->post('sumber'),
                'kategori_id' => $this->input->post('kategori_id'),
                'rak_buku_id' => $this->input->post('rak_buku_id'),
                'stok' => $this->input->post('stok'),
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
    }
    public function edit_buku($id_buku)
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'buku',
            'submenu'=>'buku',
            'menu_submenu_admin'=>'data_buku',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'buku'
        ];
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
   
// Peminjaman Buku
    public function peminjaman()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'peminjaman',
            'submenu'=>'pinjam',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'pinjam'
        ];
        $peminjam['data_peminjam'] = $this->m_perpustakaan->get_buku_dipinjam('data_peminjam');
        $this->load->view('perpustakaan/peminjaman/peminjaman', $peminjam + $data);
    }

    public function get_index_buku_by_id_buku()
    {
        $id_buku = $this->input->post('id_buku',TRUE);
        $data = $this->m_perpustakaan->get_index_buku_by_id_buku($id_buku)->result();
        echo json_encode($data);
    }
    
    public function input_peminjaman()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'peminjaman',
            'submenu'=>'pinjam',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'pinjam'
        ];
        $buku['data_buku'] = $this->m_perpustakaan->get_all_data_buku('data_buku');
        $buku['index_buku'] = $this->m_perpustakaan->get_index_buku('index_buku');
        $anggota['data_anggota'] = $this->m_perpustakaan->get_anggota('data_anggota');
        $this->load->view('perpustakaan/peminjaman/input_peminjaman', $buku + $anggota + $data);
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

    public function aksi_input_peminjaman()
    {
        $date = date('Y-m-d');
        $data = array
        (
            'no_pinjaman' => 'PMJ'.'-'.$this->acak(6),
            'id_anggota' => $this->input->post('id_anggota'),
            'id_index_buku' => $this->input->post('id_index_buku'),
            'tgl_pinjaman' => $date,
            'tgl_kembali' => "0000-00-00",
            'status' => 'DIPINJAM',
        );

        $status = array
        (
            'status' => 'Di Pinjam',
        );

        $stok = array
        (
            'id_buku' => $this->input->post('id_buku_pinjam'),
        );
        
        $kurangi_stok=$this->m_perpustakaan->tambah_pinjaman('pinjam', $stok);
        $set_status=$this->m_perpustakaan->ubah_pinjaman('table_detail_index_buku', $status, array('id_stok'=>$this->input->post('id_index_buku')));
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
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'peminjaman',
            'submenu'=>'pinjam',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'pinjam'
        ];
        $peminjam['data_peminjam']=$this->m_perpustakaan->edit_pinjaman('tabel_pinjaman', $id_pinjaman)->result();
        $this->load->view('perpustakaan/peminjaman/detail_peminjaman', $peminjam + $data);
    }

    public function hapus_peminjaman_id($id_pinjaman)
    {
        $hapus=$this->m_perpustakaan->hapus_pinjaman('tabel_pinjaman', 'id_pinjaman', $id_pinjaman);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Perpustakaan/peminjaman'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Perpustakaan/peminjaman'));
        }

    }
    
// Pengembalian Buku
    public function pengembalian()
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'pengembalian',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'pengembalian'
        ];
        $peminjam['data_peminjam'] = $this->m_perpustakaan->get_buku_dipinjam('data_peminjam');
        $this->load->view('perpustakaan/pengembalian/pengembalian', $peminjam + $data);
    }

    public function proses_peminjam_id($id_pinjaman)
    {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'pengembalian',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'pengembalian'
        ];
        $peminjam['data_pinjaman']=$this->m_perpustakaan->edit_pinjaman('tabel_pinjaman', $id_pinjaman)->result();
        $this->load->view('perpustakaan/pengembalian/proses_pengembalian', $peminjam + $data);
    }

    public function proses_pengembalian_pinjaman()
    {
        $date = date('Y-m-d');
        $db = $this->db->get('setting_perpustakaan')->result();
        foreach ($db as $dnd) {
			$denda = $dnd->denda;
			$maksimal_pengembalian_hari = $dnd->maksimal_pengembalian_hari;
		}

        $dt = date('Y-m-d');
		$tgl_pinjaman = strtotime($this->input->post('tgl_pinjaman'));
		$t = date('Y-m-d', $tgl_pinjaman);

        $selisih=(strtotime($dt)-$tgl_pinjaman)/(60*60*24);

        if ($selisih > $maksimal_pengembalian_hari) {
			$hitung = $selisih - $maksimal_pengembalian_hari;
			$byr = $hitung * $denda;
		}else{
			$byr = 0;
		}
        $data = array (
            'tgl_kembali' => $date,
            'denda' => $byr,
            'status' => 'DIKEMBALIKAN',
        );
        $status = array
        (
            'status' => 'Di Rak Buku',
        );

        $stok = array
        (
            'id_buku' => $this->input->post('id_buku_pinjam'),
        );
        
        $tambah_stok=$this->m_perpustakaan->tambah_pinjaman('kembalikan', $stok);
        $set_status=$this->m_perpustakaan->ubah_pinjaman('table_detail_index_buku', $status, array('id_stok'=>$this->input->post('id_index_buku')));
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
 public function laporan_peminjaman() 
 { 
    $data = [
    'judul' => 'perpus',
    'page' => 'perpus',
    'menu' => 'laporan',
    'submenu'=>'peminjaman',
    'menu_submenu_admin'=>'laporan',
    'menu_admin' => 'perpustakaan',
    'submenu_admin'=> 'laporan_peminjaman'
    ];
    $peminjam['peminjam'] = $this->m_perpustakaan->get_laporan_pinjam('data_peminjam');
    $this->load->view('perpustakaan/laporan/laporan_peminjaman', $peminjam + $data);
  }
  public function filter_tanggalpinjam()
     {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'laporan',
            'submenu'=>'peminjaman',
            'menu_submenu_admin'=>'laporan',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'laporan_peminjaman'
            ];
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $peminjam = $this->input->post('peminjam');

        if($peminjam = 1) {
            $data['peminjam'] = $this->m_perpustakaan->filter_bytanggalpinjam($tanggalawal,$tanggalakhir);
            $this->load->view('perpustakaan/laporan/laporan_peminjaman', $data);
        }
     }

  public function laporan_pengembalian() 
  {
    $data = [
        'judul' => 'perpus',
        'page' => 'perpus',
        'menu' => 'laporan',
        'submenu'=>'pengembalian',
        'menu_submenu_admin'=>'laporan',
        'menu_admin' => 'perpustakaan',
        'submenu_admin'=> 'laporan_pengembalian'
        ];
    $peminjam['peminjam'] = $this->m_perpustakaan->get_laporan_kembali('data_peminjam');
    $this->load->view('perpustakaan/laporan/laporan_pengembalian', $peminjam + $data);
  }
  public function filter_tanggalkembali()
     {
        $data = [
            'judul' => 'perpus',
            'page' => 'perpus',
            'menu' => 'laporan',
            'submenu'=>'pengembalian',
            'menu_submenu_admin'=>'laporan',
            'menu_admin' => 'perpustakaan',
            'submenu_admin'=> 'laporan_pengembalian'
            ];
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $peminjam = $this->input->post('peminjam');

        if($peminjam = 1) {
            $data['peminjam'] = $this->m_perpustakaan->filter_bytanggalkembali($tanggalawal,$tanggalakhir);
            $this->load->view('perpustakaan/laporan/laporan_pengembalian', $data);
        }
     }
    
   
}