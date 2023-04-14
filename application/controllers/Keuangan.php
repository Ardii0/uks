<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_keuangan');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        if ($this->session->userdata('status_keuangan')!='login') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'dashboard',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'keuangan'
        ];
        $data['total_akun'] = $this->m_keuangan->total_akun();
        $data['total_jenis_trans'] = $this->m_keuangan->total_jenis_trans();
        $data['total_anggaran'] = $this->m_keuangan->total_anggaran();
        $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
        $data['pembayaran'] = $this->m_keuangan->totalbayar(date('y-m-d'))->result();
        $this->load->view('keuangan/dashboard', $data);

    }

// Anggaran
    public function anggaran()
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'anggaran',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'anggaran'
        ];
        $this->load->model('M_keuangan');
        $data['data_rencana_anggaran'] = $this->m_keuangan->get_all_data_rencana_anggaran('data_rencana_anggaran');
        $data['data_jenis_transaksi'] = $this->m_keuangan->get_all_data_jenis_transaksi('data_jenis_transaksi');
        $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
        $data['data_rn'] = $this->m_keuangan->get_rnperid('tabel_rencana_anggaran', 1)->result();

        $this->session->set_userdata('id_rn', 1);
        $data['masuk'] = $this->m_keuangan->get_detail_rn('m', 1)->result();
        $data['keluar'] = $this->m_keuangan->get_detail_rn('k', 1)->result();

        
        $this->load->view('keuangan/anggaran/anggaran', $data);
    }

    public function tambah_anggaran()
    {
        $data['data_rencana_anggaran'] = $this->m_keuangan->get_all_data_rencana_anggaran('data_rencana_anggaran');
        $this->load->view('keuangan/anggaran/tambah_anggaran', $data);
    }

    public function aksi_tambah_rencana_anggaran()
    {
        $data = array
        (
            'nama_anggaran' => $this->input->post('nama_anggaran'),
            'awal_periode' => $this->input->post('awal_periode'),
            'akhir_periode' => $this->input->post('akhir_periode'),
            'pencatat' => $this->input->post('pencatat'),
            'status' => 1,
            'tetapkan' => 0,
        );
        $masuk = $this->m_keuangan->tambah_anggaran('tabel_rencana_anggaran', $data);
        if ($masuk) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/tambah_anggaran'));
        }
    }

    public function hapus_rn($id_rencana_anggaran)
    {
        $hapus=$this->m_keuangan->hapus_rn('tabel_rencana_anggaran', 'id_rencana_anggaran', $id_rencana_anggaran);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/tambah_anggaran'));
        }
    }

    public function edit_anggaran($id)
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'anggaran',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'anggaran'
        ];
        $data['data_rencana_anggaran']=$this->m_keuangan->edit_anggaran('tabel_rencana_anggaran', $id)->result();
        $this->load->view('keuangan/anggaran/edit_anggaran', $data);
    }

    public function aksi_edit_rencana_anggaran()
    {
        $data = array
        (
            'nama_anggaran' => $this->input->post('nama_anggaran'),
            'awal_periode' => $this->input->post('awal_periode'),
            'akhir_periode' => $this->input->post('akhir_periode'),
            'pencatat' => $this->input->post('pencatat'),
            'status' => 1,
            'tetapkan' => 0,
        );
        $masuk=$this->m_keuangan->edit_anggaran('tabel_rencana_anggaran', $data, array('id_rencana_anggaran'=>$this->input->post('id_rencana_anggaran')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/edit_anggaran'.$this->input->post('id')));
        }
    }

    public function hapus_jt($id_jt)
    {
        $hapus=$this->m_keuangan->hapus_rn('tabel_jenis_transaksi', 'id', $id_jt);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/tambah_anggaran'));
        }
    }

 //Tambah Anggaran
    public function aksi_tambah_anggaran()
    {
        $data = array
        (
            'nama_jenis_transaksi' => $this->input->post('nama_jenis_transaksi'),
            'rencana_anggaran' => $this->input->post('id_rencana_anggaran'),
            'status' => 1,
            'jenis_transaksi' => $this->input->post('jenis_transaksi'),
            'nominal' => $this->input->post('nominal'),
            'debit' => $this->input->post('debit'),
            'kredit' => $this->input->post('kredit'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $masuk = $this->m_keuangan->tambah_anggaran('tabel_jenis_transaksi', $data);
        if ($masuk) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/anggaran'));
        }
    }

    public function aksi_edit_anggaran()
    {
        $data = array
        (
            'nama_jenis_transaksi' => $this->input->post('nama_jenis_transaksi'),
            'rencana_anggaran' => $this->input->post('id_rencana_anggaran'),
            'status' => 1,
            'jenis_transaksi' => $this->input->post('jenis_transaksi'),
            'nominal' => $this->input->post('nominal'),
            'debit' => $this->input->post('debit'),
            'kredit' => $this->input->post('kredit'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $masuk=$this->m_keuangan->edit_anggaran('tabel_jenis_transaksi', $data, array('id'=>$this->input->post('id')));
        if ($masuk) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/anggaran'));
        }
    }

    public function anggaran_filter()
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'anggaran',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'anggaran'
        ];
        $id_rn = $this->input->post('id_rencana_anggaran');
        $this->load->model('M_keuangan');
        $data['data_rencana_anggaran'] = $this->m_keuangan->get_all_data_rencana_anggaran('data_rencana_anggaran');
        
        $data['data_rn'] = $this->m_keuangan->get_rnperid('tabel_rencana_anggaran', $id_rn)->result();

        $data['data_jenis_transaksi'] = $this->m_keuangan->get_rnperperiode('tabel_jenis_transaksi', $id_rn)->result();

        $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
        $this->session->set_userdata('id_rn', $id_rn);

        $data['masuk'] = $this->m_keuangan->get_detail_rn('m', $id_rn)->result();
        $data['keluar'] = $this->m_keuangan->get_detail_rn('k', $id_rn)->result();
        
        $this->load->view('keuangan/anggaran/anggaran', $data);
    }

    public function aksi_tetapkan($id)
    {
        $data= array
        (
            "tetapkan" => 1,
        );

        $approve_siswa=$this->m_keuangan->edit_jenis_transaksi('tabel_rencana_anggaran', $data, array('id_rencana_anggaran'=>$id));
        if($approve_siswa)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/anggaran'));
        }
    }

// Akun
    public function akun()
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'akun',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'akun'
        ];
        $this->load->model('M_keuangan');
        $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
        $this->load->view('keuangan/akun/akun', $data);
    }

    public function aksi_tambah_akun()
    {
        $data = array
        (
            'nama_akun' => $this->input->post('nama_akun'),
            'jenis_akun' => $this->input->post('jenis_akun'),
            'status' => 1,
        );

        $masuk=$this->m_keuangan->tambah_akun('tabel_akun', $data);
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/akun/akun'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/akun/akun'));
        }
    }

    public function edit_akun($id_akun)
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'akun',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'akun'
        ];
        $data['data_akun']=$this->m_keuangan->edit_akun('tabel_akun', $id_akun)->result();
        $this->load->view('keuangan/akun/edit_akun', $data);
    }

    public function aksi_edit_akun()
    {
        $data = array
        (
            'nama_akun' => $this->input->post('nama_akun'),
            'jenis_akun' => $this->input->post('jenis_akun'),
        );

        $masuk=$this->m_keuangan->ubah_akun('tabel_akun', $data, array('id_akun'=>$this->input->post('id_akun')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/akun/akun'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/akun/edit_akun'.$this->input->post('id_akun')));
        }
    }

    public function hapus_akun($id_akun)
    {
        $hapus=$this->m_keuangan->hapus_akun('tabel_akun', 'id_akun', $id_akun);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Keuangan/akun'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Keuangan/akun'));
        }
    }


// Dana
    public function dana()
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'dana',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'dana'
        ];
        $this->load->model('M_keuangan');
        $pendapatan['data_pendapatan'] = $this->m_keuangan->get_pendapatan('data_pendapatan');
        $data['data_transaksi'] = $this->m_keuangan->get_data_transaksi('data_transaksi');
        $pengeluaran['data_pengeluaran'] = $this->m_keuangan->get_pengeluaran('data_pengeluaran');
        $this->load->view('keuangan/dana/dana', $pendapatan + $data + $pengeluaran);
    }

    public function input_dana($id)
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'dana',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'dana'
        ];
        $pendapatan['data_pendapatan'] = $this->m_keuangan->get_pendapatan('data_pendapatan');
        $pengeluaran['data_pengeluaran'] = $this->m_keuangan->get_pengeluaran('data_pengeluaran');
        $akun['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
        $data['data_transaksi'] = $this->m_keuangan->get_data_transaksi('data_transaksi');
        $data['dt'] = $this->m_keuangan->ambil('tabel_level',array('id_level'=>$this->session->userdata('id_level')))->row();
        $data['transaksi'] = $this->m_keuangan->transaksi('tabel_jenis_transaksi', $id)->result();
        $this->load->view('keuangan/dana/input_dana', $data + $pendapatan + $akun + $pengeluaran);
    }

    public function aksi_transaksi()
    {
        $jk = array(
			'id_anggaran' => $this->input->post('id_anggaran'),
            'uraian' => $this->input->post('uraian'),
            'pencatat' => $this->input->post('pencatat'),
            'id_akun' => $this->input->post('kredit'),
			'debet' => '0',
			'kredit' => $this->input->post('nominal')
		);
		$jd = array(
			'id_anggaran' => $this->input->post('id_anggaran'),
            'uraian' => $this->input->post('uraian'),
            'pencatat' => $this->input->post('pencatat'),
            'id_akun' => $this->input->post('debet'),
			'debet' => $this->input->post('nominal'),
			'kredit' => '0',
		);

        $logging=$this->m_keuangan->aksi_transaksi('tabel_transaksi', $jk);
        $logging=$this->m_keuangan->aksi_transaksi('tabel_transaksi', $jd);
        if($logging)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Keuangan/dana'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Keuangan/input_dana/'.$this->input->post('id_anggaran')));
        }
    }

    public function hapus_transaksi($id)
    {
        $hapus=$this->m_keuangan->hapus_transaksi('tabel_transaksi', 'id_transaksi', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Keuangan/dana'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Keuangan/dana'));
        }
    }

// Jurnal
    public function jurnal()
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'jurnal',
            'submenu'=>''
        ];
        $this->load->model('M_keuangan');
        $data['dt'] = $this->m_keuangan->ambil('tabel_level',array('id_level'=>$this->session->userdata('id_level')))->row();
        $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
        $data['data_transaksi'] = $this->m_keuangan->get_data_transaksi('data_transaksi');
        $data['data_anggaran'] = $this->m_keuangan->get_anggaran('data_anggaran');
        $this->load->view('keuangan/jurnal/jurnal', $data);
    }

    public function aksi_input_jurnal()
    {
        $data = array
        (
            'id_akun' => $this->input->post('id_akun'),
            'id_anggaran' => $this->input->post('id_anggaran'),
            'uraian' => $this->input->post('uraian'),
            'nominal' => $this->input->post('nominal'),
            'pencatat' => $this->input->post('pencatat'),
        );

        $logging=$this->m_keuangan->aksi_input_jurnal('tabel_transaksi', $data);
        if($logging)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('Keuangan/jurnal'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Keuangan/jurnal'));
        }
    }

    public function hapus_jurnal($id)
    {
        $hapus=$this->m_keuangan->hapus_jurnal('tabel_transaksi', 'id_transaksi', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('Keuangan/jurnal'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('Keuangan/jurnal'));
        }
    }

// Laporan
 //Laporan Jurnal Penyesuaian
   public function laporan_jurnalpenyesuaian()
   {
    $data = [
        'judul' => 'keuangan',
        'page' => 'keuangan',
        'menu' => 'laporan',
        'submenu'=>'penyesuaian',
        'menu_submenu_admin'=>'laporan_keuangan',
        'menu_admin' => 'keuangan',
        'submenu_admin'=> 'penyesuaian'
    ];
       $this->load->model('M_keuangan');
       $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
       $data['data_transaksi'] = $this->m_keuangan->get_data_transaksi('data_transaksi');
       $this->load->view('keuangan/laporan/laporan_jurnalpenyesuaian', $data);
   }
   public function filter_tanggal()
   {
    $data = [ 
        'judul' => 'keuangan',
        'page' => 'keuangan',
        'menu' => 'laporan',
        'submenu'=>'penyesuaian',
        'menu_submenu_admin'=>'laporan_keuangan',
        'menu_admin' => 'keuangan',
        'submenu_admin'=> 'penyesuaian'
    ];
      $tanggalawal = $this->input->post('tanggalawal');
      $tanggalakhir = $this->input->post('tanggalakhir');
      $lapjurnal = $this->input->post('lapjurnal');

      if($lapjurnal = 1) {
          $data['data_transaksi'] = $this->m_keuangan->filter_bytanggal($tanggalawal,$tanggalakhir);
          $this->load->view('Keuangan/laporan/laporan_jurnalpenyesuaian', $data);
      }
   }
 //Laporan Buku Besar
   public function laporan_bukubesar()
   {
    $data = [
        'judul' => 'keuangan',
        'page' => 'keuangan',
        'menu' => 'laporan',
        'submenu'=>'bukubesar',
        'menu_submenu_admin'=>'laporan_keuangan',
        'menu_admin' => 'keuangan',
        'submenu_admin'=> 'bukubesar'
    ];
       $this->load->model('M_keuangan');
       $data['datafilter'] = $this->m_keuangan->filter_namakun("nama_akun");
       $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
       $this->load->view('keuangan/laporan/laporan_bukubesar', $data);
   }
   function filter_namakun()
   {
    $data = [
        'judul' => 'keuangan',
        'page' => 'keuangan',
        'menu' => 'laporan',
        'submenu'=>'bukubesar',
        'menu_submenu_admin'=>'laporan_keuangan',
        'menu_admin' => 'keuangan',
        'submenu_admin'=> 'bukubesar'
    ];
        $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
        $nama_akun = $this->input->post('nama_akun');
        $nilaifilter = $this->input->post('nilaifilter');

        if($nilaifilter = 1) {
            $data['datafilter'] = $this->m_keuangan->filter_namakun($nama_akun);
            $data['nama_akun'] = $this->m_keuangan->akun('tabel_akun', $nama_akun)->result();
            
            $this->load->view('keuangan/laporan/filter_namakun', $data);
        }
    }
 //Laporan Neraca Lajur
   public function laporan_neracalajur()
   {
       $this->load->model('M_keuangan');
       $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
       $this->load->view('keuangan/laporan/laporan_neracalajur', $data);
   }

// Pembayaran
 // Pembayaran
    public function pembayaran()
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'pembayaran',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'pembayaran'
        ];
        $data['pembayaran'] = $this->m_keuangan->get_pembayaran();
        $this->load->view('keuangan/pembayaran/pembayaran', $data);
    }

    public function get_rombelByIdKelas(){
        $id_kelas = $this->input->post('id_kelas',TRUE);
        $data = $this->m_keuangan->get_rombelByIdKelas($id_kelas)->result();
        echo json_encode($data);
    }

    public function get_siswaByIdRombel(){
        $id_rombel = $this->input->post('id_rombel',TRUE);
        $data = $this->m_keuangan->get_siswaByIdRombel($id_rombel)->result();
        echo json_encode($data);
    }
    
    public function tambah_pembayaran()
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'pembayaran',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'pembayaran'
        ];
        $this->load->model('m_akademik');
        $data['kelas'] = $this->m_akademik->get_kelas();
        $data['rombel'] = $this->m_akademik->get_rombel();
        $data['siswa'] = $this->m_akademik->get_siswa();
        $this->load->view('keuangan/pembayaran/tambah_pembayaran', $data);
    }

    public function menambahkan_pembayaran($ids)
    {
        $array = array(
            'id_siswa' => $ids
        );
        $this->session->set_userdata($array);
        redirect('Keuangan/form_tambah_pembayaran');
    }

    public function direct(){
        $enc = $this->input->post('id_siswa');
        redirect('Keuangan/form_pembayaran_invoice/'.$enc);
    }

	public function rig($long)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0987654321';
		$string = '';
		for ($i=0; $i < $long; $i++) { 			
			$pos = rand(0, strlen($char)-1);
			$string .= $char[$pos];
		}
		return $string;
	}

    public function form_pembayaran_invoice($ids)
    {
        $data = [
            'judul'  => 'keuangan',
            'page'   => 'keuangan',
            'menu'   => 'pembayaran',
            'submenu'=> '',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'pembayaran'
        ];
        // if(!empty($this->session->userdata('id_siswa'))) {
        //    $ids = $this->session->userdata('id_siswa');
		//    $ids = base64_decode($this->uri->segment(3));
        
		   $data['rig'] = 'INV'.date('md').$this->rig(3).date('is');
           $data['dt'] = $this->m_keuangan->ambil('tabel_level',array('id_level'=>$this->session->userdata('id_level')))->row();
           $data['siswa'] = $this->m_keuangan->get_siswaById('tabel_siswa', $ids)->result();
           $data['jenjang'] = $this->m_keuangan->get_jenjangByIdSiswafromDaftar($ids);
           $data['jenisbayar'] = $this->m_keuangan->get_jenisbayar();
           $data['pembayaran'] = $this->m_keuangan->get_pembayaranByIdSiswa($ids);
           $data['content'] = 'keuangan/tambah_pembayaran';

           $this->load->view('keuangan/pembayaran/invoice/form_invoice', $data);
        // }else{
        //     redirect('/tambah_pembayaran');
        // }
    }

    public function form_tambah_pembayaran($idi)
    {
        $data = [
            'judul'  => 'keuangan',
            'page'   => 'keuangan',
            'menu'   => 'pembayaran',
            'submenu'=> '',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'pembayaran'
        ];
        // if(!empty($this->session->userdata('id_siswa'))) {
        //    $ids = $this->session->userdata('id_siswa');
		//    $ids = base64_decode($this->uri->segment(3));
        
           $data['dt'] = $this->m_keuangan->ambil('tabel_level',array('id_level'=>$this->session->userdata('id_level')))->row();
        //    $data['siswa'] = $this->m_keuangan->get_invoiceById($idi)->result();
           $data['idinvc'] = $this->m_keuangan->get_invoiceById($idi)->result();
           $data['invoice'] = $this->m_keuangan->get_pembayaranByIdInvoice($idi);
           $data['jenisbayar'] = $this->m_keuangan->get_jenisbayar();
           $data['content'] = 'keuangan/tambah_pembayaran';

           $this->load->view('keuangan/pembayaran/form_tambah_pembayaran', $data);
        // }else{
        //     redirect('/tambah_pembayaran');
        // }
    }

    public function aksi_tambah_invoice()
    {
        $data = [
            'id_invoice' => $this->input->post('id_invoice'),
            'id_siswa' => $this->input->post('id_siswa'),
            'date' => date('y-m-d'),
            'id_ta' => $this->input->post('id_ta'),
            'id_level' => $this->input->post('id_level'),
            'cek_p' => '1',
        ];
        $pembayaran = [
            'id_siswa' => $this->input->post('id_siswa'),
            'id_jenis' => $this->input->post('id_jenis'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan'),
            'id_ta' => $this->input->post('id_ta'),
            'id_tf' => 'TSK'.date('md').$this->rig(3).date('is'),
            'id_invoice' => $this->input->post('id_invoice'),
            'id_level' => $this->input->post('id_level'),
            'cek_p' => '1',
        ];
        $this->m_keuangan->tambah_pembayaran('tabel_invoice', $data);
        $this->m_keuangan->tambah_pembayaran('tabel_pembayaran', $pembayaran);
        redirect(base_url('Keuangan/form_tambah_pembayaran/'.$this->input->post('id_invoice')));
    }

    public function aksi_tambah_pembayaran()
    {
        $data = [
            'id_tf' => 'TSK'.date('md').$this->rig(3).date('is'),
            'id_siswa' => $this->input->post('id_siswa'),
            'id_jenis' => $this->input->post('id_jenis'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan'),
            'id_ta' => $this->input->post('id_ta'),
            'id_invoice' => $this->input->post('id_invoice'),
            'id_level' => $this->input->post('id_level'),
            'cek_p' => '1',
        ];
        $this->m_keuangan->tambah_pembayaran('tabel_pembayaran', $data);
        redirect(base_url('Keuangan/form_tambah_pembayaran/'.$this->input->post('id_invoice')));
    }

	public function cetak_pembayaran($idi)
	{
		// $cek = $this->m_keuangan->ibs($idr)->num_rows();
		// if (empty($cek)) {
		// 	$this->session->set_flashdata('msg',
        //     '<div class="alert alert-danger">
        //         <h4>Maaf</h4>
        //         <p>Data Tidak Ditemukan.</p>
        //     </div>');
		// 	redirect('Nilai/cetak_raport','refresh');
		// }else{
			$nama = $this->m_keuangan->get_s($idi);
			$invoice = $this->m_keuangan->get_inv($idi);
			foreach ($nama->result() as $key) {
				$data['nama'] = $key->nama;
				$data['rombel'] = $key->id_rombel;
			}
			foreach ($invoice->result() as $key2) {
				$data['invoice'] = $key2->id_invoice;
			}
			$data['data'] = $this->m_keuangan->ibs($idi)->result();
			if ($this->uri->segment(4) == "pdf") {
                $this->load->library('pdf');
				$this->pdf->load_view('keuangan/pembayaran/invoice/cetak_invoice', $data);
				$this->pdf->render();
				$this->pdf->stream("Rekap Bayar ".$data['nama'].".pdf", array("Attachment" => false));		
			}else{
                redirect($_SERVER['HTTP_REFERER']);
			}
		// }
	}
    
    public function hapus_pembayaran($id)
    {
        $this->m_keuangan->hapus_rn('tabel_pembayaran', 'id_pembayaran', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    
 // Cetak Invoice
    public function cetak_invoice($idi)
    {
        $data = [
            'judul'  => 'keuangan',
            'page'   => 'keuangan',
            'menu'   => 'pembayaran',
            'submenu'=> '',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'pembayaran'
        ];
        $data['idinvc'] = $this->m_keuangan->get_invoiceById($idi)->result();
        $data['pembayaran'] = $this->m_keuangan->get_pembayaranByIdInvoice($idi);
        $this->load->view('keuangan/pembayaran/invoice/invoice', $data);
    }

 // CARI DATA
    public function cari_data()
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'pembayaran',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'pembayaran'
        ];
        $this->load->model('m_akademik');
        $data['kelas'] = $this->m_akademik->get_kelas();
        $data['rombel'] = $this->m_akademik->get_rombel();
        $data['siswa'] = $this->m_akademik->get_siswa();
        $this->load->view('keuangan/pembayaran/cari_data', $data);
    }

    public function hasil_cari_data($ids)
    {
        $data = [
            'judul' => 'keuangan',
            'page' => 'keuangan',
            'menu' => 'pembayaran',
            'submenu'=>'',
            'menu_submenu_admin'=>'',
            'menu_admin' => 'keuangan',
            'submenu_admin'=> 'pembayaran'
        ];
        $this->load->model('m_akademik');
        $data['kelas'] = $this->m_akademik->get_kelas();
        $data['rombel'] = $this->m_akademik->get_rombel();
        $data['siswa'] = $this->m_akademik->get_siswa();
        $data['siswa_hasil'] = $this->m_keuangan->get_siswaById('tabel_siswa', $ids)->result();
        $data['pembayaran'] = $this->m_keuangan->get_pembayaranByIdSiswa($ids);
        $this->load->view('keuangan/pembayaran/hasil_cari_data', $data);
    }

    public function direct_cari(){
        $enc = $this->input->post('id_siswa');
        redirect('Keuangan/hasil_cari_data/'.$enc);
    }
    // Profile
    public function profile()
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
        $data['user']=$this->m_keuangan->get_userByLogin('tabel_level')->result();
        $this->load->view('Keuangan/profile/akun', $data);
    }

    public function update_profile()
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
                $masuk=$this->m_keuangan->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                if($masuk)
                {
                    $this->session->set_flashdata('sukses', 'berhasil update email dan username');
                    redirect(base_url('Keuangan/profile'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'gagal..');
                    redirect(base_url('Keuangan/profile'));
                }
        }else if($password_baru !== null){
            if($password_baru !== $password_baru2){
                $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                redirect(base_url('Keuangan/profile'));
            }else{
                $data = array
                (
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password_baru')),
                );
                $masuk=$this->m_keuangan->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                if($masuk)
                {
                    $this->session->set_flashdata('sukses', 'berhasil update email, username, dan password');
                    redirect(base_url('Keuangan/profile'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'gagal update email, username, dan password');
                    redirect(base_url('Keuangan/profile'));
                }
            }
        }else {
                $data = array
                (
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password_baru')),
                );
                $masuk=$this->m_keuangan->edit_data('tabel_level', $data, array('id_level'=>$this->input->post('id_level')));
                if($masuk)
                {
                    $this->session->set_flashdata('sukses', 'berhasil update profile');
                    redirect(base_url('Keuangan/profile'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'gagal update profile');
                    redirect(base_url('Keuangan/profile'));
                }
        }
    }
}