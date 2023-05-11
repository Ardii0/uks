<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->helpers('my_helper');
        // $this->load->library('excel');
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('is_login')!=TRUE) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => '',
            'submenu'=>'',
        ];
        
    }
//Guru
    public function daf_guru()
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'guru',
        ];
        $data['daf_guru'] = $this->Main_model->get("guru")->result();
        $this->load->view('Data/Guru', $data);
    }

    public function aksi_tambah_guru()
    {
      $data = [
          'nama_guru' => $this->input->post('nama_guru'),
          'tempat_lahir' => $this->input->post('tempat_lahir'),
          'tanggal_lahir' => $this->input->post('tanggal_lahir'),
          'alamat' => $this->input->post('alamat'),
      ];
      $masuk=$this->Main_model->tambah("guru", $data);
      if($masuk)
        {
            $this->session->set_flashdata('bisa', 'Berhasil..');
            redirect(base_url('data/daf_guru/'));
        }
    }

    public function edit_guru($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'guru',
        ];
        $data['daf_guru']=$this->Main_model->by_id('guru', $id)->result();
        $this->load->view('Data/edit_guru', $data, $id);
    }

    public function ubah_guru()
    {
        $data = array (
             'nama_guru' => $this->input->post('nama_guru'),
             'tempat_lahir' => $this->input->post('tempat_lahir'),
             'tanggal_lahir' => $this->input->post('tanggal_lahir'),
             'alamat' => $this->input->post('alamat'),
        );
        $masuk=$this->Main_model->ubah_data('guru', $data, array('id'=>$this->input->post('id')));
        if($masuk)
        {
            $this->session->set_flashdata('bisa', 'berhasil mengedit...');
            redirect(base_url('data/daf_guru'));
        }
    }

    public function hapus_guru($id)
    {
        $hapus=$this->Main_model->hapus('guru', 'id', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('data/daf_guru/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('data/daf_guru/'));
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
                    $nama_guru = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    if ($nama_guru == "") {
                        break;
                    }
                    $tempat_lahir = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $tanggal_lahir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $total_periksa = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                   
                    $temp_data[] = array(
                        'nama_guru' => $nama_guru,
                        'tempat_lahir'	=> $tempat_lahir,
                        'tanggal_lahir'	=> $tanggal_lahir,
                        'alamat' => $alamat,
                        'total_periksa'	=> $total_periksa,
                        
                    ); 	
                }
            }
            $this->load->library('excel');
            $masuk=$this->Main_model->import_guru($temp_data);
            if($masuk)
              {
                  $this->session->set_flashdata('bisa', 'Berhasil..');
                  redirect(base_url('data/daf_guru/'));
              }
        }
    }
//Siswa
    public function daf_siswa()
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'siswa',
        ];
        $data['daf_siswa'] = $this->Main_model->get("siswa")->result();
        $this->load->view('Data/Siswa', $data);
    }

    public function aksi_tambah_siswa()
    {
      $data = [
          'nama_siswa' => $this->input->post('nama_siswa'),
          'tempat_lahir' => $this->input->post('tempat_lahir'),
          'tanggal_lahir' => $this->input->post('tanggal_lahir'),
          'kelas' => $this->input->post('kelas'),
          'alamat' => $this->input->post('alamat'),
      ];
      $masuk=$this->Main_model->tambah("siswa", $data);
      if($masuk)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('data/daf_siswa/'));
        }
    }

    public function edit_siswa($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'siswa',
        ];
        $data['daf_siswa']=$this->Main_model->by_id('siswa', $id)->result();
        $this->load->view('Data/edit_siswa', $data, $id);
    }

    public function ubah_siswa()
    {
        $data = array (
            'nama_siswa' => $this->input->post('nama_siswa'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'kelas' => $this->input->post('kelas'),
            'alamat' => $this->input->post('alamat'),
            'TB' => $this->input->post('TB'),
            'BB' => $this->input->post('BB'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'gol_darah' => $this->input->post('gol_darah'),
            'nama_wali' => $this->input->post('nama_wali'),
            'no_telepon_wali' => $this->input->post('no_telepon_wali'),
            'alergi' => $this->input->post('alergi'),
        );
        $masuk=$this->Main_model->ubah_data('siswa', $data, array('id'=>$this->input->post('id')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('data/daf_siswa'));
        }
    }

    public function hapus_siswa($id)
    {
        $hapus=$this->Main_model->hapus('siswa', 'id', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('data/daf_siswa/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('data/daf_siswa/'));
        }
    }

    public function detail_siswa($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'siswa',
        ];
        $data['siswa']=$this->Main_model->by_id('siswa', $id)->result();
        $this->load->view('Data/detail_siswa', $data);
    }

    public function import_excel2()
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
                    $nama_siswa = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    if ($nama_siswa == "") {
                        break;
                    }
                    $kelas = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $tempat_lahir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $tanggal_lahir = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $total_periksa = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                   
                    $temp_data[] = array(
                        'nama_siswa' => $nama_siswa,
                        'kelas' => $kelas,
                        'tempat_lahir'	=> $tempat_lahir,
                        'tanggal_lahir'	=> $tanggal_lahir,
                        'alamat' => $alamat,
                        'total_periksa'	=> $total_periksa,
                        
                    ); 	
                }
            }
            $this->load->library('excel');
            $masuk=$this->Main_model->import_siswa($temp_data);
            if($masuk)
              {
                  $this->session->set_flashdata('sukses', 'Berhasil..');
                  redirect(base_url('data/daf_siswa/'));
              }
        }
    }

//Karyawan
    public function daf_karyawan()
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'karyawan',
        ];
        $data['daf_karyawan'] = $this->Main_model->get("karyawan")->result();
        $this->load->view('Data/Karyawan', $data);
    }
    public function aksi_tambah_karyawan()
    {
      $data = [
          'nama_karyawan' => $this->input->post('nama_karyawan'),
          'tempat_lahir' => $this->input->post('tempat_lahir'),
          'tanggal_lahir' => $this->input->post('tanggal_lahir'),
          'alamat' => $this->input->post('alamat'),
      ];
      $masuk=$this->Main_model->tambah("karyawan", $data);
      if($masuk)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('data/daf_karyawan/'));
        }
    }

    public function edit_karyawan($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'karyawan',
        ];
        $data['daf_karyawan']=$this->Main_model->by_id('karyawan', $id)->result();
        $this->load->view('Data/edit_karyawan', $data, $id);
    }

    public function ubah_karyawan()
    {
        $data = array (
             'nama_karyawan' => $this->input->post('nama_karyawan'),
             'tempat_lahir' => $this->input->post('tempat_lahir'),
             'tanggal_lahir' => $this->input->post('tanggal_lahir'),
             'alamat' => $this->input->post('alamat'),
        );
        $masuk=$this->Main_model->ubah_data('karyawan', $data, array('id'=>$this->input->post('id')));
        if($masuk)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('data/daf_karyawan'));
        }
    }

    public function hapus_karyawan($id)
    {
        $hapus=$this->Main_model->hapus('karyawan', 'id', $id);
        if($hapus)
        {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('data/daf_karyawan/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('data/daf_karyawan/'));
        }
    }

    public function import_excel3()
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
                    $nama_karyawan = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    if ($nama_karyawan == "") {
                        break;
                    }
                    $tempat_lahir = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $tanggal_lahir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $total_periksa = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                   
                    $temp_data[] = array(
                        'nama_karyawan' => $nama_karyawan,
                        'tempat_lahir'	=> $tempat_lahir,
                        'tanggal_lahir'	=> $tanggal_lahir,
                        'alamat' => $alamat,
                        'total_periksa'	=> $total_periksa,
                        
                    ); 	
                }
            }
            $this->load->library('excel');
            $masuk=$this->Main_model->import_karyawan($temp_data);
            if($masuk)
              {
                  $this->session->set_flashdata('sukses', 'Berhasil..');
                  redirect(base_url('data/daf_karyawan/'));
              }
        }
    }
}