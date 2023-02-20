<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemilik');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_pemilik')!='login') {
            redirect(base_url('Login'));
        }
    }
    public function index()
    {
        $data['total_paket_wedding'] = $this->M_pemilik->paket_wedding_total_rows();
        $data['total_konsumen'] = $this->M_pemilik->konsumen_total_rows();
        $data['total_pesanan'] = $this->M_pemilik->pesanan_total_rows();
        $data['total_pembayaran_dp'] = $this->M_pemilik->pembayaran_dp_total_rows();
        $data['total_pembayaran_pelunasan'] = $this->M_pemilik->pembayaran_pelunasan_total_rows();
        $data['total_pembayaran_lunas'] = $this->M_pemilik->pembayaran_lunas_total_rows();
        $this->load->view('pemilik/dashboard', $data);
    }

//============================================================================================================

    public function paket_wedding()
    {
        $this->load->model('M_pemilik');
        $data['data_paket_wedding'] = $this->M_pemilik->get_all_data_paket_wedding('data_paket_wedding');
        $this->load->view('pemilik/paket_wedding/data_paket_wedding', $data);
    }

    public function tambah_paket_wedding()
    {
        $data['data_paket_wedding'] = $this->M_pemilik->get_all_data_paket_wedding('data_paket_wedding');
        $this->load->view('pemilik/paket_wedding/tambah_paket_wedding', $data);
    }

    public function aksi_tambah_paket_wedding()
    {
        $gambar_pw = $this->upload_img_paket_wedding('gambar_pw');
        if($gambar_pw[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload foto.');
            redirect(base_url('Admin/tambah_paket_wedding'));
        }
        else
        {
            $data = array
            (
                'gambar_pw' => $gambar_pw[1],
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
                'del_flag' => '1',
            );
            $masuk=$this->M_pemilik->tambah('tabel_paket_wedding', $data);
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

    public function edit_paket_wedding($id_paket_wedding)
    {
        $data['paket_wedding']=$this->M_pemilik->edit_paket_wedding('tabel_paket_wedding', $id_paket_wedding)->result();
        $this->load->view('pemilik/paket_wedding/edit_paket_wedding', $data);

    }

    public function update_paket_wedding()
    {
        $data = array (
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
            'del_flag' => '1',
        );
        $masuk=$this->M_pemilik->ubah('tabel_paket_wedding', $data, array('id_paket_wedding'=>$this->input->post('id_paket_wedding')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Admin/paket_wedding'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/edit_paket_wedding/'.$this->input->post('id_paket_wedding')));
        }
    }
    public function hapus_paket_wedding($id_paket_wedding)
    {
        $hapus=$this->M_pemilik->hapus('tabel_paket_wedding', 'id_paket_wedding', $id_paket_wedding);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Admin/paket_wedding'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/paket_wedding'));
        }

    }

//==================================================================================================================

    public function konsumen()
    {
        $this->load->model('M_pemilik');
        $data['data_konsumen'] = $this->M_pemilik->get_all_data_konsumen('konsumen');
        $this->load->view('pemilik/konsumen/data_konsumen', $data);
    }

    public function tambah_konsumen()
    {
        $data['data_konsumen'] = $this->M_pemilik->get_all_data_konsumen();
        $this->load->view('pemilik/konsumen/tambah_konsumen', $data);
    }

    public function aksi_tambah_konsumen()
    {
        $data = array
        (
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'level' => '2',
            'del_flag' => '1',
        );
        $masuk=$this->M_pemilik->tambah('tabel_admin', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Admin/konsumen'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/tambah_konsumen'));
        }
    }

    public function edit_konsumen($id_admin)
    {
        $data['data_konsumen']=$this->M_pemilik->edit_konsumen('tabel_admin', $id_admin)->result();
        $this->load->view('pemilik/konsumen/edit_konsumen', $data);
    }

    public function update_konsumen()
    {
        $data = array (
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'level' => '2',
            'del_flag' => '1',
        );
        $masuk=$this->M_pemilik->ubah('tabel_admin', $data, array('id_admin'=>$this->input->post('id_admin')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Admin/konsumen'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/edit_konsumen/'.$this->input->post('id_admin')));
        }
    }

    public function update_konsumen_password()
    {
        $data = array (
            'password' => md5($this->input->post('password')),
            'level' => '2',
            'del_flag' => '1',
        );
        $masuk=$this->M_pemilik->ubah('tabel_admin', $data, array('id_admin'=>$this->input->post('id_admin')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Admin/konsumen'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/edit_konsumen/'.$this->input->post('id_admin')));
        }
    }

    public function hapus_konsumen($id_admin)
    {
        $hapus=$this->M_pemilik->hapus('tabel_admin', 'id_admin', $id_admin);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Admin/konsumen'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Admin/konsumen'));
        }

    }

//=============================================================================================================


    public function petugas()
    {
        $this->load->model('M_pemilik');
        $data['data_petugas'] = $this->M_pemilik->get_all_data_petugas('petugas');
        $this->load->view('pemilik/petugas/data_petugas', $data);
    }

    public function tambah_petugas()
    {
        $data['data_petugas'] = $this->M_pemilik->get_all_data_petugas();
        $this->load->view('pemilik/petugas/tambah_petugas', $data);
    }

    public function aksi_tambah_petugas()
    {
        $data = array
        (
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'level' => '1',
            'del_flag' => '1',
        );
        $masuk=$this->M_pemilik->tambah('tabel_admin', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Pemilik/petugas'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Pemilik/tambah_petugas'));
        }
    }

    public function edit_petugas($id_admin)
    {
        $data['data_petugas']=$this->M_pemilik->edit_petugas('tabel_admin', $id_admin)->result();
        $this->load->view('pemilik/petugas/edit_petugas', $data);
    }

    public function update_petugas()
    {
        $data = array (
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'level' => '1',
            'del_flag' => '1',
        );
        $masuk=$this->M_pemilik->ubah('tabel_admin', $data, array('id_admin'=>$this->input->post('id_admin')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Pemilik/petugas'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Pemilik/edit_petugas/'.$this->input->post('id_admin')));
        }
    }

    public function update_petugas_password()
    {
        $data = array (
            'password' => md5($this->input->post('password')),
            'level' => '1',
            'del_flag' => '1',
        );
        $masuk=$this->M_pemilik->ubah('tabel_admin', $data, array('id_admin'=>$this->input->post('id_admin')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Pemilik/petugas'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Pemilik/edit_petugas/'.$this->input->post('id_admin')));
        }
    }

    public function hapus_petugas($id_admin)
    {
        $hapus=$this->M_pemilik->hapus('tabel_admin', 'id_admin', $id_admin);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Pemilik/petugas'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Pemilik/petugas'));
        }

    }

//=================================================================================================================

    public function data_pesanan()
    {
        $this->load->model('M_pemilik');
        $data['data_pesanan'] = $this->M_pemilik->get_all_data_pesanan('data_pesanan');
        $this->load->view('pemilik/pesanan/data_pesanan', $data);
    }

//====================================================================================================================

    public function pembayaran_belum_dp()
    {
        $this->load->model('M_pemilik');
        $data['data_pembayaran'] = $this->M_pemilik->get_all_data_pembayaran_belum_dp('data_pembayaran');
        $this->load->view('pemilik/pembayaran/data_pembayaran_dp', $data);
    }

    public function pembayaran_belum_pelunasan()
    {
        $this->load->model('M_pemilik');
        $data['data_pembayaran'] = $this->M_pemilik->get_all_data_pembayaran_belum_pelunasan('data_pembayaran');
        $this->load->view('pemilik/pembayaran/data_pembayaran_pelunasan', $data);
    }

    public function pembayaran_lunas()
    {
        $this->load->model('M_pemilik');
        $data['data_pembayaran'] = $this->M_pemilik->get_all_data_pembayaran_lunas('data_pembayaran');
        $this->load->view('pemilik/pembayaran/data_pembayaran_lunas', $data);
    }

    public function konfirmasi_dp($id_admin)
    {
        $data = array('status_pembayaran_dp' => '2' );
        $hapus=$this->M_pemilik->ubah('tabel_admin', $data, array('id_admin'=>$id_admin));
        if($hapus)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil Konfirmasi DP.</div>');
            redirect(base_url('Admin/pembayaran_belum_dp'));
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">Gagal Konfirmasi DP.</div>');
            redirect(base_url('Admin/pembayaran_belum_dp'));
        }
    }

    public function konfirmasi_pelunasan($id_admin)
    {
        $data = array('status_pembayaran_pelunasan' => '2' );
        $hapus=$this->M_pemilik->ubah('tabel_admin', $data, array('id_admin'=>$id_admin));
        if($hapus)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil Konfirmasi Pelunasan.</div>');
            redirect(base_url('Admin/pembayaran_belum_pelunasan'));
        }
        else
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">Gagal Konfirmasi Pelunasan.</div>');
            redirect(base_url('Admin/pembayaran_belum_pelunasan'));
        }
    }

//==================================================================================================================

    public function menu_paket()
    {
        $this->load->model('M_pemilik');
        $data['menu_paket'] = $this->M_pemilik->get_all_data_menu_paket('menu_paket');
        $this->load->view('pemilik/menu_paket/data_menu_paket', $data);
    }

    public function edit_menu_paket($id_menu_paket)
    {
        $data['menu_paket']=$this->M_pemilik->edit_menu_paket('menu_paket', $id_menu_paket)->result();
        $this->load->view('pemilik/menu_paket/edit_menu_paket', $data);

    }

    public function update_menu_paket()
    {
        $data = array (
            'paket1' => $this->input->post('paket1'),
            'paket2' => $this->input->post('paket2'),
            'paket3' => $this->input->post('paket3'),
            'paket4' => $this->input->post('paket4'),
        );
        $masuk=$this->M_pemilik->ubah('menu_paket', $data, array('id_menu_paket'=>$this->input->post('id_menu_paket')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Pemilik/menu_paket'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Pemilik/edit_menu_paket/'.$this->input->post('id_menu_paket')));
        }
    }

//=================================================================================================================

    public function menu_foto()
    {
        $this->load->model('M_pemilik');
        $data['menu_foto'] = $this->M_pemilik->get_all_data_menu_foto('menu_foto');
        $this->load->view('pemilik/menu_foto/data_menu_foto', $data);
    }

    public function edit_menu_foto1($id_foto)
    {
        $data['menu_foto']=$this->M_pemilik->edit_menu_foto('foto', $id_foto)->result();
        $this->load->view('pemilik/menu_foto/edit_menu_foto1', $data);
    }

    public function edit_menu_foto2($id_foto)
    {
        $data['menu_foto']=$this->M_pemilik->edit_menu_foto('foto', $id_foto)->result();
        $this->load->view('pemilik/menu_foto/edit_menu_foto2', $data);
    }

    public function edit_menu_foto3($id_foto)
    {
        $data['menu_foto']=$this->M_pemilik->edit_menu_foto('foto', $id_foto)->result();
        $this->load->view('pemilik/menu_foto/edit_menu_foto3', $data);
    }

    public function update_menu_foto1()
    {
        $foto1 = $this->upload_img_foto_frontend('foto1');
        if($foto1[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload foto.');
            redirect(base_url('Pemilik/edit_menu_foto1'.'/'.$this->input->post('id_foto')));
        }
        else
        {
            $data = array (
                'foto1' => $foto1[1],
            );
            $masuk=$this->M_pemilik->ubah('foto', $data, array('id_foto'=>$this->input->post('id_foto')));
            if($masuk)
            {
                $file =$this->input->post('foto1_lama');
                unlink('./uploads/admin/foto_frontend/'.$file);
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Pemilik/menu_foto'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Pemilik/edit_menu_foto1/'.$this->input->post('id_foto')));
            }
        }
    }

    public function update_menu_foto2()
    {
        $foto2 = $this->upload_img_foto_frontend('foto2');
        if($foto2[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload foto.');
            redirect(base_url('Pemilik/edit_menu_foto2'.'/'.$this->input->post('id_foto')));
        }
        else
        {
            $data = array (
                'foto2' => $foto2[1],
            );
            $masuk=$this->M_pemilik->ubah('foto', $data, array('id_foto'=>$this->input->post('id_foto')));
            if($masuk)
            {
                $file =$this->input->post('foto2_lama');
                unlink('./uploads/admin/foto_frontend/'.$file);
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Pemilik/menu_foto'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Pemilik/edit_menu_foto2/'.$this->input->post('id_foto')));
            }
        }
    }

    public function update_menu_foto3()
    {
        $foto3 = $this->upload_img_foto_frontend('foto3');
        if($foto3[0]==false)
        {
            //$this->upload->display_errors();
            $this->session->set_flashdata('error', 'gagal upload foto.');
            redirect(base_url('Pemilik/edit_menu_foto3'.'/'.$this->input->post('id_foto')));
        }
        else
        {
            $data = array (
                'foto3' => $foto3[1],
            );
            $masuk=$this->M_pemilik->ubah('foto', $data, array('id_foto'=>$this->input->post('id_foto')));
            if($masuk)
            {
                $file =$this->input->post('foto3_lama');
                unlink('./uploads/admin/foto_frontend/'.$file);
                $this->session->set_flashdata('sukses', 'berhasil');
                redirect(base_url('Pemilik/menu_foto'));
            }
            else
            {
                $this->session->set_flashdata('error', 'gagal..');
                redirect(base_url('Pemilik/edit_menu_foto3/'.$this->input->post('id_foto')));
            }
        }
    }


//==================================================================================================================

    public function data_laporan_pesanan()
    {
        $this->load->model('M_pemilik');
        $data['data_pesanan'] = $this->M_pemilik->get_all_data_pesanan('data_pesanan');
        $this->load->view('pemilik/laporan/data_laporan_pesanan', $data);
    }

    public function data_laporan_pembayaran()
    {
        $this->load->model('M_pemilik');
        $data['data_pembayaran'] = $this->M_pemilik->get_all_data_pembayaran_lunas('data_pembayaran');
        $this->load->view('pemilik/laporan/data_laporan_pembayaran', $data);
    }

    public function export_laporan_pesanan(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcell.php';
        
        // Panggil class PHPExcel nya
        $csv = new PHPExcel();
        // Settingan awal fil excel
        
        // Buat header tabel nya pada baris ke 1
        $csv->setActiveSheetIndex(0)->setCellValue("A1", "NO"); 
        $csv->setActiveSheetIndex(0)->setCellValue("B1", "Nama Pemesan"); 
        $csv->setActiveSheetIndex(0)->setCellValue('C1', "Paket"); 
        $csv->setActiveSheetIndex(0)->setCellValue('D1', "Tanggal Pesan"); 
        $csv->setActiveSheetIndex(0)->setCellValue('E1', "Tanggal Acara");
        $csv->setActiveSheetIndex(0)->setCellValue('F1', "Alamat");
        // Panggil function view yang ada di Admin untuk menampilkan semua data pesanan
        $pesanan = $this->M_pemilik->view_pesanan();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
        foreach($pesanan as $data){ // Lakukan looping pada variabel siswa
          $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_pemesan);
          $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->judul_pw);
          $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tanggal_pesanan);
          $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tanggal_acara);
          $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->alamat_pemesan);
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set orientasi kertas jadi LANDSCAPE
        $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $csv->getActiveSheet(0)->setTitle("Data Pesanan");
        $csv->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Pesanan.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
    //    $write = new PHPExcel_Writer_CSV($csv); kene kesalahane
        $write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
        $write->save('php://output');
    }

    public function export_laporan_pembayaran(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcell.php';
        
        // Panggil class PHPExcel nya
        $csv = new PHPExcel();
        // Settingan awal fil excel
        
        // Buat header tabel nya pada baris ke 1
        $csv->setActiveSheetIndex(0)->setCellValue("A1", "NO"); 
        $csv->setActiveSheetIndex(0)->setCellValue("B1", "Nama Pemesan"); 
        $csv->setActiveSheetIndex(0)->setCellValue('C1', "No Invoice DP");
        $csv->setActiveSheetIndex(0)->setCellValue('D1', "No Invoice Pelunasan"); 
        $csv->setActiveSheetIndex(0)->setCellValue('E1', "Paket"); 
        $csv->setActiveSheetIndex(0)->setCellValue('F1', "Bayar Dp");
        $csv->setActiveSheetIndex(0)->setCellValue('G1', "Bayar Pelunasan");
        // Panggil function view yang ada di Admin untuk menampilkan semua data pesanan
        $pembayaran = $this->M_pemilik->view_pembayaran();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
        foreach($pembayaran as $data){ // Lakukan looping pada variabel siswa
          $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_pemesan);
          $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->no_invoice_dp);
          $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->no_invoice_pelunasan);
          $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->judul_pw);
          $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->bayar_dp);
          $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->bayar_pelunasan);
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set orientasi kertas jadi LANDSCAPE
        $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $csv->getActiveSheet(0)->setTitle("Data Pesanan");
        $csv->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Pembayaran.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
    //    $write = new PHPExcel_Writer_CSV($csv); kene kesalahane
        $write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
        $write->save('php://output');
    }
    


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
    public function upload_img_paket_wedding($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/admin/paket_wedding/';
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

    public function upload_img_foto_frontend($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/admin/foto_frontend/';
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

    public function upload_img_profil($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/admin/profil/';
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
