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
        $this->load->view('data/guru', $data);
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
        $this->load->view('data/edit_guru', $data, $id);
    }

    public function detail_guru($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'guru',
        ];
        $data['guru']=$this->Main_model->by_id('guru', $id)->result();
        $this->load->view('data/detail_guru', $data);
    }

    public function upload_img_guru($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/data/data_guru/';
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

    public function ubah_guru()
    {
        $where = array('id' => $this->input->post("id"));
        $_id = $this->Main_model->getwhere($where, 'guru')->row();
        $foto = $this->upload_img_guru('foto');
        if($foto[0]==false) {
            $data = [
            'nama_guru' => $this->input->post('nama_guru'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'TB' => $this->input->post('TB'),
            'BB' => $this->input->post('BB'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'gol_darah' => $this->input->post('gol_darah'),
            'nama_wali' => $this->input->post('nama_wali'),
            'no_telepon_wali' => $this->input->post('no_telepon_wali'),
            'alergi' => $this->input->post('alergi'),
            ];
        } else {
            $data = [
            'nama_guru' => $this->input->post('nama_guru'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'TB' => $this->input->post('TB'),
            'BB' => $this->input->post('BB'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'gol_darah' => $this->input->post('gol_darah'),
            'nama_wali' => $this->input->post('nama_wali'),
            'no_telepon_wali' => $this->input->post('no_telepon_wali'),
            'alergi' => $this->input->post('alergi'),
            'foto' => $foto[1],
            ];
            if ($_id->foto != '') {
                unlink('./uploads/data/data_guru/'.$_id->foto);
            }
        }
        $valid = $this->Main_model->update_data($where, $data, 'guru');
        if($valid)
        {
            $this->session->set_flashdata('bisa', 'berhasil');
            redirect(base_url('data/daf_guru/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('data/daf_guru/'.$_id));
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
                  $this->session->set_flashdata('bisa', 'Berhasil di import...');
                  redirect(base_url('data/daf_guru/'));
              }
        }
    }

    public function export_guru()
    {
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->Main_model->export_guru();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Guru'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tempat Lahir');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Tanggal Lahir');  
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Alamat');   
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->nama_guru);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->tempat_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->tanggal_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->alamat);
            $rowCount++;
        }
        $filename = "data-guru.csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
    }

    public function export_periksa_guru()
    {
        // load excel library
        $this->load->library('excel');
        $id = $this->input->post('id');
        $getwhere=['guru_id'=>$id];
        $listInfo = $this->Main_model->getwhere($getwhere, 'periksa')->result();
        $guru = tampil_guru_byid($id);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Status Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Keluhan');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Tanggal');   
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Diagnosa');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Penanganan Pertama');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Tindakan');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Obat');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Tensi');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Catatan');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, tampil_guru_byid($id));
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->pasien_status);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->keluhan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->create_date);

            $ditangani = $this->db->get_where('penanganan_periksa', array('periksa_id' => $list->id))->num_rows();
            if ($ditangani > 0) {
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Sudah Ditangani ");
            } else {
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Belum Ditangani");
            }

            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, JoinOne('penanganan_periksa', 'diagnosa', 'diagnosa_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, JoinOne('penanganan_periksa', 'penanganan_pertama', 'penanganan_pertama_id', 'id','penanganan_periksa.id',$list->id, 'nama_penanganan'));
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, JoinOne('penanganan_periksa', 'tindakan', 'tindakan_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, JoinOne('penanganan_periksa', 'daftar_obat', 'daftar_obat_id', 'id','penanganan_periksa.id',$list->id, 'nama_obat'));
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, tampil_tensi1_byid($list->id).'/'.tampil_tensi2_byid($list->id));
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, tampil_catatan_byid($list->id));
            $rowCount++;
        }
        $filename = "rekap data periksa $guru.csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
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
        $this->load->view('data/siswa', $data);
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
        $this->load->view('data/edit_siswa', $data, $id);
    }

    public function upload_img_siswa($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/data/data_siswa/';
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
    
    public function ubah_siswa()
    {
        $where = array('id' => $this->input->post("id"));
        $_id = $this->Main_model->getwhere($where, 'siswa')->row();
        $foto = $this->upload_img_siswa('foto');
        if($foto[0]==false) {
            $data = [
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
            ];
        } else {
            $data = [
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
            'foto' => $foto[1],
            ];
            if ($_id->foto != '') {
                unlink('./uploads/data/data_siswa/'.$_id->foto);
            }
        }
        $valid = $this->Main_model->update_data($where, $data, 'siswa');
        if($valid)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('data/daf_siswa/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('data/daf_siswa/'.$_id));
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
        $this->load->view('data/detail_siswa', $data);
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
                    $nama_wali = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $no_telepon_wali = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $total_periksa = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                   
                    $temp_data[] = array(
                        'nama_siswa' => $nama_siswa,
                        'kelas' => $kelas,
                        'tempat_lahir'	=> $tempat_lahir,
                        'tanggal_lahir'	=> $tanggal_lahir,
                        'alamat' => $alamat,
                        'nama_wali' => $nama_wali,
                        'no_telepon_wali' => $no_telepon_wali,
                        'total_periksa'	=> $total_periksa,
                        
                    ); 	
                }
            }
            $this->load->library('excel');
            $masuk=$this->Main_model->import_siswa($temp_data);
            if($masuk)
              {
                  $this->session->set_flashdata('bisa', 'Berhasil di import...');
                  redirect(base_url('data/daf_siswa/'));
              }
        }
    }

    public function export_siswa()
    {
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->Main_model->export_siswa();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Siswa');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Kelas');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Tempat Lahir');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Tanggal Lahir');  
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Alamat');   
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->nama_siswa);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->kelas);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->tempat_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->tanggal_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->alamat);
            $rowCount++;
        }
        $filename = "data-siswa.csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
    }

    public function export_periksa_siswa()
    {
        // load excel library
        $this->load->library('excel');
        $id = $this->input->post('id');
        $getwhere=['siswa_id'=>$id];
        $listInfo = $this->Main_model->getwhere($getwhere, 'periksa')->result();
        $siswa = tampil_siswa_byid($id);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Status Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Keluhan');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Tanggal');   
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Diagnosa');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Penanganan Pertama');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Tindakan');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Obat');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Tensi');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Catatan');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, tampil_siswa_byid($id));
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->pasien_status);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->keluhan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->create_date);

            $ditangani = $this->db->get_where('penanganan_periksa', array('periksa_id' => $list->id))->num_rows();
            if ($ditangani > 0) {
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Sudah Ditangani ");
            } else {
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Belum Ditangani");
            }

            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, JoinOne('penanganan_periksa', 'diagnosa', 'diagnosa_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, JoinOne('penanganan_periksa', 'penanganan_pertama', 'penanganan_pertama_id', 'id','penanganan_periksa.id',$list->id, 'nama_penanganan'));
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, JoinOne('penanganan_periksa', 'tindakan', 'tindakan_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, JoinOne('penanganan_periksa', 'daftar_obat', 'daftar_obat_id', 'id','penanganan_periksa.id',$list->id, 'nama_obat'));
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, tampil_tensi1_byid($list->id).'/'.tampil_tensi2_byid($list->id));
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, tampil_catatan_byid($list->id));
            $rowCount++;
        }
        $filename = "rekap data periksa $siswa.csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
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
        $this->load->view('data/karyawan', $data);
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
            $this->session->set_flashdata('bisa', 'Berhasil..');
            redirect(base_url('data/daf_karyawan/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
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
        $this->load->view('data/edit_karyawan', $data, $id);
    }

    public function detail_karyawan($id)
    {
        $data = [
            'judul' => 'uks',
            'page' => 'data',
            'menu' => 'data',
            'submenu'=>'karyawan',
        ];
        $data['karyawan']=$this->Main_model->by_id('karyawan', $id)->result();
        $this->load->view('data/detail_karyawan', $data);
    }

    public function upload_img_karyawan($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './uploads/data/data_karyawan/';
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

    public function ubah_karyawan()
    {
        $where = array('id' => $this->input->post("id"));
        $_id = $this->Main_model->getwhere($where, 'karyawan')->row();
        $foto = $this->upload_img_karyawan('foto');
        if($foto[0]==false) {
            $data = [
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'TB' => $this->input->post('TB'),
            'BB' => $this->input->post('BB'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'gol_darah' => $this->input->post('gol_darah'),
            'nama_wali' => $this->input->post('nama_wali'),
            'no_telepon_wali' => $this->input->post('no_telepon_wali'),
            'alergi' => $this->input->post('alergi'),
            ];
        } else {
            $data = [
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'TB' => $this->input->post('TB'),
            'BB' => $this->input->post('BB'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'gol_darah' => $this->input->post('gol_darah'),
            'nama_wali' => $this->input->post('nama_wali'),
            'no_telepon_wali' => $this->input->post('no_telepon_wali'),
            'alergi' => $this->input->post('alergi'),
            'foto' => $foto[1],
            ];
            if ($_id->foto != '') {
                unlink('./uploads/data/data_karyawan/'.$_id->foto);
            }
        }
        $valid = $this->Main_model->update_data($where, $data, 'karyawan');
        if($valid)
        {
            $this->session->set_flashdata('bisa', 'berhasil');
            redirect(base_url('data/daf_karyawan/'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('data/daf_karyawan/'.$_id));
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
                  $this->session->set_flashdata('bisa', 'Berhasil di import...');
                  redirect(base_url('data/daf_karyawan/'));
              }
        }
    }

    public function export_karyawan()
    {
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->Main_model->export_karyawan();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Karyawan'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tempat Lahir');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Tanggal Lahir');  
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Alamat');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->nama_karyawan);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->tempat_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->tanggal_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->alamat);
            $rowCount++;
        }
        $filename = "data-karyawan.csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
    }

    public function export_periksa_karyawan()
    {
        // load excel library
        $this->load->library('excel');
        $id = $this->input->post('id');
        $getwhere=['karyawan_id'=>$id];
        $listInfo = $this->Main_model->getwhere($getwhere, 'periksa')->result();
        $karyawan = tampil_karyawan_byid($id);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Status Pasien');   
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Keluhan');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Tanggal');   
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Diagnosa');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Penanganan Pertama');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Tindakan');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Obat');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Tensi');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Catatan');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, tampil_karyawan_byid($id));
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->pasien_status);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->keluhan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->create_date);

            $ditangani = $this->db->get_where('penanganan_periksa', array('periksa_id' => $list->id))->num_rows();
            if ($ditangani > 0) {
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Sudah Ditangani ");
            } else {
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Belum Ditangani");
            }
            
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, JoinOne('penanganan_periksa', 'diagnosa', 'diagnosa_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, JoinOne('penanganan_periksa', 'penanganan_pertama', 'penanganan_pertama_id', 'id','penanganan_periksa.id',$list->id, 'nama_penanganan'));
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, JoinOne('penanganan_periksa', 'tindakan', 'tindakan_id', 'id','penanganan_periksa.id',$list->id, 'nama'));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, JoinOne('penanganan_periksa', 'daftar_obat', 'daftar_obat_id', 'id','penanganan_periksa.id',$list->id, 'nama_obat'));
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, tampil_tensi1_byid($list->id).'/'.tampil_tensi2_byid($list->id));
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, tampil_catatan_byid($list->id));
            $rowCount++;
        }
        $filename = "rekap data periksa $karyawan.csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
    }
}