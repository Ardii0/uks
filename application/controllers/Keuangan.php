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
        $this->load->view('keuangan/dashboard');

    }

// Anggaran
    public function anggaran()
    {
        $this->load->model('M_keuangan');
        $data['data_keuangan'] = $this->m_keuangan->get_all_data_keuangan('data_keuangan');
        $this->load->view('keuangan/anggaran/anggaran', $data);
    }

    public function tambah_anggaran()
    {
        $data['data_keuangan'] = $this->m_keuangan->get_all_data_keuangan('data_keuangan');
        $this->load->view('keuangan/anggaran/tambah_anggaran', $data);
    }

    public function aksi_tambah_anggaran()
    {
        $data = array
        (
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'debit' => $this->input->post('debit'),
            'kredit' => $this->input->post('kredit'),
            'saldo' => $this->input->post('saldo'),
        );
        $masuk = $this->m_keuangan->tambah_anggaran('tabel_keuangan', $data);
        if ($masuk) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('keuangan/anggaran/anggaran'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('keuangan/anggaran/tambah_anggaran'));
        }
    }

    public function edit_anggaran($id)
    {
        $data['data_keuangan']=$this->m_keuangan->edit_anggaran('tabel_keuangan', $id)->result();
        $this->load->view('keuangan/anggaran/edit_anggaran', $data);
    }

    public function aksi_edit_anggaran()
    {
        $data = array
        (
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'debit' => $this->input->post('debit'),
            'kredit' => $this->input->post('kredit'),
            'saldo' => $this->input->post('saldo'),
        );
        $masuk=$this->m_keuangan->edit_anggaran('tabel_keuangan', $data, array('id'=>$this->input->post('id')));
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

// Akun
    public function akun()
    {
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
        $this->load->model('M_keuangan');
        $pendapatan['data_pendapatan'] = $this->m_keuangan->get_pendapatan('data_pendapatan');
        $data['data_transaksi'] = $this->m_keuangan->get_data_transaksi('data_transaksi');
        $pengeluaran['data_pengeluaran'] = $this->m_keuangan->get_pengeluaran('data_pengeluaran');
        $this->load->view('keuangan/dana/dana', $pendapatan + $data + $pengeluaran);
    }

    public function input_dana($id)
    {
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
        $data = array
        (
            'id_anggaran' => $this->input->post('id_anggaran'),
            'uraian' => $this->input->post('uraian'),
            'pencatat' => $this->input->post('pencatat'),
            'id_akun' => $this->input->post('id_akun'),
            'nominal' => $this->input->post('nominal'),
        );

        $logging=$this->m_keuangan->aksi_transaksi('tabel_transaksi', $data);
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
       $this->load->model('M_keuangan');
       $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
       $data['data_transaksi'] = $this->m_keuangan->get_data_transaksi('data_transaksi');
       $this->load->view('keuangan/laporan/laporan_jurnalpenyesuaian', $data);
   }
   public function filter_tanggal()
   {
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
       $this->load->model('M_keuangan');
       $data['datafilter'] = $this->m_keuangan->filter_namakun("nama_akun");
       $data['data_akun'] = $this->m_keuangan->get_all_akun('data_akun');
       $this->load->view('keuangan/laporan/laporan_bukubesar', $data);
   }
   function filter_namakun(){
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
    public function pembayaran()
    {
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
        $enc = base64_encode($this->input->post('id_siswa'));
        redirect('Keuangan/form_tambah_pembayaran/'.$enc);
    }

    public function form_tambah_pembayaran()
    {
        // if(!empty($this->session->userdata('id_siswa'))) {
        //    $ids = $this->session->userdata('id_siswa');
           $ids = base64_decode($this->uri->segment(3));
        
           $data['dt'] = $this->m_keuangan->ambil('tabel_level',array('id_level'=>$this->session->userdata('id_level')))->row();
           $data['siswa'] = $this->m_keuangan->get_siswaById('tabel_siswa', $ids);
           $data['jenisbayar'] = $this->m_keuangan->get_jenisbayar();
           $data['pembayaran'] = $this->m_keuangan->get_pembayaran();
           $data['content'] = 'keuangan/tambah_pembayaran';

           $this->load->view('keuangan/pembayaran/form_tambah_pembayaran', $data);
        // }else{
        //     redirect('/tambah_pembayaran');
        // }
    }

    public function aksi_tambah_pembayaran()
    {
        $data = [
            'id_siswa' => $this->input->post('id_siswa'),
            'id_jenis' => $this->input->post('id_jenis'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan'),
            'akuntan' => $this->input->post('akuntan'),
        ];
        $this->m_keuangan->tambah_pembayaran('tabel_pembayaran', $data);
        redirect(base_url('Keuangan/form_tambah_pembayaran'));
    }

    public function cetak_invoice()
    {
        $this->load->view('keuangan/pembayaran/cetak_invoice');
    }

}